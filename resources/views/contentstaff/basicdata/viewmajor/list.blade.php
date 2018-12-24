@extends('layouts.staffs.template')

@section('title')
	List Major
@endsection

@section('breadcrumb')
    List Major
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
				<a href="{{ route('staff.major.create') }}" class="btn btn-dark waves-effect waves-light"><i class="mdi mdi-plus" style="font-weight: bold"></i> New Major</a>
			</div>
			<div class="col-12">
				<div class="card m-b-20">
					<div class="card-block">
						<table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
							<thead>
                                <tr>
                                    <th class="text-center">No.</th>
                                    <th class="text-center">Name</th>
                                    <th class="text-center">Created By</th>
                                    <th class="text-center">Action</th>
                                </tr>
							</thead>
							<tbody>
							@foreach ($majors as $index => $major)
								<tr>
                                    <td class="text-center">{{ $index + 1 }}</td>
									<td class="text-center">{{ $major->name }}</td>
									<td class="text-center">{{ $major->created_by }}</td>
									<td class="text-center">
										<a class="font-20" href="{{ url('/staff/major'. '/' . $major->major_id . '/edit') }}"><i class="fa fa-pencil"></i></a>
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
	<script>
		$(document).on('click', '#delete-btn', function(e) {
			e.preventDefault();
			var link = $(this);
			swal({
                title: "Confirm Delete Major.",
				text: "Are you sure to delete major?",
				type: "warning",
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!'
            }).then(function () {
                setTimeout(function() {
					window.location = link.attr('href');
				},1000)
            })
		});
	</script>
@endsection
