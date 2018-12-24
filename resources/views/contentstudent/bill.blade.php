@extends('layouts.students.template')

@section('title')
    Student Upload Bill
@endsection

@section('breadcrumb') 
    Student Upload Bill
@endsection

@section('style')
    <style>
        .card {
            border: 1px solid #ccc;
        }

        .a:focus,
        a:hover {
            color: #ffffff;
            text-decoration: underline;
        }
    </style>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-block">
                <h4 class="text-muted text-center"><b>Upload Bill</b></h4>
                <div class="p-3">
                    <form method="POST" action="{{ route('student.bill.submit') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card card-block border-0 p-3">
                            <div class="input-group">
                                <input type="text" class="form-control" id="filename" placeholder="Choose File" readonly>
                                <div class="input-group-append">
                                    <button class="btn btn-outline-success" type="button">
                                        <input type="file" name="bill" class="custom-file-input" id="customFile" accept=".jpg, .png" required hidden>
                                        <label class="custom-file-label m-0" for="customFile">Choose file</label>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2 offset-md-5">
                                <div class="form-group text-center row m-t-20">
                                    <button class="btn btn-primary btn-block waves-effect waves-light" type="submit">Upload</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $(".custom-file-input").change(function (){       
        var file = this.files[0];
        var reader = new FileReader();
        // Set preview image into the popover data-content
        reader.onload = function (e) {
            $("#filename").val(file.name);
        }        
        reader.readAsDataURL(file);
    });  
</script>
@endsection
