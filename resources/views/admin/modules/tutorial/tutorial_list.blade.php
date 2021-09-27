@extends('admin.layouts.app')
@section('title')
<title>Admin | Target list</title>
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
			<div class="task-mg-row b-b-n">
				<div class="dropdown">
				<a href="{{route('tutorial.add.form')}}" class="add-btn dropdown-toggle" style=" color: white; "><span class="plus">+</span> <div class="br-r">Add Tutorial</div>
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
						<th scope="col">ID</th>
						<th scope="col">Tutorial title</th>
						
						<th scope="col">Date of publish</th>
						<th scope="col">Action</th>
					</tr>
				</thead>
				<tbody>
					
					@foreach($tutorials as $key=> $value)
					<tr>
						<td data-label="Select"><input type="checkbox"></td>
						<td data-label="Name">{{@$value->id}}</td>
						<td data-label="Mail ID">{{@$value->title}}</td>
						<td data-label="Phone Number">{{@$value->created_at}}</td>
						
						<td data-label="Action">

							<a href="#" type="button"  data-toggle="modal" data-target="#myModalview{{@$value->id}}"><i class="fa fa-eye edit-round" onclick="abc({{@$value->id}})"></i></a>


							{{-- <a href="#"><i class="fa add-round">+</i></a> --}}
							<a href="{{route('tutorial.edit',$value->id)}}"><i class="fa fa-edit edit-round"></i></a>
							<a href="{{route('tutorial.del',$value->id)}}" onclick="return confirm('Do you want to delete this tutorial?')"><i class="fa fa-trash-o del-round"></i></a>

							{{-- <a href="{{route('tutorial.view',$value->id)}}" onclick="return confirm('Do you want to delete this tutorial?')">View</a> --}}
						</td>
				 	</tr>

				 	{{-- for view --}}
				<div class="modal" id="myModalview{{@$value->id}}" >
					<div class="modal-dialog">
						<div class="modal-content" style="width:600px">
							<!-- Modal Header -->
							<div class="modal-header">
								<h4 class="modal-title">Tutorial : {{@$value->title}}</h4>
								
							</div>
							<!-- Modal body -->
							<div class="modal-body">

								
								<h5>{{@$value->title}}</h5>
								<br>
								{!!@$value->video!!}
								
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