@extends('layouts.app')

@section('title')
    Student Register
@endsection

@section('style')
    <style>
        .card {
            border: 1px solid #ccc;
        }

        .a:focus,
        a:hover {
            color: #ffffff;
            text-decoration: underline;
        }
    </style>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-block">
                <h3 class="text-center mt-0 m-b-15">
                    <a href="{{ url('/login') }}" class="logo logo-admin"><img src="{{ asset('images/siam-logo.png') }}" height="80" alt="logo"></a>
                </h3>
                <h4 class="text-muted text-center"><b>Student SIGN IN</b></h4>
                <div class="p-3">
                    <form method="POST" action="{{ route('student.register.submit') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <label>Student Information</label>
                                <div class="card card-block border-0 p-3">
                                    <div class="form-group mb-3 {{ $errors->has('student_id') ? ' has-error' : '' }}">
                                        <label>Student ID</label>
                                        <input type="text" class="form-control" name="student_id" value="{{ old('student_id') }}" required placeholder="Student ID" />
                                        @if ($errors->has('student_id'))
                                            <span class="help-block">
                                                <span class="text-danger">{{ $errors->first('student_id') }}</span>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group mb-3 {{ $errors->has('firstname') ? ' has-error' : '' }}">
                                        <label>FirstName</label>
                                        <input type="text" class="form-control" name="firstname" value="{{ old('firstname') }}" required placeholder="FirstName" />
                                        @if ($errors->has('firstname'))
                                            <span class="help-block">
                                                <span class="text-danger">{{ $errors->first('firstname') }}</span>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group mb-3 {{ $errors->has('lastname') ? ' has-error' : '' }}">
                                        <label>LastName</label>
                                        <input type="text" class="form-control" name="lastname" value="{{ old('lastname') }}" required placeholder="LastName" />
                                        @if ($errors->has('lastname'))
                                            <span class="help-block">
                                                <span class="text-danger">{{ $errors->first('lastname') }}</span>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group mb-3 {{ $errors->has('faculty') ? ' has-error' : '' }}">
                                        <label>Faculties</label>
                                        <select name="faculty" id="faculty" class="form-control" required>
                                            <option value="" selected disabled>-----Select-----</option>
                                            @foreach ($faculties as $faculty)
                                            <option value="{{$faculty->faculty_id}}"
                                                {{ old('faculty') == $faculty->faculty_id ? 'selected' : '' }}>{{$faculty->name}}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('faculty'))
                                            <span class="help-block">
                                                <span class="text-danger">{{ $errors->first('faculty') }}</span>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group mb-3 {{ $errors->has('major') ? ' has-error' : '' }}">
                                        <label>Majors</label>
                                        <select name="major" id="major" class="form-control" required>
                                            <option value="" selected disabled>-----Select-----</option>
                                            @foreach ($majors as $major)
                                            <option value="{{$major->major_id}}"
                                                {{ old('major') == $major->major_id ? 'selected' : '' }}>{{$major->name}}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('major'))
                                            <span class="help-block">
                                                <span class="text-danger">{{ $errors->first('major') }}</span>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group mb-3 {{ $errors->has('degree') ? ' has-error' : '' }}">
                                        <label>Degrees</label>
                                        <select name="degree" id="degree" class="form-control" required>
                                            <option value="" selected disabled>-----Select-----</option>
                                            @foreach ($degrees as $degree)
                                            <option value="{{ $degree->degree_id }}" {{ old('degree') ==
                                                $degree->degree_id ? 'selected' : '' }}>{{ $degree->name }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('degree'))
                                            <span class="help-block">
                                                <span class="text-danger">{{ $errors->first('degree') }}</span>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group mb-3 {{ $errors->has('years') ? ' has-error' : '' }}">
                                        <label>Years</label>
                                        <input type="text" name="years" id="years" class="form-control" value="{{ old('years') }}" minlength="4"
                                            maxlength="4" pattern="[0-9\s]*" placeholder="Years" required>
                                        @if ($errors->has('years'))
                                            <span class="help-block">
                                                <span class="text-danger">{{ $errors->first('years') }}</span>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group mb-3 {{ $errors->has('semester') ? ' has-error' : '' }}">
                                        <label>Semester</label>
                                        <input type="text" name="semester" id="semester" class="form-control" value="{{ old('semester') }}" minlength="1"
                                            maxlength="1" pattern="[0-9\s]*" placeholder="Semester" required>
                                        @if ($errors->has('semester'))
                                            <span class="help-block">
                                                <span class="text-danger">{{ $errors->first('semester') }}</span>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group mb-3 {{ $errors->has('email') ? ' has-error' : '' }}">
                                        <label>Email</label>
                                        <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" parsley-type="email"
                                            maxlength="191" placeholder="Enter a valid e-mail" required>
                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group mb-3 {{ $errors->has('contact') ? ' has-error' : '' }}">
                                        <label>Mobile</label>
                                        <input type="text" name="contact" id="contact" class="form-control" value="{{ old('contact') }}" minlength="10"
                                            maxlength="10" placeholder="Enter a valid contact" required>
                                        @if ($errors->has('contact'))
                                            <span class="help-block">
                                                <span class="text-danger">{{ $errors->first('contact') }}</span>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label>Research Information</label>
                                <div class="card card-block border-0 p-3">
                                    <div class="form-group mb-3 {{ $errors->has('th_topic') ? ' has-error' : '' }}">
                                        <label>Thai Topic</label>
                                        <input type="text" class="form-control" value="{{ old('th_topic') }}" pattern="[a-zA-Z0-9ก-ุฯ-๙\s]*" name="th_topic" required placeholder="Thai Topic" />
                                        @if ($errors->has('th_topic'))
                                            <span class="help-block">
                                                <span class="text-danger">{{ $errors->first('th_topic') }}</span>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group mb-3 {{ $errors->has('th_topic') ? ' has-error' : '' }}">
                                        <label>English Topic</label>
                                        <input type="text" class="form-control" value="{{ old('eng_topic') }}" name="eng_topic" required placeholder="English Topic" />
                                        @if ($errors->has('eng_topic'))
                                            <span class="help-block">
                                                <span class="text-danger">{{ $errors->first('eng_topic') }}</span>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Advisor</label>
                                        <select name="advisor" id="advisor" class="form-control" required>
                                            <option value="" selected disabled>-----Select-----</option>
                                            @foreach ($advisors as $advisor)
                                            <option value="{{ $advisor->advisor_id }}"
                                                {{ old('advisor') == $advisor->advisor_id ? 'selected' : '' }}>{{
                                                $advisor->position->name }} {{ $advisor->firstname }} {{ $advisor->lastname
                                                }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Co-Advisor</label>
                                        <select name="coadvisor" id="coadvisor" class="form-control">
                                            <option value="" selected disabled>-----Select-----</option>
                                            @foreach ($coadvisors as $coadvisor)
                                            <option value="{{ $coadvisor->advisor_id }}"
                                                {{ old('coadvisor') == $coadvisor->advisor_id ? 'selected' : '' }}>{{
                                                $coadvisor->position->name }} {{ $coadvisor->firstname }} {{ $coadvisor->lastname
                                                }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 offset-md-5">
                                <div class="form-group text-center row m-t-20">
                                    <button class="btn btn-primary btn-block waves-effect waves-light" type="submit">Register</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script type="text/javascript" src="{{ asset('plugins/parsleyjs/parsley.min.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('form').parsley();
        });
    </script>
@endsection
