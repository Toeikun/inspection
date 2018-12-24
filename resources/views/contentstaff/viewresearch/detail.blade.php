@extends('layouts.staffs.template')

@section('title')
	List Document
@endsection

@section('breadcrumb') 
    List Document
@endsection

@section('style')
	<!-- DataTables -->
	<link href="{{asset('plugins/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{asset('plugins/datatables/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
	<!-- Responsive datatable examples -->
	<link href="{{asset('plugins/datatables/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />

	<style type="text/css">

	</style>
@endsection

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="card m-b-20">
					<div class="card-block">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#word" role="tab">Word</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#pdf" role="tab">PDF</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active p-3" id="word" role="tabpanel">
                                <table id="datatableword" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th class="text-center">No.</th>
                                        <th class="text-center">File Name</th>
                                        <th class="text-center">Status</th>
                                        {{-- <th class="text-center">Word</th>
                                        <th class="text-center">PDF</th> --}}
                                        <th class="text-center">Sent Date</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($listfiles as $index => $listfile)
                                        <tr>
                                            <td class="text-center">{{ $index + 1 }}</td>
                                            <td class="text-center">{{ $listfile->filename }}</td>
                                            <td class="text-center">{{ $listfile->status->name }}</td>
                                                {{-- <td class="text-center">{{ $listfile->faculty->name }}</td> --}}
                                            <td class="text-center">{{Carbon\Carbon::parse($listfile->sent_date)->format('d-m-Y')}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane p-3" id="pdf" role="tabpanel">
                                <table id="datatablepdf" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th class="text-center">No.</th>
                                        <th class="text-center">File Name</th>
                                        <th class="text-center">Status</th>
                                        {{-- <th class="text-center">Word</th>
                                        <th class="text-center">PDF</th> --}}
                                        <th class="text-center">Sent Date</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($listpdf as $index => $listfile)
                                        <tr>
                                            <td class="text-center">{{ $index + 1 }}</td>
                                            <td class="text-center">{{ $listfile->filename }}</td>
                                            <td class="text-center">{{ $listfile->status->name }}</td>
                                                {{-- <td class="text-center">{{ $listfile->faculty->name }}</td> --}}
                                            <td class="text-center">{{Carbon\Carbon::parse($listfile->sent_date)->format('d-m-Y')}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
					</div>
				</div>
			</div> <!-- end col -->
		</div>
	</div>
@endsection

@section('script')
	<!-- Required datatable js -->
	<script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
	<script src="{{asset('plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>
	<!-- Buttons examples -->
	<script src="{{asset('plugins/datatables/dataTables.buttons.min.js')}}"></script>
	<script src="{{asset('plugins/datatables/buttons.bootstrap4.min.js')}}"></script>
	<script src="{{asset('plugins/datatables/jszip.min.js')}}"></script>
	<script src="{{asset('plugins/datatables/pdfmake.min.js')}}"></script>
	<script src="{{asset('plugins/datatables/vfs_fonts.js')}}"></script>
	<script src="{{asset('plugins/datatables/buttons.html5.min.js')}}"></script>
	<script src="{{asset('plugins/datatables/buttons.print.min.js')}}"></script>
	<script src="{{asset('plugins/datatables/buttons.colVis.min.js')}}"></script>

	<!-- Responsive examples -->
	<script src="{{asset('plugins/datatables/dataTables.responsive.min.js')}}"></script>
	<script src="{{asset('plugins/datatables/responsive.bootstrap4.min.js')}}"></script>

	<!-- Datatable init js -->
	<script src="{{asset('pages/datatables.init.js')}}"></script>
@endsection
