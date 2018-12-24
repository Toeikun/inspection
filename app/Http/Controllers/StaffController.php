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
use App\Bill;
use App\Word;
use App\PDF;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class StaffController extends Controller
{
    public function __construct() {
        $this->middleware('auth:staff');
    }
    // start student
    function showliststudent() {
        if (Auth::check()) {
            $students = User::All();
            return view('contentstaff.viewstudent.list', [
                'students' => $students
            ]);
        } else {
            return redirect('/staff');
        }
    }

    function createstudent() {
        if (Auth::check()) {
            $students = User::All();
            $advisors = Advisor::All();
            $faculties = Faculty::All();
            $degrees = Degree::All();
            $majors = Major::All();
            if (count($advisors) == 0) {
                $advisors = Null;
            } else {
                $advisors = $advisors;
            }
            return view('contentstaff.viewstudent.create', [
                'students' => $students,
                'advisors' => $advisors,
                'faculties' => $faculties,
                'degrees' => $degrees,
                'majors' => $majors,
            ]);
        } else {
            return redirect('/staff');
        }
    }

    public function checkstuid($studentid) {
        $checkstuid = User::where('student_id', $studentid)->count();
        if ($checkstuid > 0) {
            Alert::warning('Warning', 'Student ID has already been taken.')->persistent(true,true);
            return redirect()->back();
        }
    }

    public function checkemail($email) {
        $checkemail = User::where('email', $email)->count();
        if ($checkemail > 0) {
            Alert::warning('Warning', 'Email ID has already been taken.')->persistent(true,true);
            return redirect()->back();
        }
    }

    public function checkresid($researchid) {
        $checkresid = Research::where('research_id', $researchid)->count();
        if ($checkresid > 0) {
            Alert::warning('Warning', 'Research ID has already been taken.')->persistent(true,true);
            return redirect()->back();
        }
    }

    function storestudent(Request $request) {
        if (Auth::check()) {
            $this->checkstuid($request->student_id);
            $this->checkemail($request->email);
            $this->checkresid($request->research_id);

            DB::beginTransaction();
            try {
                $password = str_random(10);
                $newstudent = new User();
                $newstudent->student_id = $request->student_id;
                $newstudent->firstname = $request->firstname;
                $newstudent->lastname = $request->lastname;
                $newstudent->email = $request->email;
                $newstudent->contact = $request->contact;
                $newstudent->regis_pass = $password;
                $newstudent->password = Hash::make($password);
                $newstudent->faculty_id = $request->faculty;
                $newstudent->major_id = $request->major;
                $newstudent->degree_id = $request->degree;
                $newstudent->status_id = 1;
                $newstudent->created_by = Auth::user()->firstname;
                $newstudent->years = $request->years;
                $newstudent->semester = $request->semester;
                $newstudent->save();

                $newresearch = new Research();
                $newresearch->research_id = $request->research_id;
                $newresearch->th_topic = $request->th_topic;
                $newresearch->eng_topic = $request->eng_topic;
                $newresearch->student_id = $request->student_id;
                $newresearch->advisor_id = $request->advisor;
                $newresearch->status_id = 1;
                $newresearch->limit = 3;
                $newresearch->save();
                Storage::makeDirectory('public/'.$request->student_id);
                DB::commit();
            } catch(Exception $e) {
                DB::rollback();
                return response()->json(['error' => $ex->getMessage()], 500);
            }
            Alert::html('Register Success',"Your Email is <b>" . $request->email. "</b> <br> Your Password is <b>" . $password . "</b>",'success')->persistent(true,true);
            return redirect('staff/liststudent');
        } else {
            return redirect('/staff');
        }
    }

    function editstudent($id) {
        if (Auth::check()) {
            $student = User::where('student_id', $id)->first();
            $research = Research::where('student_id', $id)->first();
            $advisors = Advisor::where('status_id', 1)->get();
            $coadvisors = Advisor::where('status_id', 8)->get();
            $faculties = Faculty::All();
            $degrees = Degree::All();
            $majors = Major::All();
            return view('contentstaff.viewstudent.edit', [
                'student' => $student,
                'research' => $research,
                'faculties' => $faculties,
                'degrees' => $degrees,
                'majors' => $majors,
                'advisors' => $advisors,
                'coadvisors' => $coadvisors,
            ]);
        } else {
            return redirect('/staff');
        }
    }

    function updatestudent(Request $request) {
        if (Auth::check()) {
            DB::beginTransaction();
            try {
                $student = User::find($request->student_id);
                $student->firstname = $request->firstname;
                $student->lastname = $request->lastname;
                $student->contact = $request->contact;
                $student->faculty_id = $request->faculty;
                $student->major_id = $request->major;
                $student->degree_id = $request->degree;
                $student->status_id = 1;
                $student->created_by = Auth::user()->firstname;
                $student->years = $request->years;
                $student->semester = $request->semester;
                $student->save();

                $research = Research::where('student_id', $request->student_id)->first();
                $research->th_topic = $request->th_topic;
                $research->eng_topic = $request->eng_topic;
                $research->student_id = $request->student_id;
                $research->advisor_id = $request->advisor;
                $research->status_id = 1;
                $research->save();
                DB::commit();
            } catch(Exception $e) {
                DB::rollback();
                return response()->json(['error' => $ex->getMessage()], 500);
            }
            Alert::success('Update Success', 'Updated Successfuly')->persistent(true,true);
            return redirect('staff/liststudent');
        } else {

        }
    }

    function printdocument($id) {
        if (Auth::check()) {
            $student = User::find($id);
            $research = Research::where('student_id', $id)->first();
            $advisor = Advisor::where('advisor_id', $research->advisor_id)->first();
            return view('contentstaff.viewstudent.document', [
                'student' => $student,
                'research' => $research,
                'advisor' => $advisor,
            ]);
        } else {
            return redirect('/staff');
        }
    }

    function billlist($id) {
        if (Auth::check()) {
            $student = User::findOrFail($id);
            $bills = Bill::where('student_id', $id)->get();
            $status = Status::whereIn('name', ['active','unactive'])->get();
            $research = Research::where('student_id', $id)->first();
            $advisor = Advisor::where('advisor_id', $research->advisor_id)->first();
            return view('contentstaff.viewstudent.bill', [
                'student' => $student,
                'status' => $status,
                'research' => $research,
                'advisor' => $advisor,
                'bills' => $bills,
            ]);
        } else  {
            return redirect('/staff');
        }
    }

    function changstatus(Request $request, $id) {
        if (Auth::check()) {
            DB::beginTransaction();
            try {
                $student = User::findOrFail($id);
                $student->status_id = $request->status;
                $student->save();

                DB::commit();
                Alert::success('Update Success', 'Updated Successfuly')->persistent(true,true);
                return redirect('staff/liststudent');
            } catch(Exception $e) {
                DB::rollback();
                return response()->json(['error' => $ex->getMessage()], 500);
            }
        } else {
            return redirect('/staff');
        }
    }
    // end student
    // start research
    function showresearch() {
        if (Auth::check()) {
            $research = Research::all();
            return view('contentstaff.viewresearch.list', [
                'research' => $research,
            ]);
        } else {
            return redirect('/staff');
        }
    }

    function settingresearch($id) {
        if (Auth::check()) {
            $abstracts = Staff::where('status_id', 3)->get();
            $references = Staff::where('status_id', 4)->get();
            $abstractandreferences = Staff::where('status_id', 5)->get();
            $status = Status::whereIn('name', ['active','unactive'])->get();
            $research = Research::findOrFail($id);
            $staff_ab = Staff::findOrFail($research->ab_staff_id);
            $staff_re = Staff::findOrFail($research->re_staff_id);
            $student = User::findOrFail($research->student_id);
            $advisor = Advisor::where('advisor_id', $research->advisor_id)->first();
            return view('contentstaff.viewresearch.setting', [
                'student' => $student,
                'status' => $status,
                'research' => $research,
                'advisor' => $advisor,
                'abstracts' => $abstracts,
                'references' => $references,
                'abstractandreferences' => $abstractandreferences,
                'staff_ab' => $staff_ab,
                'staff_re' => $staff_re,
            ]);
        } else  {
            return redirect('/staff');
        }
    }

    function settinginspection(Request $request, $id) {
        if (Auth::check()) {
            DB::beginTransaction();
            try {
                $ab_staff_id = "";
                $re_staff_id = "";
                if (empty($request->abstractandreference)) {
                    $ab_staff_id = $request->abstract;
                    $re_staff_id = $request->reference;
                } else {
                    $ab_staff_id = $request->abstractandreference;
                    $re_staff_id = $request->abstractandreference;
                }
                $research = Research::findOrFail($id);
                $research->ab_staff_id = $ab_staff_id;
                $research->re_staff_id = $re_staff_id;
                $research->save();

                DB::commit();

                Alert::success('Updated Success', 'Setting Inspection in Project successfuly')->persistent(true,true);                
                return redirect()->back();
            } catch(Exception $e) {
                DB::rollback();
                return response()->json(['error' => $ex->getMessage()], 500);
            }
        } else {
            return redirect('/staff');
        }
    }

    function researchdetail($id) {
        if (Auth::check()) {
            $research = Research::findOrFail($id);
            $listfiles = Word::where('research_id', $research->research_id)->get();
            $listpdf = PDF::where('research_id', $research->research_id)->get();
            return view('contentstaff.viewresearch.detail', [
                'listfiles' => $listfiles,
                'listpdf' => $listpdf,
            ]);
        } else {
            return redirect('/staff');
        }
    }
    // end research
    // strat advisor 
    function listadvisor() {
        if (Auth::check()) {
            $advisors = Advisor::All();
            return view('contentstaff.viewadvisor.list', [
                'advisors' => $advisors,
            ]);
        } else {
            return redirect('/staff');
        }
    }

    function createadvisor() {
        if (Auth::check()) {
            $faculties = Faculty::All();
            $majors = Major::All();
            $positions = Position::All();
            $liststatus = Status::whereIn('name', ['active','unactive', 'co-advisor'])->get();
            return view('contentstaff.viewadvisor.create', [
                'faculties' => $faculties,
                'majors' => $majors,
                'positions' => $positions,
                'liststatus' => $liststatus,
            ]);
        } else {
            return redirect('/staff');
        }
    }

    public function createadvisorid() {
        $advisor = Advisor::count();
        if ($advisor != '') {
            $advisorid = (int)$advisor + 1;
            return 'adv' . sprintf("%05d",$advisorid);
        } else {
            return 'adv00001';
        }
    }

    protected function validatoradvisor(array $data) {
        return Validator::make($data, [
            'email' => 'required|string|email|max:255|unique:advisors',
            'contact' => 'required|string|min:10|unique:advisors',
        ]);
    }

    function storeadvisor(Request $request) {
        if (Auth::check()) {
            $validator = $this->validatoradvisor($request->all());
            if ($validator->fails()) {
                return redirect('/staff/advisor/create')
                            ->withErrors($validator)
                            ->withInput();
            }
            DB::beginTransaction();
            try {
                $password = str_random(10);
                $advisor = new Advisor();
                $advisor->advisor_id = $this->createadvisorid();
                $advisor->position_id = $request->position;
                $advisor->firstname = $request->firstname;
                $advisor->lastname = $request->lastname;
                $advisor->email = $request->email;
                $advisor->contact = $request->contact;
                $advisor->faculty_id = $request->faculty;
                $advisor->major_id = $request->major;
                $advisor->status_id = $request->status;
                $advisor->regis_pass = $password;
                $advisor->password = Hash::make($password);
                $advisor->save();
                DB::commit();
            } catch(Exception $e) {
                DB::rollback();
                return response()->json(['error' => $ex->getMessage()], 500);
            }
            Alert::html('Register Success',"Your Email is <b>" . $request->email. "</b> <br> Your Password is <b>" . $password . "</b>",'success')->persistent(true,true);
            return redirect('staff/advisor');
        } else {
            return redirect('/staff');
        }
    }

    function editadvisor($id) {
        if (Auth::check()) {
            $advisor = Advisor::findOrFail($id);
            $faculties = Faculty::All();
            $majors = Major::All();
            $positions = Position::All();
            $liststatus = Status::whereIn('name', ['active','unactive', 'co-advisor'])->get();
            return view('contentstaff.viewadvisor.edit', [
                'advisor' => $advisor,
                'faculties' => $faculties,
                'majors' => $majors,
                'positions' => $positions,
                'liststatus' => $liststatus,
            ]);
        } else {
            return redirect('/staff');
        }
    }

    function updateadvisor(Request $request, $id) {
        if (Auth::check()) {
            $validator = Validator::make($request->all(), [
                'contact' => 'required|string|min:10|unique:advisors',
            ]);
    
            if ($validator->fails()) {
                return redirect('/staff'. '/' . $id .'/create')
                            ->withErrors($validator)
                            ->withInput();
            }
            DB::beginTransaction();
            try {
                $advisor = Advisor::findOrFail($id);
                $advisor->position_id = $request->position;
                $advisor->firstname = $request->firstname;
                $advisor->lastname = $request->lastname;
                $advisor->email = $request->email;
                $advisor->contact = $request->contact;
                $advisor->faculty_id = $request->faculty;
                $advisor->major_id = $request->major;
                $advisor->status_id = $request->status;
                $advisor->save();
                DB::commit();
            } catch(Exception $e) {
                DB::rollback();
                return response()->json(['error' => $ex->getMessage()], 500);
            }
            Alert::success('Update Success', 'Updated advisor successfuly')->persistent(true,true);
            return redirect(route('staff.advisor.list'));
        } else {
            return redirect('/staff');
        }
    }

    function deleteadvisor($id) {
        if (Auth::check()) {
            DB::beginTransaction();
            try {
                $advisor = Advisor::findOrFail($id);
                $advisor->delete();
                DB::commit();
            } catch(Exception $e) {
                DB::rollback();
                return response()->json(['error' => $ex->getMessage()], 500);
            }
            Alert::success('Delete Success', 'Deleted advisor successfuly')->persistent(true,true);
            return redirect(route('staff.advisor.list'));
        } else {
            return redirect('/staff');
        }
    }

    function advisordocument($id) {
        if (Auth::check()) {
            $advisor = Advisor::findOrFail($id);
            return view('contentstaff.viewadvisor.document', [
                'advisor' => $advisor,
            ]);
        } else {
            return redirect('/staff');
        }
    }
    // end advisor
    // strat staff 
    function liststaff() {
        if (Auth::check()) {
            $staffs = Staff::All();
            return view('contentstaff.viewstaff.list', [
                'staffs' => $staffs,
            ]);
        } else {
            return redirect('/staff');
        }
    }

    function createstaff() {
        if (Auth::check()) {
            $faculties = Faculty::All();
            $positions = Position::All();
            $liststatus = Status::whereIn('name', ['reference','abstract', 'abstract&reference'])->get();
            $permissions = Permission::whereIn('name', ['admin','staff'])->get();
            return view('contentstaff.viewstaff.create', [
                'faculties' => $faculties,
                'positions' => $positions,
                'liststatus' => $liststatus,
                'permissions' => $permissions,
            ]);
        } else {
            return redirect('/staff');
        }
    }

    public function createstaffid() {
        $staff = staff::count();
        if ($staff != '') {
            $staffid = (int)$staff + 1;
            return 'st' . sprintf("%05d",$staffid);
        } else {
            return 'st00001';
        }
    }

    protected function validatorstaff(array $data) {
        return Validator::make($data, [
            'email' => 'required|string|email|max:255|unique:staffs',
            'contact' => 'required|string|min:10|unique:staffs',
        ]);
    }

    function storestaff(Request $request) {
        $validator = $this->validatorstaff($request->all());
        if ($validator->fails()) {
            return redirect('/staff/staff/create')
                        ->withErrors($validator)
                        ->withInput();
        }
        if (Auth::check()) {
            DB::beginTransaction();
            try {
                $password = str_random(10);
                $staff = new staff();
                $staff->staff_id = $this->createstaffid();
                $staff->position_id = $request->position;
                $staff->firstname = $request->firstname;
                $staff->lastname = $request->lastname;
                $staff->email = $request->email;
                $staff->contact = $request->contact;
                $staff->created_by = Auth::user()->staff_id;
                $staff->faculty_id = $request->faculty;
                $staff->department_id = 1;
                $staff->permission_id = $request->permission;
                $staff->status_id = $request->status;
                $staff->regis_pass = $password;
                $staff->password = Hash::make($password);
                $staff->save();
                DB::commit();
            } catch(Exception $e) {
                DB::rollback();
                return response()->json(['error' => $ex->getMessage()], 500);
            }
            Alert::html('Register Success',"Your Email is <b>" . $request->email. "</b> <br> Your Password is <b>" . $password . "</b>",'success')->persistent(true,true);
            return redirect('staff/staff');
        } else {
            return redirect('/staff');
        }
    }

    function editstaff($id) {
        if (Auth::check()) {
            $staff = staff::findOrFail($id);
            $faculties = Faculty::All();
            $majors = Major::All();
            $positions = Position::All();
            $liststatus = Status::whereIn('name', ['reference','abstract', 'abstract&reference'])->get();
            $permissions = Permission::whereIn('name', ['admin','staff'])->get();
            return view('contentstaff.viewstaff.edit', [
                'staff' => $staff,
                'faculties' => $faculties,
                'majors' => $majors,
                'positions' => $positions,
                'liststatus' => $liststatus,
                'permissions' => $permissions,
            ]);
        } else {
            return redirect('/staff');
        }
    }

    function updatestaff(Request $request, $id) {
        if (Auth::check()) {
            DB::beginTransaction();
            try {
                $staff = staff::findOrFail($id);
                $staff->position_id = $request->position;
                $staff->firstname = $request->firstname;
                $staff->lastname = $request->lastname;
                $staff->contact = $request->contact;
                $staff->faculty_id = $request->faculty;
                $staff->permission_id = $request->permission;
                $staff->status_id = $request->status;
                $staff->save();
                DB::commit();
            } catch(Exception $e) {
                DB::rollback();
                return response()->json(['error' => $ex->getMessage()], 500);
            }
            Alert::success('Update Success', 'Updated staff successfuly')->persistent(true,true);
            return redirect(route('staff.staff.list'));
        } else {
            return redirect('/staff');
        }
    }

    function deletestaff($id) {
        if (Auth::check()) {
            DB::beginTransaction();
            try {
                $staff = staff::findOrFail($id);
                $staff->delete();
                DB::commit();
            } catch(Exception $e) {
                DB::rollback();
                return response()->json(['error' => $ex->getMessage()], 500);
            }
            Alert::success('Delete Success', 'Deleted staff successfuly')->persistent(true,true);
            return redirect(route('staff.staff.list'));
        } else {
            return redirect('/staff');
        }
    }

    function staffdocument($id) {
        if (Auth::check()) {
            $staff = staff::findOrFail($id);
            return view('contentstaff.viewstaff.document', [
                'staff' => $staff,
            ]);
        } else {
            return redirect('/staff');
        }
    }
    // end staff
    // strat status 
    function liststatus() {
        if (Auth::check()) {
            $status = Status::All();
            return view('contentstaff.basicdata.viewstatus.list', [
                'status' => $status,
            ]);
        } else {
            return redirect('/staff');
        }
    }

    function createstatus() {
        if (Auth::check()) {
            return view('contentstaff.basicdata.viewstatus.create');
        } else {
            return redirect('/staff');
        }
    }

    function storestatus(Request $request) {
        if (Auth::check()) {
            DB::beginTransaction();
            try {
                $status = new Status();
                $status->name = $request->name;
                $status->note = $request->note;
                $status->created_by = $request->created_by;
                $status->save();
                DB::commit();
            } catch(Exception $e) {
                DB::rollback();
                return response()->json(['error' => $ex->getMessage()], 500);
            }
            Alert::success('Save Success', 'Create status successfuly')->persistent(true,true);
            return redirect('staff/status');
        } else {
            return redirect('/staff');
        }
    }
    
    function editstatus($id) {
        if (Auth::check()) {
            $status = Status::findOrFail($id);
            return view('contentstaff.basicdata.viewstatus.edit', [
                'status' => $status,
            ]);
        } else {
            return redirect('/staff');
        }
    }

    function updatestatus(Request $request, $id) {
        if (Auth::check()) {
            DB::beginTransaction();
            try {
                $status = Status::findOrFail($id);
                $status->name = $request->name;
                $status->note = $request->note;
                if ($request->created_by == "") {
                    $status->created_by = Auth::user()->firstname;
                } else {
                    $status->created_by = $request->created_by;
                }
                $status->save();
                DB::commit();
            } catch(Exception $e) {
                DB::rollback();
                return response()->json(['error' => $ex->getMessage()], 500);
            }
            Alert::success('Update Success', 'Updated status successfuly')->persistent(true,true);
            return redirect(route('staff.status.list'));
        } else {
            return redirect('/staff');
        }
    }

    function deletestatus($id) {
        if (Auth::check()) {
            DB::beginTransaction();
            try {
                $status = Status::findOrFail($id);
                $status->delete();
                DB::commit();
            } catch(Exception $e) {
                DB::rollback();
                return response()->json(['error' => $ex->getMessage()], 500);
            }
            Alert::success('Delete Success', 'Deleted status successfuly')->persistent(true,true);
            return redirect(route('staff.status.list'));
        } else {
            return redirect('/staff');
        }
    }
    // end status
    // start position
    function listposition() {
        if (Auth::check()) {
            $positions = Position::All();
            return view('contentstaff.basicdata.viewposition.list', [
                'positions' => $positions,
            ]);
        } else {
            return redirect('/staff');
        }
    }

    function createposition() {
        if (Auth::check()) {
            return view('contentstaff.basicdata.viewposition.create');
        } else {
            return redirect('/staff');
        }
    }

    function storeposition(Request $request) {
        if (Auth::check()) {
            DB::beginTransaction();
            try {
                $position = new Position();
                $position->name = $request->name;
                $position->note = $request->note;
                $position->created_by = Auth::user()->firstname;
                $position->save();
                DB::commit();
            } catch(Exception $e) {
                DB::rollback();
                return response()->json(['error' => $ex->getMessage()], 500);
            }
            Alert::success('Save Success', 'Create status successfuly')->persistent(true,true);
            return redirect('staff/position');
        } else {
            return redirect('/staff');
        }
    }

    function editposition($id) {
        if (Auth::check()) {
            $position = Position::findOrFail($id);
            return view('contentstaff.basicdata.viewposition.edit', [
                'position' => $position,
            ]);
        } else {
            return redirect('/staff');
        }
    }

    function updateposition(Request $request) {
        if (Auth::check()) {
            DB::beginTransaction();
            try {
                $position = Position::findOrFail($request->position_id);
                $position->name = $request->name;
                $position->note = $request->note;
                if ($request->created_by == "") {
                    $position->created_by = Auth::user()->firstname;
                } else {
                    $position->created_by = $request->created_by;
                }
                $position->save();
                DB::commit();
            } catch(Exception $e) {
                DB::rollback();
                return response()->json(['error' => $ex->getMessage()], 500);
            }
            Alert::success('Update Success', 'Updated position successfuly')->persistent(true,true);
            return redirect('staff/position');
        } else {
            return redirect('/staff');
        }
    }

    function deleteposition($id) {
        if (Auth::check()) {
            DB::beginTransaction();
            try {
                $position = Position::findOrFail($id);
                $position->delete();
                DB::commit();
            } catch(Exception $e) {
                DB::rollback();
                return response()->json(['error' => $ex->getMessage()], 500);
            }
            Alert::success('Delete Success', 'Deleted position successfuly')->persistent(true,true);
            return redirect(route('staff.position.list'));
        } else {
            return redirect('/staff');
        }
    }
    // end position
    // start degree
    function listdegree() {
        if (Auth::check()) {
            $degrees = Degree::All();
            return view('contentstaff.basicdata.viewdegree.list', [
                'degrees' => $degrees,
            ]);
        } else {
            return redirect('/staff');
        }
    }

    function createdegree() {
        if (Auth::check()) {
            return view('contentstaff.basicdata.viewdegree.create');
        } else {
            return redirect('/staff');
        }
    }

    function storedegree(Request $request) {
        if (Auth::check()) {
            DB::beginTransaction();
            try {
                $degree = new Degree();
                $degree->name = $request->name;
                $degree->note = $request->note;
                $degree->created_by = Auth::user()->firstname;
                $degree->save();
                DB::commit();
            } catch(Exception $e) {
                DB::rollback();
                return response()->json(['error' => $ex->getMessage()], 500);
            }
            Alert::success('Save Success', 'Create degree successfuly')->persistent(true,true);
            return redirect('staff/degree');
        } else {
            return redirect('/staff');
        }
    }

    function editdegree($id) {
        if (Auth::check()) {
            $degree = Degree::findOrFail($id);
            return view('contentstaff.basicdata.viewdegree.edit', [
                'degree' => $degree,
            ]);
        } else {
            return redirect('/staff'); 
        }
    }

    function updatedegree(Request $request) {
        if (Auth::check()) {
            DB::beginTransaction();
            try {
                $degree = Degree::findOrFail($request->degree_id);
                $degree->name = $request->name;
                $degree->note = $request->note;
                if ($request->created_by == "") {
                    $degree->created_by = Auth::user()->firstname;
                } else {
                    $degree->created_by = $request->created_by;
                }
                $degree->save();
                DB::commit();
            } catch(Exception $e) {
                DB::rollback();
                return response()->json(['error' => $ex->getMessage()], 500);
            }
            Alert::success('Update Success', 'Updated degree successfuly')->persistent(true,true);
            return redirect('staff/degree');
        } else {
            return redirect('/staff');
        }
    }

    function deletedegree($id) {
        if (Auth::check()) {
            DB::beginTransaction();
            try {
                $degree = Degree::findOrFail($id);
                $degree->delete();
                DB::commit();
            } catch (Exception $e) {
                DB::rollback();
                return response()->json(['error' => $ex->getMessage()], 500);
            }
            Alert::success('Delete Success', 'Deleted degree successfuly')->persistent(true,true);
            return redirect(route('staff.degree.list'));
        } else {
            return redirect('/staff');
        }
    }
    // end degree
    // start faculty
    function listfaculty() {
        if (Auth::check()) {
            $faculties = Faculty::All();
            return view('contentstaff.basicdata.viewfaculty.list', [
                'faculties' => $faculties,
            ]);
        } else {
            return redirect('/staff');
        }
    }

    function createfaculty() {
        if (Auth::check()) {
            return view('contentstaff.basicdata.viewfaculty.create');
        } else {
            return redirect('/staff');
        }
    }

    function storefaculty(Request $request) {
        if (Auth::check()) {
            DB::beginTransaction();
            try {
                $faculty = new Faculty();
                $faculty->name = $request->name;
                $faculty->note = $request->note;
                $faculty->created_by = Auth::user()->firstname;
                $faculty->save();
                DB::commit();
            } catch(Exception $e) {
                DB::rollback();
                return response()->json(['error' => $ex->getMessage()], 500);
            }
            Alert::success('Save Success', 'Create faculty successfuly')->persistent(true,true);
            return redirect('staff/faculty');
        } else {
            return redirect('/staff');
        }
    }

    function editfaculty($id) {
        if (Auth::check()) {
            $faculty = Faculty::findOrFail($id);
            return view('contentstaff.basicdata.viewfaculty.edit', [
                'faculty' => $faculty,
            ]);
        } else {
            return redirect('/staff'); 
        }
    }

    function updatefaculty(Request $request) {
        if (Auth::check()) {
            DB::beginTransaction();
            try {
                $faculty = Faculty::findOrFail($request->faculty_id);
                $faculty->name = $request->name;
                $faculty->note = $request->note;
                if ($request->created_by == "") {
                    $faculty->created_by = Auth::user()->firstname;
                } else {
                    $faculty->created_by = $request->created_by;
                }
                $faculty->save();
                DB::commit();
            } catch(Exception $e) {
                DB::rollback();
                return response()->json(['error' => $ex->getMessage()], 500);
            }
            Alert::success('Update Success', 'Updated faculty successfuly')->persistent(true,true);
            return redirect('staff/faculty');
        } else {
            return redirect('/staff');
        }
    }

    function deletefaculty($id) {
        if (Auth::check()) {
            DB::beginTransaction();
            try {
                $faculty = Faculty::findOrFail($id);
                $faculty->delete();
                DB::commit();
            } catch (Exception $e) {
                DB::rollback();
                return response()->json(['error' => $ex->getMessage()], 500);
            }
            Alert::success('Delete Success', 'Deleted faculty successfuly')->persistent(true,true);
            return redirect(route('staff.faculty.list'));
        } else {
            return redirect('/staff');
        }
    }
    // end faculty
    // start major
    function listmajor() {
        if (Auth::check()) {
            $majors = Major::All();
            return view('contentstaff.basicdata.viewmajor.list', [
                'majors' => $majors,
            ]);
        } else {
            return redirect('/staff');
        }
    }

    function createmajor() {
        if (Auth::check()) {
            return view('contentstaff.basicdata.viewmajor.create');
        } else {
            return redirect('/staff');
        }
    }

    function storemajor(Request $request) {
        if (Auth::check()) {
            DB::beginTransaction();
            try {
                $major = new Major();
                $major->name = $request->name;
                $major->note = $request->note;
                $major->created_by = Auth::user()->firstname;
                $major->save();
                DB::commit();
            } catch(Exception $e) {
                DB::rollback();
                return response()->json(['error' => $ex->getMessage()], 500);
            }
            Alert::success('Save Success', 'Create major successfuly')->persistent(true,true);
            return redirect('staff/major');
        } else {
            return redirect('/staff');
        }
    }

    function editmajor($id) {
        if (Auth::check()) {
            $major = Major::findOrFail($id);
            return view('contentstaff.basicdata.viewmajor.edit', [
                'major' => $major,
            ]);
        } else {
            return redirect('/staff'); 
        }
    }

    function updatemajor(Request $request) {
        if (Auth::check()) {
            DB::beginTransaction();
            try {
                $major = Major::findOrFail($request->major_id);
                $major->name = $request->name;
                $major->note = $request->note;
                if ($request->created_by == "") {
                    $major->created_by = Auth::user()->firstname;
                } else {
                    $major->created_by = $request->created_by;
                }
                $major->save();
                DB::commit();
            } catch(Exception $e) {
                DB::rollback();
                return response()->json(['error' => $ex->getMessage()], 500);
            }
            Alert::success('Update Success', 'Updated major successfuly')->persistent(true,true);
            return redirect('staff/major');
        } else {
            return redirect('/staff');
        }
    }

    function deletemajor($id) {
        if (Auth::check()) {
            DB::beginTransaction();
            try {
                $major = Major::findOrFail($id);
                $major->delete();
                DB::commit();
            } catch (Exception $e) {
                DB::rollback();
                return response()->json(['error' => $ex->getMessage()], 500);
            }
            Alert::success('Delete Success', 'Deleted major successfuly')->persistent(true,true);
            return redirect(route('staff.major.list'));
        } else {
            return redirect('/staff');
        }
    }
    // end major
    // start permission
    function listpermission() {
        if (Auth::check()) {
            $permissions = Permission::All();
            return view('contentstaff.basicdata.viewpermission.list', [
                'permissions' => $permissions,
            ]);
        } else {
            return redirect('/staff');
        }
    }

    function createpermission() {
        if (Auth::check()) {
            return view('contentstaff.basicdata.viewpermission.create');
        } else {
            return redirect('/staff');
        }
    }

    function storepermission(Request $request) {
        if (Auth::check()) {
            DB::beginTransaction();
            try {
                $permission = new Permission();
                $permission->name = $request->name;
                $permission->note = $request->note;
                $permission->created_by = Auth::user()->firstname;
                $permission->save();
                DB::commit();
            } catch(Exception $e) {
                DB::rollback();
                return response()->json(['error' => $ex->getMessage()], 500);
            }
            Alert::success('Save Success', 'Create permission successfuly')->persistent(true,true);
            return redirect('staff/permission');
        } else {
            return redirect('/staff');
        }
    }

    function editpermission($id) {
        if (Auth::check()) {
            $permission = Permission::findOrFail($id);
            return view('contentstaff.basicdata.viewpermission.edit', [
                'permission' => $permission,
            ]);
        } else {
            return redirect('/staff'); 
        }
    }

    function updatepermission(Request $request) {
        if (Auth::check()) {
            DB::beginTransaction();
            try {
                $permission = Permission::findOrFail($request->permission_id);
                $permission->name = $request->name;
                $permission->note = $request->note;
                if ($request->created_by == "") {
                    $permission->created_by = Auth::user()->firstname;
                } else {
                    $permission->created_by = $request->created_by;
                }
                $permission->save();
                DB::commit();
            } catch(Exception $e) {
                DB::rollback();
                return response()->json(['error' => $ex->getMessage()], 500);
            }
            Alert::success('Update Success', 'Updated permission successfuly')->persistent(true,true);
            return redirect('staff/permission');
        } else {
            return redirect('/staff');
        }
    }

    function deletepermission($id) {
        if (Auth::check()) {
            DB::beginTransaction();
            try {
                $permission = Permission::findOrFail($id);
                $permission->delete();
                DB::commit();
            } catch (Exception $e) {
                DB::rollback();
                return response()->json(['error' => $ex->getMessage()], 500);
            }
            Alert::success('Delete Success', 'Deleted permission successfuly')->persistent(true,true);
            return redirect(route('staff.permission.list'));
        } else {
            return redirect('/staff');
        }
    }
    // end permission
}