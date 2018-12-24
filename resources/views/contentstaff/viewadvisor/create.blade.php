@extends('layouts.staffs.template')

@section('title')
  New Advisor
@endsection

@section('breadcrumb')
  New Advisor
@endsection

@section('style')

@endsection

@section('content')
  <div class="container">
    <form class="form-horizontal" action="{{ route('staff.advisor.store') }}" method="POST">
      @csrf
      <div class="row">
        <div class="col-12" style="padding-bottom: 10px;">
          <div class="hidden-print">
            <div class="pull-right">
              <button class="btn btn-primary waves-effect waves-light" type="submit" style="width: 104.25px;"><i class="fa fa-save"></i> Save</button>
              <button class="btn btn-danger waves-effect waves-light" type="reset"><i class="mdi mdi-close"></i> Cancel</button>
            </div>
          </div>
        </div>
      </div>
      <div class="row mt-2">
        <div class="col-lg-6">
          <div class="card card-block border-0 p-3">
            <div class="form-group mb-3 {{ $errors->has('position') ? ' has-error' : '' }}">
              <label>Position</label>
              <select name="position" id="position" class="form-control" required>
                <option value="" selected disabled>-----Select-----</option>
                @foreach ($positions as $position)
                    <option value="{{$position->position_id}}" {{ old('position_id') == $position->position_id ? 'selected' : '' }}>{{$position->name}}</option>
                @endforeach
              </select>
              @if ($errors->has('position'))
                <span class="help-block">
                  <span class="text-danger">{{ $errors->first('position') }}</span>
                </span>
              @endif
            </div>
            <div class="form-group mb-3 {{ $errors->has('firstname') ? ' has-error' : '' }}">
                <label>FirstName</label>
                <input type="text" class="form-control" name="firstname" value="{{ old('firstname') }}" required placeholder="FirstName"/>
                @if ($errors->has('firstname'))
                  <span class="help-block">
                    <span class="text-danger">{{ $errors->first('firstname') }}</span>
                  </span>
                @endif
              </div>
            <div class="form-group mb-3 {{ $errors->has('lastname') ? ' has-error' : '' }}">
                <label>LastName</label>
                <input type="text" class="form-control" name="lastname" value="{{ old('lastname') }}" required placeholder="LastName"/>
                @if ($errors->has('lastname'))
                  <span class="help-block">
                    <span class="text-danger">{{ $errors->first('lastname') }}</span>
                  </span>
                @endif
              </div>
            <div class="form-group mb-3 {{ $errors->has('email') ? ' has-error' : '' }}">
                <label>Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" parsley-type="email" maxlength="191" placeholder="Enter a valid e-mail" required>
                @if ($errors->has('email'))
                  <span class="help-block">
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                  </span>
                @endif
              </div>
            <div class="form-group mb-3 {{ $errors->has('email') ? ' has-error' : '' }}">
                <label>Mobile</label>
                <input type="text" name="contact" id="contact" class="form-control" value="{{ old('contact') }}" minlength="10" maxlength="10" placeholder="Enter a valid contact" required>
                @if ($errors->has('contact'))
                  <span class="help-block">
                    <span class="text-danger">{{ $errors->first('contact') }}</span>
                  </span>
                @endif
             </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="card card-block border-0 p-3">
            <div class="form-group mb-3 {{ $errors->has('faculty') ? ' has-error' : '' }}">
                <label>Faculties</label>
                <select name="faculty" id="faculty" class="form-control" required>
                    <option value="" selected disabled>-----Select-----</option>
                    @foreach ($faculties as $faculty)
                        <option value="{{$faculty->faculty_id}}" {{ old('faculty') == $faculty->faculty_id ? 'selected' : '' }}>{{$faculty->name}}</option>
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
                        <option value="{{$major->major_id}}" {{ old('major') == $major->major_id ? 'selected' : '' }}>{{$major->name}}</option>
                    @endforeach
                </select>
                @if ($errors->has('major'))
                  <span class="help-block">
                    <span class="text-danger">{{ $errors->first('major') }}</span>
                  </span>
                @endif
            </div>
            <div class="form-group mb-3 {{ $errors->has('status') ? ' has-error' : '' }}">
                <label>Status</label>
                <select name="status" class="form-control" required>
                    <option value="" selected disabled>-----Select-----</option>
                    @foreach ($liststatus as $status)
                        <option value="{{$status->status_id}}" {{ old('status') == $status->status_id ? 'selected' : '' }}>{{$status->name}}</option>
                    @endforeach
                </select>
                @if ($errors->has('status'))
                  <span class="help-block">
                    <span class="text-danger">{{ $errors->first('status') }}</span>
                  </span>
                @endif
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
@endsection

@section('script')
  <!-- Parsley js -->
  <script type="text/javascript" src="{{asset('plugins/parsleyjs/parsley.min.js')}}"></script>
  <script type="text/javascript">
    $(document).ready(function() {
        $('form').parsley();
    });
  </script>
@endsection
