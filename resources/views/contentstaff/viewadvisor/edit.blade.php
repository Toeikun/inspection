@extends('layouts.staffs.template')

@section('title')
  Edit Advisor
@endsection

@section('breadcrumb')
  Edit Advisor
@endsection

@section('style')

@endsection

@section('content')
  <div class="container">
    <form class="form-horizontal" action="{{ url('/staff/advisor'. '/' . $advisor->advisor_id) }}" method="POST">
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
            <div class="form-group mb-3">
              <label>Position</label>
              <select name="position" id="position" class="form-control" required>
                <option value="" selected disabled>-----Select-----</option>
                @foreach ($positions as $position)
                    <option value="{{$position->position_id}}" {{ $advisor->faculty_id == $position->position_id ? 'selected' : '' }}>{{$position->name}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group mb-3">
                <label>FirstName</label>
                <input type="text" class="form-control" name="firstname" value="{{ $advisor->firstname }}" required placeholder="FirstName"/>
            </div>
            <div class="form-group mb-3">
                <label>LastName</label>
                <input type="text" class="form-control" name="lastname" value="{{ $advisor->lastname }}" required placeholder="LastName"/>
            </div>
            <div class="form-group mb-3">
                <label>Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ $advisor->email }}" parsley-type="email" maxlength="191" placeholder="Enter a valid e-mail" required>
            </div>
            <div class="form-group mb-3">
                <label>Mobile</label>
                <input type="text" name="contact" id="contact" class="form-control" value="{{ $advisor->contact }}" minlength="10" maxlength="10" placeholder="Enter a valid contact" required>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="card card-block border-0 p-3">
            <div class="form-group mb-3">
                <label>Faculties</label>
                <select name="faculty" id="faculty" class="form-control" required>
                    <option value="" selected disabled>-----Select-----</option>
                    @foreach ($faculties as $faculty)
                        <option value="{{$faculty->faculty_id}}" {{ $advisor->faculty_id == $faculty->faculty_id ? 'selected' : '' }}>{{$faculty->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mb-3">
                <label>Majors</label>
                <select name="major" id="major" class="form-control" required>
                    <option value="" selected disabled>-----Select-----</option>
                    @foreach ($majors as $major)
                        <option value="{{$major->major_id}}" {{ $advisor->major_id == $major->major_id ? 'selected' : '' }}>{{$major->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mb-3">
                <label>Status</label>
                <select name="status" class="form-control" required>
                    <option value="" selected disabled>-----Select-----</option>
                    @foreach ($liststatus as $status)
                        <option value="{{$status->status_id}}" {{ $advisor->status_id == $status->status_id ? 'selected' : '' }}>{{$status->name}}</option>
                    @endforeach
                </select>
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
