@extends('layouts.staffs.template')

@section('title')
	List Student
@endsection

@section('breadcrumb')
    List Student
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
			{{-- <div class="col-lg-12 text-right" style="padding-bottom: 20px">
				<a href="{{ url('staff/newstudent') }}" class="btn btn-dark waves-effect waves-light"><i class="mdi mdi-plus" style="font-weight: bold"></i> Register Student</a>
			</div> --}}
			<div class="col-12">
				<div class="card m-b-20">
					<div class="card-block">
						<table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
							<thead>
							<tr>
								<th class="text-center">Student ID</th>
								<th class="text-center">Name</th>
								<th class="text-center">Faculty</th>
								<th class="text-center">Major</th>
								<th class="text-center">Created By</th>
								<th class="text-center">Action</th>
							</tr>
							</thead>
							<tbody>
							@foreach ($students as $student)
								<tr>
									<td class="text-center">{{ $student->student_id }}</td>
									<td class="text-center">{{ $student->firstname }} {{ $student->lastname }}</td>
                  					<td class="text-center">{{ $student->faculty->name }}</td>
									<td class="text-center">{{ $student->major->name }}</td>
									<td class="text-center">{{ $student->created_by }}</td>
									<td class="text-center">
										<a class="font-20" href="{{ url('/staff/student'. '/' . $student->student_id . '/edit') }}" data-toggle="tooltip" data-placement="top" title="edit"><i class="fa fa-pencil"></i></a>
										<a class="font-20 text-info" href="{{ url('/staff/student'. '/' . $student->student_id . '/print') }}" data-toggle="tooltip" data-placement="top" title="print"><i class="fa fa-print"></i></a>
										@if ($student->status_id == 2)
											<a class="font-20 text-danger" href="{{ url('/staff/student'. '/' . $student->student_id . '/bill') }}" data-toggle="tooltip" data-placement="top" title="approve bill"><i class="fa fa-file-image-o"></i></a>
										@endif
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
