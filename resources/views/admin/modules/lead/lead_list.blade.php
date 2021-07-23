@extends('admin.layouts.app')
@section('title')
<title>Admin | Lead list</title>
@endsection
@section('left_part')
@include('admin.include.left_part')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
@endsection
@section('content')






<!-- Start right Content here -->
<!-- ============================================================== -->
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
						<th scope="col">Name</th>
						<th scope="col">Mail ID</th>
						<th scope="col">Phone Number</th>
						<th scope="col">Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach($leads as $key=> $value)
					<tr>
						<td data-label="Select"><input type="checkbox"></td>
						<td data-label="Name">{{@$value->user_name}}</td>
						<td data-label="Mail ID">{{@$value->user_email}}</td>
						<td data-label="Phone Number">{{@$value->ph}}</td>
						<td data-label="Action">
							<a href="#"><i class="fa add-round">+</i></a>
							<a href="#"><i class="fa fa-edit edit-round"></i></a>
							<a href="#"><i class="fa fa-trash-o del-round"></i></a>
						</td>
				 	</tr>
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
oTable = $('#example').DataTable();  
$('#myInputTextField').keyup(function(){
      oTable.search($(this).val()).draw() ;
})
</script>
@endsection