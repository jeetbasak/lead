@extends('layouts.app')
@section('title')
<title>User | My target</title>
@endsection
@section('left_part')
@include('frontend.include.left_part')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
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

				<div class="col-xs-4">
					<div class="dropdown">
						<a href="{{route('my.target')}}" class="btn btn-success" style=" color: white; "><div class="br-r">Recent targets</div>
					</a>
					<span class="caret"></span>
				</div>
				
			</div>
				<div class="col-xs-4">
					<div class="dropdown">
						<a href="{{route('my.target.future')}}" class="btn btn-primary" style=" color: white; "><div class="br-r">Future targets</div>
					</a>
					<span class="caret"></span>
				</div>
				
			</div>
			<div class="col-xs-4">
				<div class="dropdown">
					<a href="{{route('my.target.past')}}" class="btn btn-primary" style=" color: white; float: right;"><div class="br-r">Past targets</div>
				</a>
				<span class="caret"></span>
			</div>
			
		</div>
	</div>
</div>
<div class="top-row">
	<table id="example">
		<thead>
			<tr>
				<th scope="col"><input type="checkbox"></th>
				<th scope="col">id</th>
				<th scope="col">Year</th>
				<th scope="col">Month</th>
				<th scope="col">Target range</th>
				<th scope="col">Target salary(Rs/-)</th>
				<th scope="col">My achive</th>
				{{-- <th scope="col">Action</th> --}}
			</tr>
		</thead>
		<tbody>
			@foreach($targets as $key=> $value)
			<tr>
				<td data-label="Select"><input type="checkbox"></td>
				<td data-label="Name">{{@$value->id}}</td>
				<td data-label="Name">{{@$value->target_year}}</td>
				<td data-label="Name">{{@$value->targett->month}}</td>
				
				<td data-label="Phone Number">( {{@$value->targett->from_target}} - {{@$value->targett->to_target}} )</td>
				<td data-label="Name">{{@$value->targett->salary}} rs.</td>
				<td data-label="Name">{{@$value->user_target_achived}}</td>
				
				
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