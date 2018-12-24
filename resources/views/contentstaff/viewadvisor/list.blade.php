@extends('layouts.staffs.template')

@section('title')
	List Advisor
@endsection

@section('breadcrumb')
    List Advisor
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
			<div class="col-lg-12 text-right" style="padding-bottom: 20px">
				<a href="{{ route('staff.advisor.create') }}" class="btn btn-dark waves-effect waves-light"><i class="mdi mdi-plus" style="font-weight: bold"></i> New Advisor</a>
			</div>
			<div class="col-12">
				<div class="card m-b-20">
					<div class="card-block">
						<table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
							<thead>
							<tr>
								<th class="text-center">Advisor ID</th>
								<th class="text-center">Name</th>
								<th class="text-center">Faculty</th>
								<th class="text-center">Major</th>
								<th class="text-center">Status</th>
								<th class="text-center">Action</th>
							</tr>
							</thead>
							<tbody>
							@foreach ($advisors as $advisor)
								<tr>
									<td class="text-center">{{ $advisor->advisor_id }}</td>
									<td class="text-center">{{ $advisor->position->name }} {{ $advisor->firstname }} {{ $advisor->lastname }}</td>
                  					<td class="text-center">{{ $advisor->faculty->name }}</td>
									<td class="text-center">{{ $advisor->major->name }}</td>
									<td class="text-center">{{ $advisor->status->name }}</td>
									<td class="text-center">
										<a class="font-20" href="{{ url('/staff/advisor'. '/' . $advisor->advisor_id . '/edit') }}" data-toggle="tooltip" data-placement="top" title="edit"><i class="fa fa-pencil"></i></a>
										<a class="font-20 text-info" href="{{ url('/staff/advisor'. '/' . $advisor->advisor_id . '/print') }}" data-toggle="tooltip" data-placement="top" title="print"><i class="fa fa-print"></i></a>
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
