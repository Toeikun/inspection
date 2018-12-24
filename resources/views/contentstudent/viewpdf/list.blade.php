@extends('layouts.students.template')

@section('title')
	List PDF
@endsection

@section('breadcrumb') 
    List PDF
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
						<table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
							<thead>
							<tr>
								<th class="text-center">No.</th>
								<th class="text-center">File Name</th>
								<th class="text-center">Status</th>
								{{-- <th class="text-center">Word</th>
								<th class="text-center">PDF</th> --}}
								<th class="text-center">Sent Date</th>
								<th class="text-center">Action</th>
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
									<td class="text-center">
										<a class="font-20" href="{{ url('/student/pdf'. '/' . $listfile->number . '/edit') }}" data-toggle="tooltip" data-placement="top" title="edit"><i class="fa fa-pencil"></i></a>
									</td>
								</tr>
							@endforeach
							</tbody>
						</table>
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
