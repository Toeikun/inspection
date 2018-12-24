@extends('layouts.staffs.template')

@section('title')
    Edit Status
@endsection

@section('breadcrumb')
    Edit Status
@endsection

@section('style')

@endsection

@section('content')
  <div class="container">
    <form class="form-horizontal" action="{{ url('staff/status'. '/' . $status->status_id) }}" method="POST">
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
            <input type="text" class="form-control" name="status_id" value="{{ $status->status_id }}" readonly hidden/>
            <div class="form-group mb-3">
              <label>Name</label>
              <input type="text" class="form-control" name="name" value="{{ $status->name }}" required placeholder="Name"/>
            </div>
            <div class="form-group mb-3">
              <label>Note</label>
              <textarea class="form-control" name="note" rows="5" required placeholder="Note">{{ $status->note }}</textarea>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="card card-block border-0 p-3">
            <div class="form-group mb-3">
              <label>Created By</label>
              <input type="text" class="form-control" value="{{ $status->created_by }}" name="created_by" readonly/>
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
