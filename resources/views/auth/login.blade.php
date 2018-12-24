@extends('layouts.app')

@section('title')
Student Login
@endsection

@section('style')
<style type="text/css">
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
<!-- Begin page -->
<div class="accountbg"></div>
<div class="wrapper-page">
    <div class="card-block">
        <h3 class="text-center mt-0 m-b-15">
            <a href="{{ route('student.register.submit') }}" class="logo logo-admin"><img src="{{ asset('images/siam-logo.png') }}" height="80" alt="logo"></a>
        </h3>
        <h4 class="text-muted text-center"><b>Student SIGN IN</b></h4>
        <div class="p-3">
            <form class="form-horizontal m-t-20" method="POST" action="{{ route('student.login.submit') }}">
                @csrf
                <div class="form-group row{{ $errors->has('email') ? ' has-error' : '' }}">
                    <div class="col-12">
                        <input id="email" name="email" type="email" class="form-control" value="{{ old('email') }}" required placeholder="Email" autofocus>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong class="text-danger">{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row{{ $errors->has('password') ? ' has-error' : '' }}">
                    <div class="col-12">
                        <input id="password" name="password" type="password" class="form-control" required placeholder="Password">
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group text-center row m-t-20">
                    <div class="col-12">
                        <button class="btn btn-primary btn-block waves-effect waves-light" type="submit">Log In</button>
                    </div>
                </div>
                <div class="form-group m-t-10 mb-0 row">
                    <div class="col-sm-6 m-t-20 text-left">
                        <a href="{{ route('student.register') }}" class="text-muted"><i class="mdi mdi-account-circle"></i> ลงทะเบียน</a>
                    </div>
                    <div class="col-sm-6 m-t-20 text-right">
                        <a href="{{ route('student.password.request') }}" class="text-muted"><i class="mdi mdi-lock"></i> ลืมรหัสผ่าน?</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
