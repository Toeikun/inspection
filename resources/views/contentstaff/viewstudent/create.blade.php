@extends('layouts.staffs.template')

@section('title')
  Register
@endsection

@section('breadcrumb')
  Register
@endsection

@section('style')

@endsection

@section('content')
  <div class="container">
    <form class="form-horizontal" action="{{ route('staff.newstudent.submit') }}" method="POST">
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
          <label>Student Information</label>
          <div class="card card-block border-0 p-3">
            <div class="form-group mb-3">
              <label>Student ID</label>
              <input type="text" class="form-control" name="student_id" required placeholder="Student ID"/>
            </div>
            <div class="form-group mb-3">
              <label>FirstName</label>
              <input type="text" class="form-control" name="firstname" required placeholder="FirstName"/>
            </div>
            <div class="form-group mb-3">
              <label>LastName</label>
              <input type="text" class="form-control" name="lastname" required placeholder="LastName"/>
            </div>
            <div class="form-group mb-3">
              <label>Faculties</label>
              <select name="faculty" id="faculty" class="form-control" required>
                <option value="" selected disabled>-----Select-----</option>
                @foreach ($faculties as $faculty)
                  <option value="{{$faculty->faculty_id}}" {{ old('faculty_id') == $faculty->faculty_id ? 'selected' : '' }}>{{$faculty->name}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group mb-3">
              <label>Majors</label>
              <select name="major" id="major" class="form-control" required>
                <option value="" selected disabled>-----Select-----</option>
                @foreach ($majors as $major)
                  <option value="{{$major->major_id}}" {{ old('major_id') == $major->major_id ? 'selected' : '' }}>{{$major->name}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group mb-3">
              <label>Degrees</label>
              <select name="degree" id="degree" class="form-control" required>
                <option value="" selected disabled>-----Select-----</option>
                @foreach ($degrees as $degree)
                  <option value="{{ $degree->degree_id }}">{{ old('degree_id') == $degree->degree_id ? 'selected' : '' }}{{ $degree->name }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group mb-3">
              <label>Years</label>
              <input type="text" name="years" id="years" class="form-control" minlength="4" maxlength="4" pattern="[0-9\s]*" placeholder="Years" required>
            </div>
            <div class="form-group mb-3">
              <label>Semester</label>
              <input type="text" name="semester" id="semester" class="form-control" minlength="1" maxlength="1" pattern="[0-9\s]*" placeholder="Semester" required>
            </div>
            <div class="form-group mb-3">
              <label>Email</label>
              <input type="email" name="email" id="email" class="form-control" parsley-type="email" maxlength="191" placeholder="Enter a valid e-mail" required>
            </div>
            <div class="form-group mb-3">
              <label>Mobile</label>
              <input type="text" name="contact" id="contact" class="form-control" minlength="10" maxlength="10" placeholder="Enter a valid contact" required>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <label>Research Information</label>
          <div class="card card-block border-0 p-3">
            <div class="form-group mb-3">
              <label>Research ID</label>
              <input type="text" class="form-control" name="research_id" required placeholder="Research ID"/>
            </div>
            <div class="form-group mb-3">
              <label>Thai Topic</label>
              <input type="text" class="form-control" name="th_topic" required placeholder="Thai Topic"/>
            </div>
            <div class="form-group mb-3">
              <label>English Topic</label>
              <input type="text" class="form-control" name="eng_topic" required placeholder="English Topic"/>
            </div>
            <div class="form-group mb-3">
              <label>Advisor</label>
              @if ($advisors == Null)
                <br>
                <a href="{{ url('staff/advisor') }}" class="btn btn-success waves-effect waves-light"><i class="mdi mdi-plus" style="font-weight: bold"></i> Add Advisor</a>
              @else
                <select name="advisor" id="advisor" class="form-control" required>
                  <option value="" selected disabled>-----Select-----</option>
                  @foreach ($advisors as $advisor)
                    <option value="{{ $advisor->advisor_id }}" {{ old('advisor_id') == $advisor->advisor_id ? 'selected' : '' }}>{{ $advisor->position->name }} {{ $advisor->firstname }} {{ $advisor->lastname }}</option>
                  @endforeach
                </select>
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
