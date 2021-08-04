@extends('layouts.app')
@section('title')
<title>User | My salary</title>
@endsection
@section('left_part')
@include('frontend.include.left_part')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
@section('content')
<!-- Start right Content here -->
<!-- ============================================================== -->
@include('frontend.include.errors')
<div class="container-fluid">
	<div class="body-main">
		<div class="top-row">
			<div class="task-mg-row b-b-n">

	</div>
</div>
<div class="top-row">
	<table id="example" class="cell-border">
		<thead>
			<tr>
				<th scope="col"><input type="checkbox"></th>
				<th scope="col">id</th>
				<th scope="col">Year</th>
				<th scope="col">Month</th>
				<th scope="col">Salary</th>
				<th scope="col">Target achived</th>
				
				{{-- <th scope="col">Action</th> --}}
			</tr>
		</thead>
		<tbody>
			@foreach($salary as $key=> $value)
			<tr>
				<td data-label="Select"><input type="checkbox"></td>
				<td data-label="Name">{{@$value->id}}</td>
				<td data-label="Name">{{@$value->year}}</td>

			{{-- 	@php
                $month=array('January','February','March','April','May','June','July','August','September','October','November','December');
                @endphp --}}

                @if(@$value->month_id==1)
                <td data-label="Mail ID"> January </td>
                @elseif(@$value->month_id==2)
                <td data-label="Mail ID"> February </td>

                 @elseif(@$value->month_id==3)
                <td data-label="Mail ID"> March </td>

                 @elseif(@$value->month_id==4)
                <td data-label="Mail ID"> April </td>

                 @elseif(@$value->month_id==5)
                <td data-label="Mail ID"> May </td>

                 @elseif(@$value->month_id==6)
                <td data-label="Mail ID"> June </td>

                 @elseif(@$value->month_id==7)
                <td data-label="Mail ID"> July </td>

                 @elseif(@$value->month_id==8)
                <td data-label="Mail ID"> August </td>

                 @elseif(@$value->month_id==9)
                <td data-label="Mail ID"> September </td>

                 @elseif(@$value->month_id==10)
                <td data-label="Mail ID"> October </td>

                 @elseif(@$value->month_id==11)
                <td data-label="Mail ID"> November </td>

                 @else
                <td data-label="Mail ID"> December </td>
                @endif




				<td data-label="Name">{{@$value->salary}}</td>
				<td data-label="Name">{{@$value->target_achive}}</td>
				{{-- <td data-label="Mail ID">@if(@$value->application_status=="P")
					<p>Pending</p>
					@elseif(@$value->application_status=="IC")
					<p>Incomplete</p>
					@elseif(@$value->application_status=="C")
					<p>Complete</p>
					@else
					<p>Rejected</p>
				@endif</td> --}}
				{{-- <td data-label="Phone Number">( {{@$value->targett->from_target}} - {{@$value->targett->to_target}} )</td>
				<td data-label="Name">{{@$value->user_target_achived}}</td> --}}
				
				{{-- <td data-label="Action"> 
				 @if(@$value->tagging_id && @$value->application_status!="C")
					<a href="#" type="button"  data-toggle="modal" data-target="#myModalressing{{@$value->id}}" style="margin-left: 5px;"><i class="fa add-round">&#8592;</i></a>
					@elseif(@$value->tagging_id && @$value->application_status=="C")
					<a href="#" style="margin-left: 5px;"><i class="fa add-round" style="background-color: lime">&#10003;</i></a>
					@else
					<a href="#" type="button"  data-toggle="modal" data-target="#myModal{{@$value->id}}" style="margin-left: 5px;"><i class="fa add-round" style="background-color: red">+</i></a>
					@endif
					<a href="{{route('lead.edit',$value->id)}}" style="margin-left: 5px;"><i class="fa fa-edit edit-round"></i></a>
					<a onclick="return confirm('Are you sure want to delete this lead?');" href="{{route('lead.delete',$value->id)}}" style="margin-left: 5px;"><i class="fa fa-trash-o del-round"></i></a>
					<a href="#" type="button"  data-toggle="modal" data-target="#myModalview{{@$value->id}}" style="margin-left: 5px; font-size:25px"><i class="fa fa-eye" aria-hidden="true"></i></a>
					</td> --}}
			</tr>
			
			{{-- for view --}}
			{{-- <div class="modal" id="myModalview{{@$value->id}}">
				<div class="modal-dialog">
					<div class="modal-content">
						<!-- Modal Header -->
						<div class="modal-header">
							<h4 class="modal-title">Details of Lead no {{@$value->id}}</h4>
							
						</div>
						<!-- Modal body -->
						<div class="modal-body">
							
							<h5> Name </h5>
							<p>{{@$value->user_name}}</p>
							<h5> Email </h5>
							<p>{{@$value->user_email}}</p>
							<h5> Address </h5>
							<p>{{@$value->user_address}}</p>
							<h5> Mobile no </h5>
							<p>{{@$value->ph}}</p>
							<h5> application status </h5>
							@if(@$value->application_status=="P")
							<p>Pending</p>
							@elseif(@$value->application_status=="IC")
							<p>Incomplete</p>
							@elseif(@$value->application_status=="C")
							<p>Complete</p>
							@else
							<p>Rejected</p>
							@endif
							
						</div>
						<!-- Modal footer -->
						<div class="modal-footer">
							
							
							<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
						</div>
					</div>
				</div>
			</div> --}}
			@endforeach
			
		</tbody>
	</table>
</div>
</div>
</div>
<!-- ============================================================== -->
<!-- End Right content here -->
{{-- @section('footer')
@include('frontend.include.footer')
@endsection --}}
@endsection
{{-- end content --}}
@section('script')
@include('frontend.include.script')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
<script>
oTable = $('#example').DataTable({
"bSort": false
});
$('#myInputTextField').keyup(function(){
oTable.search($(this).val()).draw() ;
})
</script>
@endsection