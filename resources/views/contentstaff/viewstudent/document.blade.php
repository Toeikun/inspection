@extends('layouts.staffs.template')

@section('title')
  Document
@endsection

@section('breadcrumb')
  Document
@endsection

@section('style')

@endsection

@section('content')
  <div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card m-b-20">
                <div class="card-block">

                    <div class="row">
                        <div class="col-12">
                            <div class="invoice-title">
                                <div class="d-flex justify-content-between bd-dark mb-3">
                                    <div class="p-2 bd-dark">
                                        <h3 class="m-0">
                                            <img src="{{ asset('images/siam-logo.png') }}" alt="logo" height="70"/>
                                        </h3>
                                    </div>
                                    <div class="p-2 bd-dark font-20">เอกสารการสมัครใช้ระบบ</div>
                                    <div class="p-2 bd-dark">
                                        <strong>Register Date:</strong><br>
                                        {{Carbon\Carbon::parse($student->created_at)->format('d/m/Y')}}
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-6">
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
                                        Password : {{ $student->regis_pass }}
                                    </address>
                                </div>
                                <div class="col-6">
                                    <address>
                                        <strong>Research Information:</strong><br>
                                        Research ID : {{ $research->research_id }}<br>
                                        Thai Topic : {{ $research->th_topic }}<br>
                                        English : {{ $research->eng_topic }}<br>
                                        Advisor : {{ $advisor->position->name }} {{ $advisor->firstname }} {{ $advisor->lastname }}
                                    </address>
                                </div>
                            </div>
                            <hr>
                            <div class="hidden-print">
                                <div class="pull-right">
                                    <a href="javascript:window.print()" class="btn btn-success waves-effect waves-light"><i class="fa fa-print"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end col -->
    </div>
  </div>
@endsection

@section('script')

@endsection
