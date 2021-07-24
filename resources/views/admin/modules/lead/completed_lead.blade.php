@extends('admin.layouts.app')
@section('title')
<title>Admin | Lead list</title>
@endsection
@section('left_part')
@include('admin.include.left_part')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
@section('content')
<!-- Start right Content here -->
<!-- ============================================================== -->
@include('admin.include.errors')
<div class="container-fluid">
	<div class="body-main">
		<div class="top-row">
			<div class="task-mg-row b-b-n">
				<div class="dropdown">
					<a href="{{route('lead.add.form')}}" class="add-btn dropdown-toggle" style=" color: white; ">	{{-- <button class="add-btn dropdown-toggle" id="navbarDropdown" data-bs-toggle="dropdown" type="button"> --}}<span class="plus">+</span> <div class="br-r">Add Lead</div>
				</a>
				<span class="caret"></span></button>
			</div>
			
			
		</div>
	</div>
	<div class="top-row">
		<table id="example">
			<thead>
				<tr>
					<th scope="col"><input type="checkbox"></th>
					<th scope="col">id</th>
					<th scope="col">Name</th>
					<th scope="col">Mail ID</th>
					<th scope="col">Phone Number</th>
					<th scope="col">Assing to</th>
					<th scope="col">Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach($leads as $key=> $value)
				<tr>
					<td data-label="Select"><input type="checkbox"></td>
					<td data-label="Name">{{@$value->id}}</td>
					<td data-label="Name">{{@$value->user_name}}</td>
					<td data-label="Mail ID">{{@$value->user_email}}</td>
					<td data-label="Phone Number">{{@$value->ph}}</td>
					<td data-label="Phone Number">@if(@$value->user->name){{@$value->user->name}}@else Not assiengd @endif</td>
					<td data-label="Action">

						<a href="#"><i class="fa add-round" style="background-color: lime">&#10003;</i></a>


						


						<a href="{{route('lead.edit',$value->id)}}"><i class="fa fa-edit edit-round"></i></a>
						<a onclick="return confirm('Are you sure want to delete this lead?');" href="{{route('lead.delete',$value->id)}}"><i class="fa fa-trash-o del-round"></i></a>


						<a href="#" type="button"  data-toggle="modal" data-target="#myModalview{{@$value->id}}" style="margin-left: 8px; font-size: 20px"><i class="fa fa-eye" aria-hidden="true"></i></a>
						
					</td>
				</tr>
			

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
@include('admin.include.footer')
@endsection --}}
@endsection
{{-- end content --}}
@section('script')
@include('admin.include.script')
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