@extends('admin.layouts.app')
@section('title')
<title>Admin | Target list</title>
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
				<a href="{{route('admin.target.add.view')}}" class="add-btn dropdown-toggle" style=" color: white; "><span class="plus">+</span> <div class="br-r">Add Target</div>
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
						<th scope="col">Year</th>
						<th scope="col">Month</th>
						<th scope="col">From Target</th>
						<th scope="col">To Target</th>
						<th scope="col">Salary</th>
						<th scope="col">Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach($targets as $key=> $value)
					<tr>
						<td data-label="Select"><input type="checkbox"></td>
						<td data-label="Name">{{@$value->year}}</td>
						<td data-label="Mail ID">{{@$value->month}}</td>
						<td data-label="Phone Number">{{@$value->from_target}}</td>
						<td data-label="Phone Number">{{@$value->to_target}}</td>
						<td data-label="Phone Number">{{@$value->salary}}</td>
						<td data-label="Action">
							{{-- <a href="#"><i class="fa add-round">+</i></a> --}}
							<a href="{{route('admin.edit.targets-view',['id'=>@$value->id])}}"><i class="fa fa-edit edit-round"></i></a>
							<a href="{{route('admin.del.tagets',['id'=>@$value->id])}}" onclick="return confirm('Do you want to delete this target?')"><i class="fa fa-trash-o del-round"></i></a>
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