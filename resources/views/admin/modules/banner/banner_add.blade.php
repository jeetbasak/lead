@extends('admin.layouts.app')
@section('title')
<title>Admin | Add Banner</title>
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
				<h2 class="my-1">Add Banner</h2>
				
				<div class="right-sec">
					<ul>
						
						<li>
							<a href="{{route('banner.list')}}" class="link">Back</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		
		<form action="{{route('insert.banner')}}" method="post" id="frm" enctype="multipart/form-data">
			@csrf
			<div class="top-row">
				<div class="flx-row my-3">
					<div class="flx-col">
						<label class="form-label">Title</label>
						<input class="form-control" placeholder="Enter question" type="text" name="title">
						
					</div>
					
					
				</div>
				<div class="flx-row my-3">
					<div class="flx-col">
						<label class="form-label">Image</label>
						<input type="file" class="upload"  name="pic" id="file-2" onChange="fun2();" accept="image/*">
						
					</div>
					<div class="uplodimgfilimg profile_img ad_rbn_001" style="display: none;width: 100%;height: 100px;" >
						<img src="" alt=""id="img3"  style="height: 150px;width: 250px" >
					</div>
				</div>
				
				
				
				
				<div class="flx-row my-3">
					<div class="flx-col">
						<button type="submit" class="btn btn-primary mb-2">Submit</button>
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
title:{
required:true,
},
pic:{
required:true,
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