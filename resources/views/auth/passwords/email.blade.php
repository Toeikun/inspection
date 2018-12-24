@extends('layouts.staffs.app')

@section('title')
Forgot Password
@endsection

@section('style')

@endsection

@section('content')
<div class="accountbg"></div>
<div class="wrapper-page">
    <div class="card-block">
        <h3 class="text-center mt-0 m-b-15">
            <a href="{{ url('/student') }}" class="logo logo-admin"><img src="{{ asset('images/siam-logo.png') }}" height="80"
                    alt="logo"></a>
        </h3>
        <h4 class="text-muted text-center font-18"><b>STUDENT RESET PASSWORD</b></h4>
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <div class="p-3">
            <form class="form-horizontal" method="POST" action="{{ route('student.password.email') }}">
                @csrf
                <div class="alert alert-info alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    Enter your <b>Email</b> and instructions will be sent to you!
                </div>
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <div class="col-xs-12">
                        <input class="form-control" id="email" name="email" type="email" placeholder="Email" value="{{ old('email') }}"
                            required>
                    </div>
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong class="text-danger">{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group text-center row m-t-20">
                    <div class="col-12">
                        <button class="btn btn-primary btn-block waves-effect waves-light" type="submit">Send Email</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
