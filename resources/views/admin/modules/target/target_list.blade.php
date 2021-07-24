@extends('admin.layouts.app')
@section('title')
<title>Admin | Target list</title>
@endsection
@section('left_part')
@include('admin.include.left_part')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/3.5.1/select2-bootstrap.min.css" integrity="sha512-Y44HZ7AfvVnvFx9SzgZtBVT0+HlCqdyraYJOV6Q1Ft6q7af5OkwPYcpHNiJAYcQfHjlb+yH7+nD9+DnfpXpDhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/3.5.1/select2.min.css" integrity="sha512-I3Xmcu7DAdHgmDqMusus1zzJJs6fZRiiGkmbTpL77JVI2wH7/zH/FF1T2FhlNqkOW9FgixkwZft4ttRx3Rj1AA==" crossorigin="anonymous" referrerpolicy="no-referrer" />




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
				<a href="{{route('admin.target.add.view')}}" class="add-btn dropdown-toggle" style=" color: white; "><span class="plus">+</span> <div class="br-r">Add Target</div>
				</a>
					<span class="caret"></span></button>
				</div>
				{{-- @if(count(@$foo)>0)
				     @foreach(@$foo as $user)
					  {{@$user}}
					 @endforeach
					@endif --}}
				
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

							<a href="#" type="button"  data-toggle="modal" data-target="#myModal{{@$value->id}}"><i class="fa add-round" onclick="abc({{@$value->id}})">+</i></a>


							{{-- <a href="#"><i class="fa add-round">+</i></a> --}}
							<a href="{{route('admin.edit.targets-view',['id'=>@$value->id])}}"><i class="fa fa-edit edit-round"></i></a>
							<a href="{{route('admin.del.tagets',['id'=>@$value->id])}}" onclick="return confirm('Do you want to delete this target?')"><i class="fa fa-trash-o del-round"></i></a>
						</td>
				 	</tr>

				 	{{-- for assing --}}
				<div class="modal" id="myModal{{@$value->id}}">
					<div class="modal-dialog">
						<div class="modal-content">
							<!-- Modal Header -->
							<div class="modal-header">
								<h4 class="modal-title">Assing Lead no {{@$value->id}}</h4>
								
							</div>
							<!-- Modal body -->
							<div class="modal-body">

								
								<form method="post" action="{{route('target.assing')}}">
									@csrf
									<input type="hidden" name="target_id" value="{{@$value->id}}">
									<input type="hidden" name="month" value="{{@$value->month_id}}">
									<input type="hidden" name="year" value="{{@$value->year}}">
									<div class="form-group">
										<label for="search">Select to assing</label>
										<select class="form-control rm06" name="user_id[]" multiple id="slct1{{@$value->id}}" >
											
											@foreach(@$users as $key=> $user)

											<option value="{{$user->id}}" >{{$user->name}}</option>
											@endforeach
										</select>

										
									</div>
									<button type="submit" class="btn btn-primary mb-2" style="text-align:  left !important;">Submit</button>
									
								</form>
								
								
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/3.5.1/select2.min.js" integrity="sha512-cvmdmfILScvBOUbgWG7UbDsR1cw8zuaVlafXQ3Xu6LbgE0Ru6n57nWbKSJbQcRmkQodGdDoAaZOzgP4CK6d4yA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
	
oTable = $('#example').DataTable({
"bSort": false
});  
$('#myInputTextField').keyup(function(){
      oTable.search($(this).val()).draw() ;
})
</script>
<script>
	function abc($id){
		//alert($id);
		$('#slct1'+$id).select2({
		placeholder: 'Select an user'/*+$id*/,
	}); 
	}
</script>
@endsection