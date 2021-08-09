@extends('admin.layouts.app')
@section('title')
<title>Admin | User Offer Latter</title>
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
					<th scope="col">Offer Latter</th>
					<th scope="col">Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach($users as $key=> $value)
				<tr>
					<td data-label="Select"><input type="checkbox"></td>
					<td data-label="Name">{{@$value->name}}</td>
					<td data-label="Name">{{@$value->email}}</td>
					<td data-label="Name">@if(@$value->offer_latter) Added  @else Not added @endif</td>
					
					<td data-label="Action">
						
						@if(@$value->offer_latter)
						<a href="#" type="button"  data-toggle="modal" data-target="#myModalview{{@$value->id}}" style="margin-left: 5px;"><i class="fa fa-eye edit-round" style="background-color: blue"></i></a>
						@else
						<a href="#" type="button"  data-toggle="modal" data-target="#myModal{{@$value->id}}" style="margin-left: 5px;"><i class="fa add-round" style="background-color: orange">+</i></a>
						@endif
						
						
						@if(@$value->offer_latter)
						<a onclick="return confirm('Are you sure want to delete this user offer latter?');" href="{{route('offer.del',$value->id)}}"><i class="fa fa-trash-o del-round"></i></a>
						@endif
						
						
					</td>
				</tr>
				
				
				{{-- for view --}}
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
								<br>
								<p>Offer latter</p>
								<img src="{{ URL::to('public/storage/offerlatter/')}}/{{@$value->offer_latter}}" alt="" style="height: 150px;width: 200px">
							</div>
							<!-- Modal footer -->
							<div class="modal-footer">
								<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
							</div>
						</div>
					</div>
				</div>

				{{-- add --}}
				<div class="modal" id="myModal{{@$value->id}}">
					<div class="modal-dialog">
						<div class="modal-content">
							<!-- Modal Header -->
							<div class="modal-header">
								<h4 class="modal-title">Add Offer Latter </h4>
								
							</div>
							<!-- Modal body -->
							<div class="modal-body">
								
								<form method="post" action="{{route('offer.add')}}" enctype="multipart/form-data">
									@csrf
									<input type="hidden" name="user_id" value="{{@$value->id}}">
									<div class="flx-col" style="width: 100%">
										<label>Upload Offer Latter For {{@$value->name}}</label>
										<div class="form-group">
											<input type="file" name="offer" id="file-2{{@$value->id}}" onChange="fun2({{$value->id}});" accept="image/*" class="file">
											<div class="input-group mb-3">
												
												<input type="text"  class="form-control" disabled placeholder="Upload File" aria-label="Upload File" aria-describedby="basic-addon1">
												<div class="input-group-append">
													<a class="browse input-group-text btn btn-primary" id="basic-addon2">  Browse</a>
												</div>
											</div>
										</div>
									</div>
									<div class="flx-col text-center">
										<div class="uplodimgfilimg">
											<img src="{{url('/')}}/public/admin/assets/images/noimg.jpg" alt=""  style="height: 150px;width: 150px" id="noimg{{@$value->id}}" >
											<div class="profile_img{{@$value->id}} ad_rbn_001" style="display: none;width: 100%;height: 100px;" >
												<img src="" alt=""id="img3{{@$value->id}}"  style="height: 150px;width: 150px" >
											</div>
										</div>
										
									</div>
									
									<button type="submit" class="btn btn-primary mb-2" style="text-align:  left !important; margin-top: 5px">Submit</button>
									
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
<script>
oTable = $('#example').DataTable({
"bSort": false
});
$('#myInputTextField').keyup(function(){
oTable.search($(this).val()).draw() ;
})
</script>
<script>
function fun2(id){
var i=document.getElementById('file-2'+id).files[0];
//console.log(i);
var b=URL.createObjectURL(i);
$(".profile_img"+id).show();
$("#noimg"+id).hide();
$("#img3"+id).attr("src",b);
}
</script>
@endsection