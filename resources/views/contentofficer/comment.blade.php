@extends('layouts.officers.template')

@section('title')
	Comment Word
@endsection

@section('breadcrumb') 
    Comment Word
@endsection

@section('style')
	<style type="text/css">
	</style>
@endsection

@section('content')
	<div class="container">
        <form action="{{ url('officer/word/comment') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="text-right">
                        <button class="btn btn-primary waves-effect waves-light" type="submit" style="width: 104.25px;"><i class="fa fa-save"></i> Save</button>
                        <button class="btn btn-danger waves-effect waves-light" type="reset"><i class="mdi mdi-close"></i> Cancel</button>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card-block">
                        <div class="row mb-2">
                            <input type="hidden" name="number" value="{{ $file->number }}">
                            <div class="col-lg-6 mb-2">
                                <label>Comment</label>
                                <code class="highlighter-rouge"><strong>*</strong></code>
                                <textarea class="form-control" name="textcomment" rows="5" required placeholder="Comment..."></textarea>
                            </div>
                            <div class="col-lg-6 mb-2">
                                <label>Status</label>
                                <select name="status" class="form-control" readonly required>
                                    <option value="" selected disabled>-----Select-----</option>
                                    @foreach ($liststatus as $status)
                                        <option value="{{$status->status_id}}" {{ old('status') == $status->status_id ? 'selected' : '' }}>{{$status->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-lg-6 mb-2">
                                <label>Filename</label>
                                <code class="highlighter-rouge"><strong>*</strong></code>
                                <input type="text" class="form-control" name="filename" maxlength="191" value="{{ $file->filename }}" pattern="[a-zA-Z0-9ก-ุฯ-๙\s]*" placeholder="Enter your Filename" readonly/>
                            </div>
                            <div class="col-lg-6 mb-2">
                                <label>New File Word</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" id="filename" placeholder="Choose File" readonly>
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-success" type="button">
                                            <input type="file" name="word" class="custom-file-input" id="customFile" accept=".docx" hidden>
                                            <label class="custom-file-label m-0" for="customFile">Choose file</label>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-lg-12 mb-2">
                                <label>Fileupload comment</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" id="filenamecomment" placeholder="Choose File" readonly>
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-success" type="button">
                                            <input type="file" name="comment" class="custom-file-input-comment" id="customFilecomment" accept=".jpg, .png" hidden>
                                            <label class="custom-file-label m-0" for="customFilecomment">Choose file</label>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
	</div>
@endsection

@section('script')
    <script type="text/javascript" src="{{ asset('plugins/parsleyjs/parsley.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('form').parsley();
        });

        $(".custom-file-input").change(function (){       
            var file = this.files[0];
            var reader = new FileReader();
            // Set preview image into the popover data-content
            reader.onload = function (e) {
                $("#filename").val(file.name);
            }        
            reader.readAsDataURL(file);
        });

        $(".custom-file-input-comment").change(function (){       
            var file = this.files[0];
            var reader = new FileReader();
            // Set preview image into the popover data-content
            reader.onload = function (e) {
                $("#filenamecomment").val(file.name);
            }        
            reader.readAsDataURL(file);
        }); 
    </script>
@endsection