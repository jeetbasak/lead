@extends('layouts.app')
@section('title')
<title>User | Registration</title>
@endsection
@section('head')
@include('frontend.include.head')
@endsection
@section('content')
@php
$user=DB::table('users')->where('id',$id)->first();
$otp_status=$user->otp_status;
@endphp
<div class="container-fluid p-0">
    <div class="d-flex signup-bg">
        <div class="left-panel">
            <div class="logo-col"><h2>TaskAffix</h2></div>
            @if(@$otp_status!='N')
            <p> <a href="{{route('go.back',$id)}}" ><span class="fa fa-long-arrow-left"> Go Back</span></a></p>
            @endif
            <div class="card1">
                <p class="up-title">Set up your TaskAffix account</p>
                <ul id="progressbar" class="text-center">
                    <li class="step0 active"><h2>Create your Profile <span>Fill out some quick details</span></h2></li>
                    <li class="step0 active"><h2>Tell us about Yourself <span>You have a new workplace</span></h2></li>
                    <li class="step0 active"><h2>Account Verification <span>Collaborate with your team</h2></span></li>
                </ul>
            </div>
            {{-- <p class="prev"><span class="fa fa-long-arrow-left"> Go Back</span>
        </p id="back"> --}}
        {{-- <p> <a href="" ><span class="fa fa-long-arrow-left"> Go Back</span></a></p> --}}
    </div>
    <div class="right-panel">
        <div class="login-info">
            <ul>
                <li>Already have an account?</li>
                <li><a class="share-btn" href="#">Sign In</a></li>
            </ul>
        </div>
        @include('admin.include.errors')
        {{-- 1-////////////////////////////////////////////// --}}
        <form method="POST" action="{{route('verification.reg')}}" style="margin-left: 120px" id="frm">
            @csrf
            <div class="welcome-col card2 first-screen show">
                <h2>Welcome to TaskAffix</h2>
                <p>Let's get started by creating your TaskAffix account</p>
                
                
                {{-- {{@$otp_status}} --}}
                @if(@$msg)
                <div class="alert alert-danger rm" >
                    
                    <strong>
                    Previously entered OTP was wrong
                    </strong>
                    <a href="#" class="close" data-dismiss="alert" style="float: right !important ;" onclick="rmv()">&times;</a>
                </div>
                @endif
                <input type="hidden" name="id" value="{{@$id}}">
                <div class="e-col">
                    <input class="form-control" placeholder="Enter your city pin" type="number" name="pin" >
                    <small>(ex: 700098)</small>
                </div>
                <div class="e-col">
                    <input class="form-control" placeholder="Get an email code from company" type="number" name="code">
                    <small>(ex: 568596) for account verification</small>
                </div>
                
                
                <div class="e-col">
                    {{--   <a  class="next-btn next-button" href="#">Next Step</a> --}}
                    <input type="submit" value="Next Step" class="next-btn"{{--  @if(@$otp_status!='N')  onclick="return confirm('Are you sure want to go ahead?');" @endif  --}}>
                </div>
            </div>
        </form>
    </div>
</div>


</div>
@endsection
@section('script')
@include('frontend.include.script')
<script>
$( document ).ready(function() {
setTimeout(function(){
$(".rm").hide();;
}, 3000);
});



</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js" integrity="sha512-UdIMMlVx0HEynClOIFSyOrPggomfhBKJE28LKl8yR3ghkgugPnG6iLfRfHwushZl1MOPSY6TsuBDGPK2X4zYKg==" crossorigin="anonymous"></script>
<script>
$(document).ready(function(){
     jQuery.validator.addMethod("emailonly", function(value, element) {
    return this.optional(element) || /^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/.test(value.toLowerCase());
    }, "Enter valid email");
     
$('#frm').validate({
rules:{
pin:{
required:true,
minlength:6,
},
code:{
required:true,
minlength:6,
},

},
messages:{
   /*chk:{
required:" Please accept terms and conditions",

},*/
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