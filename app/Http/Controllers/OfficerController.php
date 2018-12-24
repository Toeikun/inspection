<?php

namespace App\Http\Controllers;

use DB;
use Storage;
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
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class OfficerController extends Controller
{
    public function __construct() {
        $this->middleware('auth:officer');
    }

    function showdashboard() {
        if (Auth::check()) {
            $research_ab = DB::table('advisors')
            ->join('research', 'research.advisor_id', '=', 'advisors.advisor_id')
            ->join('students', 'research.student_id', '=', 'students.student_id')
            ->join('position', 'advisors.position_id', '=', 'position.position_id')
            ->select('research.research_id', 'students.student_id', 'students.firstname as st_firstname', 'students.lastname as st_lastname', 'research.research_code','research.th_topic','research.eng_topic','research.limit','advisors.lastname as ad_lastname','advisors.firstname as ad_firstname','advisors.advisor_id','position.name')
            ->where('ab_staff_id', Auth::user()->staff_id)
            ->get();

            $research_re = DB::table('advisors')
            ->join('research', 'research.advisor_id', '=', 'advisors.advisor_id')
            ->join('students', 'research.student_id', '=', 'students.student_id')
            ->join('position', 'advisors.position_id', '=', 'position.position_id')
            ->select('research.research_id', 'students.student_id', 'students.firstname as st_firstname', 'students.lastname as st_lastname', 'research.research_code','research.th_topic','research.eng_topic','research.limit','advisors.lastname as ad_lastname','advisors.firstname as ad_firstname','advisors.advisor_id','position.name')
            ->where('re_staff_id', Auth::user()->staff_id)
            ->get();
            // return $research_re;
            return view('contentofficer.dashboard', [
                'research_ab' => $research_ab,
                'research_re' => $research_re
            ]);
        } else {
            return redirect('/officer');
        }
    }

    function showabstractlist($id) {
        if (Auth::check()) {
            $files = Word::where('research_id', $id)->whereNotIn('filename', ['abstract', 'reference'])->get();
            $file = Word::where('research_id', $id)->where('filename', '=', 'abstract')->get();
            return view('contentofficer.listresearch', [
                'files' => $files,
                'file' => $file,
                'text' => "Abstract",
            ]);
        } else {
            return redirect('/officer');
        }
    }

    function showreferencelist($id) {
        if (Auth::check()) {
            $files = Word::where('research_id', $id)->whereNotIn('filename', ['abstract', 'reference'])->get();
            $file = Word::where('research_id', $id)->where('filename', '=', 'reference')->get();
            return view('contentofficer.listresearch', [
                'files' => $files,
                'file' => $file,
                'text' => "Reference",
            ]);
        } else {
            return redirect('/officer');
        }
    }

    function downloadword($number) {
        if (Auth::check()) {
            $file = Word::where('number', $number)->first();
            $research = Research::where('research_id', $file->research_id)->first();
            $student = User::where('student_id', $research->student_id)->first();
            // return $file;
            return Storage::download($student->student_id . '/word' . '/' . $file->filename . '.' . $file->filetype);
        } else {
            return redirect('/officer');
        }
    }

    function wordcomment($number) {
        if (Auth::check()) {
            $file = Word::where('number', $number)->first();
            $liststatus = Status::whereIn('name', ['รอแก้ไข'])->get();
            return view('contentofficer.comment', [
                'file' => $file,
                'liststatus' => $liststatus
            ]);
        } else {
            return redirect('/officer');
        }
    }

    public function createcommentid() {
        $comment = Comment::count();
        if ($comment != '') {
            $commentid = (int)$comment + 1;
            return 'Cm' . sprintf("%05d",$commentid);
        } else {
            return 'Cm00001';
        }
    }

    public function checktimesfile($studentid, $request) {
        $counttimes = 0;
        $getresearch = Research::where('student_id', $studentid)->first();
        $checkfile = Word::where('research_id', $getresearch->research_id)->orWhere('filename', $request->filename)->first();
        if ($checkfile == Null) {
            $counttimes = 1;
        } else {
            $counttimes = $checkfile->times + 1;
        }
        return $counttimes;
    }

    function storeword(Request $request) {
        if (Auth::check()) {
            DB::beginTransaction();
            try {
                $getword = Word::where('number', $request->number)->first();
                $getresearch = Research::where('research_id', $getword->research_id)->first();
                $getstudent = User::where('student_id', $getresearch->student_id)->first();
                $filecomment = NULL;

                if ($request->hasFile('word')) {
                    $data = $this->checktimesfile($getstudent->student_id, $request);
                    $getfilename = $request->file('word')->getClientOriginalName();
                    $filename = pathinfo($getfilename, PATHINFO_FILENAME);
                    $filetype = $request->file('word')->getClientOriginalExtension();
                    $setfilename = $request->filename.'.'.$filetype;
                    $setfiletype = $filetype;
                    $path = $request->file('word')->storeAs($getstudent->student_id.'/word', $setfilename);

                    $word = Word::where('number', $request->number)->first();
                    $word->reader = Auth::user()->staff_id;
                    $word->read_date = Carbon::now();
                    $word->staff_id = Auth::user()->staff_id;
                    $word->status_id = $request->status;
                    $word->filename = $request->filename;
                    $word->filetype = $filetype;
                    $word->save();

                    $logword = new Log_word();
                    $logword->research_id = $getresearch->research_id;
                    $logword->filename = $request->filename;
                    $logword->filetype = $filetype;
                    $logword->times = $data;
                    $logword->messages = "Have uploaded the modified word file.";
                    $logword->status_id = $request->status;
                    $logword->save();

                } else {
                    $word = Word::where('number', $request->number)->first();
                    $word->reader = Auth::user()->staff_id;
                    $word->read_date = Carbon::now();
                    $word->staff_id = Auth::user()->staff_id;
                    $word->status_id = $request->status;
                    $word->save();

                    $logword = new Log_word();
                    $logword->research_id = $getresearch->research_id;
                    $logword->filename = NULL;
                    $logword->filetype = NULL;
                    $logword->messages = "No file upload.";
                    $logword->times = $data;
                    $logword->status_id = $request->status;
                    $logword->save();
                }

                if ($request->hasFile('comment')) {
                    $commentid = $this->createcommentid();
                    $getfilename = $request->file('comment')->getClientOriginalName();
                    $filetypecomment = $request->file('comment')->getClientOriginalExtension();
                    $filecomment = $commentid . '.' . $filetypecomment;
                    $path = $request->file('comment')->storeAs($getstudent->student_id . '/comment', $filecomment);

                    $comment = new Comment();
                    $comment->code = $request->number;
                    $comment->comment = $request->textcomment;
                    $comment->file_comment = $filecomment;
                    $comment->read_date = Carbon::now();
                    $comment->status_id = $request->status;
                    $comment->staff_id = Auth::user()->staff_id;
                    $comment->research_id = $getresearch->research_id;
                    $comment->save();
                } else {
                    $comment = new Comment();
                    $comment->code = $request->number;
                    $comment->comment = $request->textcomment;
                    $comment->file_comment = $filecomment;
                    $comment->read_date = Carbon::now();
                    $comment->status_id = $request->status;
                    $comment->staff_id = Auth::user()->staff_id;
                    $comment->research_id = $getresearch->research_id;
                    $comment->save();
                }

                if ($request->filename == 'abstract') {
                    Research::where('student_id', '=', $student->student_id)->update([
                        'ab_status_id' => $request->status,
                    ]);
                } 
                if ($request->filename == 'reference') {
                    Research::where('student_id', '=', $student->student_id)->update([
                        're_status_id' => $request->status,
                    ]);
                }

                DB::commit();

                Alert::success('Comment file success.', 'Please wait')->persistent(true,true);
                return redirect('/officer/listfile'.'/'. $getword->research_id .'/abstract');
            } catch (Exception $e) {
                DB::rollback();
                return response()->json(['error' => $ex->getMessage()], 500);
            }
        } else {
            return redirect('/officer');
        }
    }

    function wordpasses($number) {
        if (Auth::check()) {
            $status = Status::where('name', '=', 'ผ่าน')->first();
            $word = Word::where('number', $number)->first();
            $word->reader = Auth::user()->staff_id;
            $word->read_date = Carbon::now();
            $word->staff_id = Auth::user()->staff_id;
            $word->status_id = $status->status_id;
            $word->save();

            $logword = new Log_word();
            $logword->research_id = $word->research_id;
            $logword->filename = $word->filename;
            $logword->filetype = $word->filetype;
            $logword->times = $word->times;
            $logword->status_id = $status->status_id;
            $logword->save();

            Alert::success('Comment file success.', 'Please wait')->persistent(true,true);
            return redirect('/officer/listfile'.'/'. $word->research_id .'/abstract');
        } else {

        }
    }
}