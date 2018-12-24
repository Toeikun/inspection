@extends('layouts.staffs.template')

@section('title')
	List Research
@endsection

@section('breadcrumb')
    List Research
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
								<th class="text-center">Research ID</th>
								{{-- <th class="text-center">Topic TH</th> --}}
								<th class="text-center">Topic Eng</th>
								<th class="text-center">Limit</th>
                                <th class="text-center">Abstract</th>
                                <th class="text-center">Reference</th>
								<th class="text-center">Action</th>
							</tr>
							</thead>
							<tbody>
							@foreach ($research as $listresearch)
								<tr>
									<td class="text-center">{{ $listresearch->research_id }}</td>
									{{-- <td class="text-center">{{ $listresearch->th_topic }}</td> --}}
                  					<td class="text-center">{{ $listresearch->eng_topic }}</td>
									<td class="text-center">{{ $listresearch->limit }}</td>
                                    <td class="text-center">
                                        @switch($listresearch->ab_status_id)
                                            @case(6)
                                                ผ่าน
                                                @break
                                            @case(7)
                                                รอตรวจ
                                                @break
                                            @case(8)
                                                รอแก้ไข
                                                @break
                                            @default
                                                active
                                                @break
                                        @endswitch
                                    </td>
                                    <td class="text-center">
                                        @switch($listresearch->re_status_id)
                                            @case(6)
                                                ผ่าน
                                                @break
                                            @case(7)
                                                รอตรวจ
                                                @break
                                            @case(8)
                                                รอแก้ไข
                                                @break
                                            @default
                                                active
                                                @break
                                        @endswitch
                                    </td>
									<td class="text-center">
										@if (Auth::user()->permission->name == "admin")
										<a class="font-20 text-dark" href="{{ url('/staff/research'. '/' . $listresearch->research_id . '/setting') }}" data-toggle="tooltip" data-placement="top" title="setting"><i class="fa fa-cog"></i></a>
										@endif
										<a class="font-20 text-primary" href="{{ url('/staff/research'. '/' . $listresearch->research_id . '/detail') }}" data-toggle="tooltip" data-placement="top" title="detail"><i class="fa fa-list-alt"></i></a>
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
