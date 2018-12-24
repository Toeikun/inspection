<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use App\Staff;
use App\User;
use App\Advisor;
use App\Faculty;
use App\Degree;
use App\Major;
use App\Research;
use App\Status;
use App\Position;
use App\Permission;
use App\Word;
use App\Log_word;
use App\Bill;
use App\Comment;
use App\PDF;
use App\Log_PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    // start student
    function listdocument() {
        if (Auth::check()) {
            $students = User::findOrFail(Auth::user()->student_id);
            $research = Research::where('student_id', $students->student_id)->first();
            $listfiles = Word::where('research_id', $research->research_id)->get();
            return view('contentstudent.list', [
                'listfiles' => $listfiles
            ]);
        } else {
            return redirect('/student');
        }
    }

    public function getresearchid($studentid) {
        $checkresid = Research::where('student_id', $studentid)->first();
        return $checkresid->research_id;
    }

    function uploadword() {
        if (Auth::check()) {
            $liststatus = Status::whereIn('name', ['รอตรวจ'])->get();
            return view('contentstudent.viewword.word', [
                'liststatus' => $liststatus
            ]);
        } else {
            return redirect('/student');
        }
    }

    function uploadbill() {
        if (Auth::check()) {
            return view('contentstudent.bill');
        } else {
            return redirect('/student');
        }
    }

    protected function billvalidator(array $data) {
        return Validator::make($data, [
            'bill' => 'required',
        ]);
    }

    function billupload(Request $request) {
        if (Auth::check()) {
            $billvalidator = $this->billvalidator($request->all());
            if ($billvalidator->fails()) {
                return redirect('student/bill')
                            ->withErrors($billvalidator)
                            ->withInput();
            }
            DB::beginTransaction();
            try {
                $time = 0;
                $bill = Bill::where('student_id', Auth::user()->student_id)->get();
                if (count($bill) > 0) {
                    $times = count($bill);
                    $time = $times + 1;
                } else {
                    $time = 1;
                }
                $getfilename = $request->file('bill')->getClientOriginalName();
                $filename = pathinfo($getfilename, PATHINFO_FILENAME);
                $filetype = $request->file('bill')->getClientOriginalExtension();
                $setfilename = Auth::user()->student_id . '-' . $time . '.' .$filetype;
                $billid = Auth::user()->student_id . '-' . $time;
                $path = $request->file('bill')->storeAs(Auth::user()->student_id.'/bill', $setfilename);

                $researchid = $this->getresearchid(Auth::user()->student_id);

                $newbill = new Bill();
                $newbill->bill_id = $billid;
                $newbill->name = $setfilename;
                $newbill->student_id = Auth::user()->student_id;
                $newbill->research_id = $researchid;
                $newbill->times = $time;
                $newbill->save();

                DB::commit();
                Alert::success('Upload file success.', 'Please wait')->persistent(true,true);
                return redirect()->back();
            } catch(Exception $e) {
                DB::rollback();
                return response()->json(['error' => $ex->getMessage()], 500);
            }
        } else {
            return redirect('/student');
        }
    }

    public function checktimesfile($studentid, $request) {
        $counttimes = 0;
        $getresearch = Research::where('student_id', $studentid)->first();
        $checkfile = Word::where('research_id', $getresearch->research_id)->where('filename', $request->filename)->first();
        if ($checkfile == Null) {
            $counttimes = 1;
        } else {
            $counttimes = $checkfile->times + 1;
        }
        return $counttimes;
    }

    function storeword(Request $request) {
        if (Auth::check()) {
            if ($request->hasFile('word')) {
                DB::beginTransaction();
                try {
                    $data = $this->checktimesfile(Auth::user()->student_id, $request);
                    $getresearch = Research::where('student_id', Auth::user()->student_id)->first();
                    $getfilename = $request->file('word')->getClientOriginalName();
                    $filename = pathinfo($getfilename, PATHINFO_FILENAME);
                    $filetype = $request->file('word')->getClientOriginalExtension();
                    $setfilename = $request->filename.'.'.$filetype;
                    $setfiletype = $filetype;
                    $path = $request->file('word')->storeAs(Auth::user()->student_id.'/word', $setfilename);

                    $word = new Word();
                    $word->number = str_random(16);
                    $word->research_id = $getresearch->research_id;
                    $word->filename = $request->filename;
                    $word->filetype = $filetype;
                    $word->times = $data;
                    $word->sent_date = Carbon::now();
                    $word->status_id = $request->status;
                    $word->save();

                    $logword = new Log_word();
                    $logword->research_id = $getresearch->research_id;
                    $logword->filename = $request->filename;
                    $logword->filetype = $filetype;
                    $logword->times = $data;
                    $logword->status_id = $request->status;
                    $logword->save();
                    DB::commit();
                    Alert::success('Upload file Success', 'Upload Successfuly')->persistent(true,true);
                    return redirect('student/list');
                } catch (Exception $e) {
                    DB::rollback();
                    return response()->json(['error' => $ex->getMessage()], 500);
                }
            } else {
                $word = 'No File';
            }
        } else {
            return redirect('/student');
        }
    }

    function editword($number) {
        if (Auth::check()) {
            $getresearch = Research::where('student_id', Auth::user()->student_id)->first();
            $liststatus = Status::whereIn('name', ['รอตรวจ'])->get();
            $getword = Word::where('number', '=', $number)->where('research_id', $getresearch->research_id)->first();
            return view('contentstudent.viewword.edit', [
                'getword' => $getword,
                'liststatus' => $liststatus
            ]);
        } else {
            return redirect('/student');
        }
    }

    function updateword(Request $request) {
        if (Auth::check()) {
            if ($request->hasFile('word')) {
                DB::beginTransaction();
                try {
                    $getword = Word::where('number', '=', $request->number)->first();
                    $data = $this->checktimesfile(Auth::user()->student_id, $request);
                    $getresearch = Research::where('student_id', Auth::user()->student_id)->first();
                    $getfilename = $request->file('word')->getClientOriginalName();
                    $filename = pathinfo($getfilename, PATHINFO_FILENAME);
                    $filetype = $request->file('word')->getClientOriginalExtension();
                    $setfilename = $request->filename.'.'.$filetype;
                    $filenamedelete = $getword->filename.'.'.$getword->filetype;
                    $setfiletype = $filetype;
                    $deleteword = Storage::delete(Auth::user()->student_id.'/word' .'/'.$filenamedelete);
                    $path = $request->file('word')->storeAs(Auth::user()->student_id.'/word', $setfilename);


                    Word::where('number', '=', $request->number)->where('research_id', $getresearch->research_id)->update([
                        'filename' => $setfilename,
                        'times' => $data,
                        'filename' => $request->filename,
                        'filetype' => $filetype,
                        'times' => $data,
                        'sent_date' => Carbon::now(),
                    ]);

                    $logword = new Log_word();
                    $logword->research_id = $getresearch->research_id;
                    $logword->filename = $request->filename;
                    $logword->filetype = $filetype;
                    $logword->times = $data;
                    $logword->status_id = $request->status;
                    $logword->save();
                    DB::commit();
                } catch (Exception $e) {
                    DB::rollback();
                    return response()->json(['error' => $ex->getMessage()], 500);
                }
                Alert::success('Upload file Success', 'Upload Successfuly')->persistent(true,true);
                return redirect('student/list');
            } else {
                $word = 'No File';
            }
        } else {
            return redirect('/student');
        }
    }

    function commentword($number) {
        if (Auth::check()) {
            $commentdetail = Comment::where('code', '=', $number)->get();
            return view('contentstudent.viewword.comment', [
                'commentdetail' => $commentdetail
            ]);
        } else {
            return redirect('/student');
        }
    }

    function storenewword($number) {
        if (Auth::check()) {
            $getresearch = Research::where('student_id', Auth::user()->student_id)->first();
            $liststatus = Status::whereIn('name', ['รอตรวจ'])->get();
            $getword = Word::where('number', '=', $number)->where('research_id', $getresearch->research_id)->first();
            return view('contentstudent.viewword.upload', [
                'getword' => $getword,
                'liststatus' => $liststatus
            ]);
        } else {
            return redirect('/student');
        }
    }

    function wordupload(Request $request) {
        if (Auth::check()) {
            if ($request->hasFile('word')) {
                DB::beginTransaction();
                try {
                    $getword = Word::where('number', '=', $request->number)->first();
                    $data = $this->checktimesfile(Auth::user()->student_id, $request);
                    $getresearch = Research::where('student_id', Auth::user()->student_id)->first();
                    $getfilename = $request->file('word')->getClientOriginalName();
                    $filename = pathinfo($getfilename, PATHINFO_FILENAME);
                    $filetype = $request->file('word')->getClientOriginalExtension();
                    $setfilename = $request->filename.'.'.$filetype;
                    $filenamedelete = $getword->filename.'.'.$getword->filetype;
                    $setfiletype = $filetype;
                    $deleteword = Storage::delete(Auth::user()->student_id.'/word' .'/'.$filenamedelete);
                    $path = $request->file('word')->storeAs(Auth::user()->student_id.'/word', $setfilename);

                    if ($request->filename == 'abstract') {
                        Research::where('student_id', '=', Auth::user()->student_id)->update([
                            'ab_status_id' => $request->status,
                        ]);
                    } 
                    if ($request->filename == 'reference') {
                        Research::where('student_id', '=', Auth::user()->student_id)->update([
                            're_status_id' => $request->status,
                        ]);
                    }

                    Word::where('number', '=', $request->number)->where('research_id', $getresearch->research_id)->update([
                        'filename' => $setfilename,
                        'times' => $data,
                        'filename' => $request->filename,
                        'filetype' => $filetype,
                        'times' => $data,
                        'status_id' => $request->status,
                        'sent_date' => Carbon::now(),
                    ]);

                    $logword = new Log_word();
                    $logword->research_id = $getresearch->research_id;
                    $logword->filename = $request->filename;
                    $logword->filetype = $filetype;
                    $logword->times = $data;
                    $logword->status_id = $request->status;
                    $logword->save();

                    $research = Research::where('student_id', '=', Auth::user()->student_id)->first();
                    $status_ab = $research->ab_status_id;
                    $status_re = $research->re_status_id;

                    if (($status_ab == 8 && $status_re == 8) || ($status_ab == 8 && $status_re == 6)) {
                        Research::where('student_id', '=', Auth::user()->student_id)->update([
                            'limit' => decrement('limit'),
                        ]);
                    } else if (($status_re == 8 && $status_ab == 8) || ($status_re == 8 && $status_ab == 6)) {
                        Research::where('student_id', '=', Auth::user()->student_id)->update([
                            'limit' => decrement('limit'),
                        ]);
                    }

                    DB::commit();
                } catch (Exception $e) {
                    DB::rollback();
                    return response()->json(['error' => $ex->getMessage()], 500);
                }
                Alert::success('Upload file Success', 'Upload Successfuly')->persistent(true,true);
                return redirect('student/list');
            } else {
                $word = 'No File';
            }
        } else {
            return redirect('/student');
        }
    }

    function showpdf() {
        if (Auth::check()) {
            return view('contentstudent.viewpdf.pdf');
        } else {
            return redirect('/student');
        }
    }

    function listpdf() {
        if (Auth::check()) {
            $students = User::findOrFail(Auth::user()->student_id);
            $research = Research::where('student_id', $students->student_id)->first();
            $listfiles = PDF::where('research_id', $research->research_id)->get();
            return view('contentstudent.viewpdf.list', [
                'listfiles' => $listfiles
            ]);
        } else {
            return redirect('/student');
        }
    }

    function storepdf(Request $request) {
        if (Auth::check()) {
            if ($request->hasFile('pdf')) {
                DB::beginTransaction();
                try {
                    $getresearch = Research::where('student_id', Auth::user()->student_id)->first();
                    $getfilename = $request->file('pdf')->getClientOriginalName();
                    $filename = pathinfo($getfilename, PATHINFO_FILENAME);
                    $filetype = $request->file('pdf')->getClientOriginalExtension();
                    $setfilename = $request->filename.'.'.$filetype;
                    $setfiletype = $filetype;
                    $path = $request->file('pdf')->storeAs(Auth::user()->student_id.'/pdf', $setfilename);

                    $pdf = new PDF();
                    $pdf->number = str_random(16);
                    $pdf->research_id = $getresearch->research_id;
                    $pdf->filename = $request->filename;
                    $pdf->filetype = $filetype;
                    $pdf->sent_date = Carbon::now();
                    $pdf->status_id = 6;
                    $pdf->save();

                    $logpdf = new Log_PDF();
                    $logpdf->research_id = $getresearch->research_id;
                    $logpdf->filename = $request->filename;
                    $logpdf->filetype = $filetype;
                    $logpdf->status_id = 6;
                    $logpdf->save();
                    DB::commit();
                    Alert::success('Upload file Success', 'Upload Successfuly')->persistent(true,true);
                    return redirect('student/list');
                } catch (Exception $e) {
                    DB::rollback();
                    return response()->json(['error' => $ex->getMessage()], 500);
                }
            } else {
                $pdf = 'No File';
            }
        } else {
            return redirect('/student');
        }
    }
}