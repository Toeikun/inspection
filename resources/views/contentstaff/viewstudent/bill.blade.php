@extends('layouts.staffs.template')

@section('title')
	List Student
@endsection

@section('breadcrumb')
    List Student
@endsection

@section('style')
    <!-- Magnific popup -->
    <link href="{{ asset('plugins/magnific-popup/magnific-popup.css') }}" rel="stylesheet" type="text/css">
	<style type="text/css">

	</style>
@endsection

@section('content')
	<div class="container">
        <form method="POST" action="{{ url('/staff/student' . '/' . $student->student_id . '/bill') }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-lg-12 text-right" style="padding-bottom: 20px">
                    <button class="btn btn-primary waves-effect waves-light" type="submit" style="width: 104.25px;"><i class="fa fa-save"></i> Save</button>
                </div>
                <div class="col-lg-6">
                    <div class="card card-block">
                        <address>
                            <strong>Student Information:</strong><br>
                            Semester : {{ $student->semester }} Academic year : {{ $student->years }}<br>
                            Faculty : {{ $student->faculty->name }}<br>
                            Major : {{ $student->major->name }}<br>
                            Degree : {{ $student->degree->name }}<br>
                            Student ID : {{ $student->student_id }}<br>
                            Name-Surname : {{ $student->firstname }} {{ $student->lastname }}<br>
                            Mobile : {{ $student->contact }}<br>
                            Email : {{ $student->email }} <br>
                        </address>
                        <address>
                            <strong>Research Information:</strong><br>
                            Research ID : {{ $research->research_id }}<br>
                            Thai Topic : {{ $research->th_topic }}<br>
                            English : {{ $research->eng_topic }}<br>
                            Advisor : {{ $advisor->position->name }} {{ $advisor->firstname }} {{ $advisor->lastname }}
                        </address>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card card-block">
                        <h4 class="mt-0 header-title">View Bill Image</h4>
                        <p class="text-muted m-b-30 font-14">กรุณาตรวจสอบ Bill เพื่อเปลี่ยนสถานะ ในนักศึกษาเข้าใช้งานได้.</p>
                        <div class="popup-gallery">
                            @foreach ($bills as $bill) 
                            <a class="pull-left" href="{{  asset('storage' . '/' . $student->student_id. '/' . 'bill' . '/' . $bill->name) }}" title="{{ $bill->name }}">
                                <div class="img-responsive">
                                    <img src="{{ asset('storage' . '/' . $student->student_id. '/' . 'bill' . '/' . $bill->name) }}" width="120">
                                </div>
                            </a>
                            @endforeach
                        </div>
                        <div class="form-group mt-3">
                            <label>Status</label>
                            <select name="status" class="form-control" required>
                                <option value="" selected disabled>-----Select-----</option>
                                @foreach ($status as $liststatus)
                                    <option value="{{$liststatus->status_id}}" {{ $student->status_id == $liststatus->status_id ? 'selected' : '' }}>{{$liststatus->name}}</option>
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
	<!-- Magnific popup -->
    <script src="{{ asset('plugins/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('pages/lightbox.js') }}"></script>
@endsection
