<?php

namespace App\Http\Controllers\Auth;

use DB;
use Auth;
use Storage;
use Carbon\Carbon;
use App\User;
use App\Advisor;
use App\Faculty;
use App\Degree;
use App\Major;
use App\Research;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function showRegistrationForm () {
        $advisors = Advisor::where('status_id', 1)->get();
        $coadvisors = Advisor::where('status_id', 9)->get();
        $faculties = Faculty::All();
        $degrees = Degree::All();
        $majors = Major::All();
        return view('auth.register', [
            'advisors' => $advisors,
            'faculties' => $faculties,
            'degrees' => $degrees,
            'majors' => $majors,
            'coadvisors' => $coadvisors,
        ]);
    }

    protected function validator(array $data) {
        return Validator::make($data, [
            'student_id' => 'required|string|max:10|min:10|unique:students',
            'email' => 'required|string|email|max:255|unique:students',
            // 'research_id' => 'required|string|min:6|unique:research',
        ]);
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

    public function createresearchid() {
        $research = Research::count();
        if ($research != '') {
            $researchid = (int)$research + 1;
            return 'Rs' . sprintf("%05d",$researchid);
        } else {
            return 'Rs00001';
        }
    }

    function register(Request $request) {
        // $this->checkstuid($request->student_id);
        // $this->checkemail($request->email);
        // $this->checkresid($request->research_id);
        $validator = $this->validator($request->all());
        if ($validator->fails()) {
            return redirect('student/register')
                        ->withErrors($validator)
                        ->withInput();
        }

        DB::beginTransaction();
        try {
            $password = str_random(10);
            $researchid = $this->createresearchid();

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
            $newstudent->status_id = 2;
            $newstudent->created_by = 'web';
            $newstudent->years = $request->years;
            $newstudent->semester = $request->semester;
            $newstudent->save();

            $newresearch = new Research();
            $newresearch->research_id = $researchid;
            $newresearch->research_code = $request->research_id;
            $newresearch->th_topic = $request->th_topic;
            $newresearch->eng_topic = $request->eng_topic;
            $newresearch->student_id = $request->student_id;
            $newresearch->advisor_id = $request->advisor;
            $newresearch->ab_status_id = 1;
            $newresearch->re_status_id = 1;
            if ($request->coadvisor == NULL) {
                $newresearch->co_advisor_id = NULL;
            } else {
                $newresearch->co_advisor_id = $request->coadvisor;
            }
            $newresearch->status_id = 1;
            $newresearch->limit = 3;
            $newresearch->save();

            Storage::makeDirectory($request->student_id);

            DB::commit();
            Alert::html('Register Success',"Your Email is <b>" . $request->email. "</b> <br> Your Password is <b>" . $password . "</b>",'success')->persistent(true,true);
            return redirect('/student');
        } catch(Exception $e) {
            DB::rollback();
            return response()->json(['error' => $ex->getMessage()], 500);
        }
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data) {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
