@extends('layouts.officers.template')

@section('title')
Dashboard
@endsection

@section('breadcrumb')
Dashboard
@endsection

@section('style')
<style>
    .card-inverse {
        color: #fff;
    }
</style>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-6 col-sm-12">
            <div class="card card-block border-0 p-3">
                <label>Abstract</label>
                <div class="row">
                    @foreach ($research_ab as $ab)  
                        <div class="col-md-6">
                            <div class="card card-block p-3 card-inverse" style="background-color: #333; border-color: #333;">
                                <address>
                                    Student ID : {{ $ab->student_id }}<br>
                                    Name-Surname : {{ $ab->st_firstname }} {{ $ab->st_lastname }}<br>
                                    Research ID : {{ $ab->research_id }}<br>
                                    English : {{ $ab->eng_topic }}<br>
                                    Advisor : {{ $ab->name }} {{ $ab->ad_firstname }} {{ $ab->ad_lastname }}
                                </address>
                                <p class="card-text text-right">
                                    <small><a href="{{ url('/officer/listfile' . '/' . $ab->research_id . '/' . 'abstract') }}" class="text-primary card-link">Show list file</a></small>
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-sm-12">
            <div class="card card-block border-0 p-3">
                <label>Reference</label>
                <div class="row">
                    @foreach ($research_re as $re)  
                        <div class="col-md-6">
                            <div class="card card-block p-3 card-inverse" style="background-color: #333; border-color: #333;">
                                <address>
                                    Student ID : {{ $re->student_id }}<br>
                                    Name-Surname : {{ $re->st_firstname }} {{ $re->st_lastname }}<br>
                                    Research ID : {{ $re->research_id }}<br>
                                    English : {{ $re->eng_topic }}<br>
                                    Advisor : {{ $re->name }} {{ $re->ad_firstname }} {{ $re->ad_lastname }}
                                </address>
                                <p class="card-text text-right">
                                    <small><a href="{{ url('/officer/listfile' . '/' . $re->research_id . '/' . 'reference') }}" class="text-primary card-link">Show list file</a></small>
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')

@endsection
