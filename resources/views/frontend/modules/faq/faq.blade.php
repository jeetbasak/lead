@extends('layouts.app')
@section('title')
<title>User | Faq list</title>
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
		
	</div>
	<div class="top-row">
		<table id="example">
			<thead>
				<tr>
					<th scope="col"><input type="checkbox"></th>
					<th scope="col">id</th>
					<th scope="col">question</th>
					<th scope="col">status</th>
					<th scope="col">Action</th>
					
				</tr>
			</thead>
			<tbody>
				@foreach($faq as $key=> $value)
				<tr>
					<td data-label="Select"><input type="checkbox"></td>
					<td data-label="Name">{{@$value->id}}</td>
					<td data-label="Name">{{@$value->question}}</td>
					<td data-label="Mail ID">@if(@$value->status=="A")
						<p>Active</p>
						@else
						<p>Inactive</p>
						
					@endif</td>
					
					<td data-label="Action">
					
						<a href="#" type="button"  data-toggle="modal" data-target="#myModalview{{@$value->id}}" style="margin-left: 5px; font-size:25px"><i class="fa fa-eye" aria-hidden="true"></i></a>
						
					</td>
				</tr>
			
				{{-- for view --}}
				<div class="modal" id="myModalview{{@$value->id}}">
					<div class="modal-dialog">
						<div class="modal-content">
							<!-- Modal Header -->
							<div class="modal-header">
								<h4 class="modal-title">Faq details</h4>
								
							</div>
							<!-- Modal body -->
							<div class="modal-body">
								
								<h5> id </h5>
								<p>{{@$value->id}}</p>
								<h5> Question </h5>
								<p>{{@$value->question}}</p>
								<h5> Answer </h5>
								<p>{{@$value->answer}}</p>
								
								<h5> Status </h5>
								@if(@$value->status=="A")
								<p>Active</p>
								@else
								<p>inactive</p>
															
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