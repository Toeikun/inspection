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
                                    <div class="p-2 bd-dark font-20">เอกสารการใช้ระบบ</div>
                                    <div class="p-2 bd-dark">
                                        <strong>Register Date:</strong><br>
                                        {{Carbon\Carbon::parse($advisor->created_at)->format('d/m/Y')}}
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-12">
                                    <address>
                                        <strong>Advisor Information:</strong><br>
                                        Name-Surname : {{ $advisor->position->name }} {{ $advisor->firstname }} {{ $advisor->lastname }}<br>
                                        Faculty : {{ $advisor->faculty->name }}<br>
                                        Major : {{ $advisor->major->name }}<br>
                                        Mobile : {{ $advisor->contact }}<br>
                                        Email : {{ $advisor->email }} <br>
                                        Password : {{ $advisor->regis_pass }}
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
