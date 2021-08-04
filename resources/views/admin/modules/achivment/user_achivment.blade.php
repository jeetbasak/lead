@extends('admin.layouts.app')
@section('title')
<title>Admin | User achivment</title>
@endsection
@section('left_part')
@include('admin.include.left_part')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
@endsection
@section('content')
<!-- Start right Content here -->
<!-- ============================================================== -->
@include('admin.include.errors')
<div class="container-fluid">
	<div class="body-main">
		<div class="top-row">
			
			
			{{-- <a href="{{route('admin.target.add.view')}}" class="add-btn dropdown-toggle" style=" color: white; "><span class="plus">+</span> <div class="br-r">Add Target</div>
		</a>
		<span class="caret"></span> --}}
		<form method="post" action="{{route('achivment.search')}}" id="frm">
			@csrf
			<div class="row">
				<div class="col-md-4">
					<label class="form-label">Year</label>
					<select class="form-control custom_select" id="year" name="year">
						<option selected value="">Select year</option>
						@for($i=(date('Y')-10);$i<=date('Y')+10;$i++)
						<option value="{{$i}}" @if(request('year')==$i) selected @endif>{{$i}}</option>
						@endfor
					</select>
				</div>
				<div class="col-md-4">
					<label class="form-label">Month</label>
					@php
					$month=array('January','February','March','April','May','June','July','August','September','October','November','December');
					@endphp
					<select class="form-control custom_select" id="month" name="month">
						<option selected value="">Select month</option>
						@for($i=0;$i<=count($month)-1;$i++)
						<option value="{{$i+1}}" @if(request('month')==$i+1) selected @endif>{{@$month[$i]}}</option>
						@endfor
					</select>
					
				</div>
				<div class="col-md-4">
					<input type="submit" value="search">
					
				</div>
			</div>
		</form>
		
		
	</div>
</div>
<div class="top-row">
	<table id="example" class="cell-border">
		<thead>
			<tr>
				<th scope="col"><input type="checkbox"></th>
				<th scope="col">id</th>
				<th scope="col">User name</th>
				<th scope="col">Year</th>
				<th scope="col">Month</th>
				<th scope="col">Achivement</th>
				<th scope="col">Action</th>
			</tr>
		</thead>
		<tbody>
			
			@foreach($salary as $key=> $value)
			<tr>
				<td data-label="Select"><input type="checkbox"></td>
				<td data-label="Name">{{@$value->id}}</td>
				<td data-label="Mail ID">{{@$value->userr->name}}</td>
				<td data-label="Phone Number">{{@$value->year}}</td>
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
				
				<td data-label="Phone Number">{{@$value->target_achive}}</td>
				<td data-label="Action">
					<a href="#" type="button"  data-toggle="modal" data-target="#myModal{{@$value->id}}"><i class="fa add-round" >V</i></a>
					{{-- <a href="#"><i class="fa add-round">+</i></a> --}}
					{{-- <a href="{{route('admin.edit.targets-view',['id'=>@$value->id])}}"><i class="fa fa-edit edit-round"></i></a>
					<a href="{{route('admin.del.tagets',['id'=>@$value->id])}}" onclick="return confirm('Do you want to delete this target?')"><i class="fa fa-trash-o del-round"></i></a> --}}
				</td>
			</tr>
			{{-- for view --}}
			<div class="modal" id="myModal{{@$value->id}}">
				<div class="modal-dialog">
					<div class="modal-content">
						<!-- Modal Header -->
						<div class="modal-header">
							<h4 class="modal-title">View Details</h4>
							
						</div>
						<!-- Modal body -->
						<div class="modal-body">
							<h5> Id </h5>
							<p>{{@$value->id}}</p>
							<h5> User name </h5>
							<p>{{@$value->userr->name}}</p>
							<h5> Year </h5>
							<p>{{@$value->year}}</p>
							<h5> Month </h5>
							@if(@$value->month_id==1)
							January
							@elseif(@$value->month_id==2)
							February
							@elseif(@$value->month_id==3)
							March
							@elseif(@$value->month_id==4)
							April
							@elseif(@$value->month_id==5)
							May
							@elseif(@$value->month_id==6)
							June
							@elseif(@$value->month_id==7)
							July
							@elseif(@$value->month_id==8)
							August
							@elseif(@$value->month_id==9)
							September
							@elseif(@$value->month_id==10)
							October
							@elseif(@$value->month_id==11)
							November
							@else
							December
							@endif
							<h5> Achivement </h5>
							<p>{{@$value->target_achive}}</p>
							
							<h5> Salary </h5>
							<p>{{@$value->salary}}</p>
							
							
						</div>
						
						
						
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
{{-- for datatable --}}
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
{{-- for modal --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
	
oTable = $('#example').DataTable({
"bSort": false
});
$('#myInputTextField').keyup(function(){
oTable.search($(this).val()).draw() ;
})
</script>
@endsection