@extends('admin.layouts.app')
@section('title')
<title>Admin | Add Service</title>
@endsection
@section('left_part')
@include('admin.include.left_part')
@endsection
@section('content')
<!-- Start right Content here -->
<!-- ============================================================== -->
@include('admin.include.errors')
<div class="container-fluid">
	<div class="body-main">
		<div class="top-row">
			<div class="task-mg-row">
				<h2 class="my-1">Add Service</h2>
				
				<div class="right-sec">
					<ul>
						
						<li>
							<a href="{{route('service.list')}}" class="link">Back</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		
		<form action="{{route('insert.service')}}" method="post" id="frm" enctype="multipart/form-data">
			@csrf
			<div class="top-row">
				<div class="flx-row my-3">
					<div class="flx-col">
						<label class="form-label">Service name</label>
						<input class="form-control" placeholder="Enter question" type="text" name="name">
						
					</div>
					
					
				</div>
			
				
				
				
				<div class="flx-row my-3">
					<div class="flx-col">
						<button type="submit" class="btn btn-primary mb-2">Add</button>
					</div>
				</div>
			</div>
		</form>
		
		
		
		
		
	</div>
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
<script type="text/javascript">

</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js" integrity="sha512-UdIMMlVx0HEynClOIFSyOrPggomfhBKJE28LKl8yR3ghkgugPnG6iLfRfHwushZl1MOPSY6TsuBDGPK2X4zYKg==" crossorigin="anonymous"></script>
<script>
$(document).ready(function(){

$('#frm').validate({
rules:{
name:{
required:true,
minlength:3,
},

},
messages:{
/*   old_password:{
required:" Old password is mandatory",
min:"Enter minimum 6 characters"
},
newPassword:{
required:" New password is mandatory",
min:"Enter minimum 6 characters"
},
confirm:{
required:" Confirm password is mandatory",
min:"Enter minimum 6 characters",
equalTo :"New password and confirm password are not matching"
},*/
}
});
});
</script>
<script>
	function fun2(){
var i=document.getElementById('file-2').files[0];
//console.log(i);
var b=URL.createObjectURL(i);
$(".profile_img").show();
$("#img3").attr("src",b);
}
</script>
@endsection