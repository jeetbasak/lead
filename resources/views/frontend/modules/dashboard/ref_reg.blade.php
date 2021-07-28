@extends('layouts.app')
@section('title')
<title>User | Registration</title>
@endsection
@section('head')
@include('frontend.include.head')
@endsection
@section('content')
@php
$country=DB::table('countries')->get();
@endphp
<div class="container-fluid p-0">
	<div class="d-flex signup-bg">
		<div class="left-panel">
			<div class="logo-col"><h2>TaskAffix</h2></div>
			
			<div class="card1">
				<p class="up-title">Set up your TaskAffix account</p>
				<ul id="progressbar" class="text-center">
					<li class="step0 active"><h2>Create your Profile <span>Fill out some quick details</span></h2></li>
					<li class="step0"><h2>Tell us about Yourself <span>You have a new workplace</span></h2></li>
					<li class="step0"><h2>Account Verification <span>Collaborate with your team</h2></span></li>
				</ul>
			</div>
			<p class="prev"><span class="fa fa-long-arrow-left"> Go Back</span>
		</p id="back">
	</div>
	<div class="right-panel">
		<div class="login-info">
			<ul>
				<li>Already have an account?</li>
				<li><a class="share-btn" href="#">Sign In</a></li>
			</ul>
		</div>
		
		{{-- 1-////////////////////////////////////////////// --}}
		<form method="POST" action="{{ route('register.one') }}" style="margin-left: 120px" id="frm2">
			@csrf
			<div class="welcome-col card2 first-screen show">
				<h2>Welcome to TaskAffix</h2>
				<p>Let's get started by creating your TaskAffix account</p>
				@include('admin.include.errors')
				<div class="e-col">
					<input type="hidden" name="reffer_by_email" value="{{@$email}}" >
					<input type="hidden" name="reffer_by_id" value="{{@$reffer_id}}">
					<input class="form-control" placeholder="Your Full Name" type="text" name="name" id="name">
				</div>
				<div class="e-col">
					<input class="form-control" placeholder="Your Full Email" type="text" name="email" id="email">
				</div>
				
				<div class="e-col">
					<select class="form-control form-select" name="qualification" >
						<option selected value="">Your Last Qualification?</option>
						<option value="Class 10">Class 10?</option>
						<option value="Class 12">Class 12?</option>
						<option value="Graduated?">Graduated?</option>
					</select>
				</div>
				<div class="e-col">
					<select class="form-control form-select" name="country" id="country">
						<option selected>Select Country</option>
						@foreach(@$country as $value)
						<option value="{{@$value->id}}">{{@$value->name}}</option>
						@endforeach
					</select>
				</div>
				<div class="e-col">
					<select class="form-control form-select" id="states" name="state">
						<option selected>Select State</option>
						{{-- @foreach(@$country as $value)
						<option value="{{@$value->id}}">{{@$value->name}}</option>
						@endforeach --}}
					</select>
				</div>
				
				
				<div class="e-col">
					<div class="custom-checkbox"> <input class="custom-control-input" type="checkbox" name="chk"> <label class="custom-control-label" >I agree with Terms & Condiotion</label> </div>
				</div>
				<label id="chk-error" class="error" for="chk"></label>
				<div class="e-col">
					
					<input type="submit" value="Next Step" class="next-btn" onclick="return confirm('Are you sure want to register with this email id?');">
				</div>
			</div>
		</form>
	</div>
</div>


</div>
@endsection
@section('script')
@include('frontend.include.script')
<script type="text/javascript">
$(document).ready(function(){
$('#country').on('change',function(e){
e.preventDefault();
var id = $(this).val();
// alert(id);
$.ajax({
url:'{{route('dashboard.get.state')}}',
type:'GET',
data:{country:id},
success:function(data){
console.log(data);
$('#states').html(data.state);
}
})
})
})
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js" integrity="sha512-UdIMMlVx0HEynClOIFSyOrPggomfhBKJE28LKl8yR3ghkgugPnG6iLfRfHwushZl1MOPSY6TsuBDGPK2X4zYKg==" crossorigin="anonymous"></script>
<script>
$(document).ready(function(){
     jQuery.validator.addMethod("emailonly", function(value, element) {
    return this.optional(element) || /^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/.test(value.toLowerCase());
    }, "Enter valid email");
     
$('#frm2').validate({
rules:{
name:{
required:true,
minlength:3,
},
email:{
required:true,
emailonly: true,
},
qualification:{
required:true,


},
country:{
required:true,
},
state:{
required:true,
},

chk:{
required:true,
},

},
messages:{
   chk:{
required:" Please accept terms and conditions",

},
/*
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

@endsection