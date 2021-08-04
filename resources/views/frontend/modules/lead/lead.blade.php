@extends('layouts.app')
@section('title')
<title>User | My lead</title>
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
				
				{{-- 	<div class="col-xs-4">
					<div class="dropdown">
						<a href="{{route('my.target.future')}}" class="btn btn-primary" style=" color: white; "><div class="br-r">Future leads</div>
					</a>
					<span class="caret"></span>
				</div>
				
			</div> --}}
			{{-- <div class="col-xs-4">
				<div class="dropdown">
					<a href="{{route('my.target.past')}}" class="btn btn-primary" style=" color: white; float: right;"><div class="br-r">Past targets</div>
				</a>
				<span class="caret"></span>
			</div>
			
		</div> --}}
	</div>
</div>
<div class="top-row">
	<table id="example" class="cell-border">
		<thead>
			<tr>
				<th scope="col"><input type="checkbox"></th>
				<th scope="col">id</th>
				<th scope="col">Name</th>
				<th scope="col">Mobile no</th>
				<th scope="col">Application status</th>
				
				<th scope="col">Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach($leads as $key=> $value)
			<tr>
				<td data-label="Select"><input type="checkbox"></td>
				<td data-label="Name">{{@$value->id}}</td>
				<td data-label="Name">{{@$value->user_name}}</td>
				<td data-label="Phone Number">{{@$value->ph}}</td>
				<td data-label="Mail ID">@if(@$value->application_status=="P")
					<p>Pending</p>
					@elseif(@$value->application_status=="IC")
					<p>Incomplete</p>
					@elseif(@$value->application_status=="C")
					<p>Complete</p>
					@else
					<p>Rejected</p>
				@endif</td>
				
				
				
				<td data-label="Action">
					
					@if(@$value->application_status!="C")
					<a href=""  type="button"  data-toggle="modal" data-target="#myModalchange{{@$value->id}}"  style="margin-left: 5px;"><i class="fa fa-edit add-round"></i></a>
					@else
					<a href="#" ><i class="fa add-round" style="background-color: lime">&#10003;</i></a>
					@endif
					{{-- <a  href=""style="margin-left: 5px;"><i class="fa fa-trash-o del-round"></i></a> --}}
					<a href="#" type="button"  data-toggle="modal" data-target="#myModalview{{@$value->id}}" style="margin-left: 5px; font-size:25px"><i class="fa fa-eye edit-round"  aria-hidden="true"></i></a>
				</td>
			</tr>
			{{-- for change status --}}
			<div class="modal" id="myModalchange{{@$value->id}}">
				<div class="modal-dialog">
					<div class="modal-content">
						<!-- Modal Header -->
						<div class="modal-header">
							<h4 class="modal-title">Application status of lead no {{@$value->id}}</h4>
							
						</div>
						<!-- Modal body -->
						<div class="modal-body">
							<form method="post" action="{{route('change.lead.status')}}">
								@csrf
								<div class="e-col">
									<input type="hidden" name="lead_id" value="{{@$value->id}}">
									<select class="form-control form-select" name="status" >
										<option selected value="">Chnage status</option>
										<option value="C">Completed</option>
										<option value="IC">Incompleted</option>
										<option value="R">Rejected</option>
									</select>
									<br>
									<p>Comment</p>
									<p><textarea name="comment" style="width: 100%; height: 100px">{{@$value->comment}}</textarea></p>
								</div>
								
								<input type="submit" class="btn btn-primary" value="Change">
							</form>
						</div>
						<!-- Modal footer -->
						<div class="modal-footer">
							
							
							<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
						</div>
					</div>
				</div>
			</div>
			{{-- for view --}}
			<div class="modal" id="myModalview{{@$value->id}}">
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
			</div>
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