@extends('layouts.staffs.app') 

@section('title') 
Reset Password 
@endsection 

@section('style')

@endsection 

@section('breadcrumb') 
Reset 
@endsection 

@section('content')
<div class="accountbg"></div>
<div class="wrapper-page">
	<div class="card-block">
		<h3 class="text-center mt-0 m-b-15">
			<a href="{{ url('/staff') }}" class="logo logo-admin">
				<img src="{{ asset('images/logo.png') }}" height="80" alt="logo">
			</a>
		</h3>
		@if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
		@endif
		<h4 class="text-muted text-center font-18">
			<b>STAFF RESET PASSWORD</b>
		</h4>

		<div class="p-3">
			<form class="form-horizontal" method="POST" action="{{ route('staff.password.submit') }}">
				@csrf
				<input type="hidden" name="token" value="{{ $token }}">
				<div class="form-group row {{ $errors->has('email') ? 'has-error' : '' }}">
					<div class="col-12">
						<input id="email" class="form-control" type="email" name="email" value="{{ $email or old('email') }}" placeholder="Email" required autofocus> 
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
						@endif
					</div>
				</div>
				<div class="form-group row {{ $errors->has('password') ? 'has-error' : '' }}">
					<div class="col-12">
                        <input id="password" type="password" class="form-control" name="password" placeholder="Password" required> 
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
						@endif
					</div>
				</div>
				<div class="form-group row {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
					<div class="col-12">
						<input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Password Confirmation" required> 
                        @if ($errors->has('password_confirmation'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                            </span>
						@endif
					</div>
				</div>
				<div class="form-group text-center row m-t-20">
					<div class="col-12">
						<button class="btn btn-primary btn-block waves-effect waves-light" style="font-family:Kanit" type="submit">Reset Password</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection

@section('script')
@endsection