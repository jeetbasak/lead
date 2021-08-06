@extends('admin.layouts.app')
@section('title')
<title>Admin | Target list</title>
@endsection
@section('left_part')
@include('admin.include.left_part')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">

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
			<table id="example" class="cell-border">
				<thead>
					<tr>
						<th scope="col"><input type="checkbox"></th>
						<th scope="col">Year</th>
						<th scope="col">Month</th>
						<th scope="col">From Target</th>
						<th scope="col">To Target</th>
						<th scope="col">Salary</th>
						
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
{{-- for datatable --}}
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
{{-- for modal --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
{{-- for select2 --}}
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