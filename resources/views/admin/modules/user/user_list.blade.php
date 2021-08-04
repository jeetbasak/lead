@extends('admin.layouts.app')
@section('title')
<title>Admin | User List</title>
@endsection
@section('left_part')
@include('admin.include.left_part')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
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

					{{-- <a href="{{route('lead.add.form')}}" class="add-btn dropdown-toggle" style=" color: white; ">	<button class="add-btn dropdown-toggle" id="navbarDropdown" data-bs-toggle="dropdown" type="button"><span class="plus">+</span> <div class="br-r">Add Lead</div> --}}

				</a>
				<span class="caret"></span></button>
			</div>
			
			
		</div>
	</div>
	<div class="top-row">
		<table id="example" class="cell-border">
			<thead>
				<tr>
					<th scope="col"><input type="checkbox"></th>
					<th scope="col">Name</th>
					<th scope="col">Email</th>
					<th>Status</th>
					<th scope="col">Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach($users as $key=> $value)
				<tr>
					<td data-label="Select"><input type="checkbox"></td>
					<td data-label="Name">{{@$value->name}}</td>
					<td data-label="Name">{{@$value->email}}</td>
					<td>
						@if(@$value->status=="AA")
						Awating Approval
						@elseif(@$value->status=="A")
						Active
						@elseif(@$value->status=="I")
						Inactive
						@endif
					</td>
					<td data-label="Action">
					

					<a href="{{route('admin.user.edit',$value->id)}}"><i class="fa fa-edit edit-round"></i></a>

					<a onclick="return confirm('Are you sure want to delete this user?');" href="{{route('admin.user.delete',$value->id)}}" style="margin-left: 5px;"><i class="fa fa-trash-o del-round"></i></a>
					
					@if(@$value->status=="AA")
					<a onclick="return confirm('Are you sure want to active this user?');" href="{{route('admin.user.change.status',$value->id)}}" style="margin-left: 5px;">Accept</a>
					@endif

					@if(@$value->status=="I")
					<a onclick="return confirm('Are you sure want to active this user?');" href="{{route('admin.user.change.status',$value->id)}}" style="margin-left: 5px;">Active</a>
					@endif

					@if(@$value->status=="A")
					<a onclick="return confirm('Are you sure want to active this user?');" href="{{route('admin.user.change.status',$value->id)}}" style="margin-left: 5px;">Inactive</a>
					@endif
					
					
					<a href="{{route('admin.user.view',['id'=>@$value->id])}}" type="button"  style="margin-left: 5px; font-size:25px"><i class="fa fa-eye" aria-hidden="true"></i></a>
						
					</td>
				</tr>
				
				
				{{-- for view user --}}
				<div class="modal" id="myModalview{{@$value->id}}">
					<div class="modal-dialog">
						<div class="modal-content">
							<!-- Modal Header -->
							<div class="modal-header">
								<h4 class="modal-title">User Details</h4>
								
							</div>
							<!-- Modal body -->
							<div class="modal-body">
								<h5> Name </h5>
								<p>{{@$value->name}}</p>
								<h5> Email </h5>
								<p>{{@$value->email}}</p>
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