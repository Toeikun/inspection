@extends('layouts.staffs.template')

@section('title')
    Setting Research
@endsection

@section('breadcrumb')
    Setting Research
@endsection

@section('style')
@endsection

@section('content')
	<div class="container">
        <form method="POST" action="{{ url('/staff/research' . '/' . $research->research_id . '/settinginspection') }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-lg-12 text-right" style="padding-bottom: 20px">
                    <button class="btn btn-primary waves-effect waves-light" type="submit" style="width: 104.25px;"><i class="fa fa-save"></i> Save</button>
                </div>
                <div class="col-lg-6">
                    <div class="card card-block">
                        <address>
                            <strong>Inspection In Project :</strong><br>
                            Abstract : {{ $staff_ab->position->name }} {{ $staff_ab->firstname }} {{ $staff_ab->lastname }}<br>
                            Reference : {{ $staff_re->position->name }} {{ $staff_re->firstname }} {{ $staff_re->lastname }}<br>
                        </address>
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
                        <h4 class="mt-0 header-title">Setting Inspection In Project</h4>
                        <div class="form-group mt-3">
                            <label>Abstract</label>
                            <select name="abstract" class="form-control">
                                <option value="" selected disabled>-----Select-----</option>
                                @foreach ($abstracts as $abstract)
                                    <option value="{{$abstract->staff_id}}" {{ old('abstract') == $abstract->staff_id ? 'selected' : '' }}>{{ $abstract->firstname }} {{ $abstract->lastname }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mt-3">
                            <label>Reference</label>
                            <select name="reference" class="form-control">
                                <option value="" selected disabled>-----Select-----</option>
                                @foreach ($references as $reference)
                                    <option value="{{$reference->staff_id}}" {{ old('reference') == $reference->staff_id ? 'selected' : '' }}>{{ $reference->firstname }} {{ $reference->lastname }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mt-3">
                            <label>Abstract & Reference</label>
                            <select name="abstractandreference" class="form-control">
                                <option value="" selected disabled>-----Select-----</option>
                                @foreach ($abstractandreferences as $abstractandreference)
                                    <option value="{{$abstractandreference->staff_id}}" {{ old('abstractandreference') == $abstractandreference->staff_id ? 'selected' : '' }}>{{ $abstractandreference->firstname }} {{ $abstractandreference->lastname }}</option>
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
@endsection
