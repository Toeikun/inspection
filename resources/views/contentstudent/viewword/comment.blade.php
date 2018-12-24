@extends('layouts.students.template')

@section('title')
	Comment Word
@endsection

@section('breadcrumb') 
    Comment Word
@endsection

@section('style')
    <!-- Magnific popup -->
    <link href="{{ asset('plugins/magnific-popup/magnific-popup.css') }}" rel="stylesheet" type="text/css">
    <style type="text/css">
	</style>
@endsection

@section('content')
	<div class="container">
        <div class="row mb-2">
            <div class="col-lg-12 mb-2">
                <div class="text-right">
                    <a class="btn btn-primary waves-effect waves-light" href="{{ url('/student/list') }}"><i class="fa fa-list"></i> List File</a>
                </div>
            </div>
            <div class="card-block">
                <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th class="text-center">No.</th>
                        <th class="text-center">Comment</th>
                        <th class="text-center">Comment Date</th>
                        <th class="text-center">Comment Image</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($commentdetail as $index => $comment)
                        <tr>
                            <td class="text-center">{{ $index + 1 }}</td>
                            <td class="text-center">{{ $comment->comment }}</td>
                            <td class="text-center">{{Carbon\Carbon::parse($comment->read_date)->format('d-m-Y')}}</td>
                            <td class="text-center">
                                @if ($comment->file_comment != NUll)
                                    <div class="popup-gallery">
                                        <a href="{{  asset('storage' . '/' . Auth::user()->student_id . '/' . 'comment' . '/' . $comment->file_comment) }}" title="{{ $comment->file_comment }}">
                                            <div class="img-responsive">
                                                <img src="{{ asset('storage' . '/' . Auth::user()->student_id . '/' . 'comment' . '/' . $comment->file_comment) }}" width="15">
                                            </div>
                                        </a>
                                    </div>
                                @else
                                    Could no file
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            {{-- <div class="col-lg-6 mb-2">
                <div class="card card-block">
                    <label>Comment</label>
                    <textarea class="form-control" name="textcomment" rows="5" required placeholder="Comment..." readonly>{{ $comment->comment }}</textarea>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card card-block">
                    <h4 class="mt-0 header-title">View Comment Image</h4>
                    <div class="popup-gallery">
                        @foreach ($commentdetail as $index => $comment)
                            @if ($comment->file_comment == NULL)
                                <a class="pull-left" href="{{  asset('storage' . '/' . Auth::user()->student_id . '/' . 'comment' . '/' . $comment->file_comment) }}" title="{{ $comment->file_comment }}">
                                    <div class="img-responsive">
                                        <img src="{{ asset('storage' . '/' . Auth::user()->student_id . '/' . 'comment' . '/' . $comment->file_comment) }}" width="120">
                                    </div>
                                </a>
                            @else
                                @if ($index == 0)
                                    Could no file
                                @endif
                            @endif
                        @endforeach
                    </div>
                </div>
            </div> --}}
        </div>
	</div>
@endsection

@section('script')
    <!-- Magnific popup -->
    <script src="{{ asset('plugins/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('pages/lightbox.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/parsleyjs/parsley.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('form').parsley();
        });
    </script>
@endsection