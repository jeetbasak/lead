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
                    <li class="step0 active"><h2>Tell us about Yourself <span>You have a new workplace</span></h2></li>
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
        <form method="POST" action="{{ route('go.back.upd') }}" style="margin-left: 120px">
            @csrf
            <div class="welcome-col card2 first-screen show">
                <h2>Welcome to TaskAffix</h2>
                <p>Let's get started by creating your TaskAffix account</p>
                <input type="text" name="id" value="{{$user->id}}">
                <div class="e-col">
                    <input class="form-control" placeholder="Your Full phone number" type="tel" name="ph" id="ph" value="{{$user->ph}}">
                </div>
                
                <div class="e-col">
                    <label>Any work experience?</label>
                    <div class="d-flex">
                        <div class="custom-redio">
                            <input class="custom-control-input" type="radio" name="work_exp" value="Y" @if($user->work_exp=='Y') checked @endif> <label>Yes</label>
                        </div>
                        <div class="custom-redio">
                            <input class="custom-control-input" type="radio" name="work_exp" value="N"  @if($user->work_exp=='N') checked @endif> <label>No</label>
                        </div>
                    </div>
                </div>
                
                <div class="e-col">
                    {{--   <a  class="next-btn next-button" href="#">Next Step</a> --}}
                    <input type="submit" value="Next Step" class="next-btn" onclick="return confirm('Are you sure want to go ahead?');">
                </div>
            </div>
        </form>
    </div>
</div>


</div>
@endsection
@section('script')
@include('frontend.include.script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js" integrity="sha512-UdIMMlVx0HEynClOIFSyOrPggomfhBKJE28LKl8yR3ghkgugPnG6iLfRfHwushZl1MOPSY6TsuBDGPK2X4zYKg==" crossorigin="anonymous"></script>
<script>
$(document).ready(function(){
     jQuery.validator.addMethod("emailonly", function(value, element) {
    return this.optional(element) || /^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/.test(value.toLowerCase());
    }, "Enter valid email");
     
$('#frm').validate({
rules:{
ph:{
required:true,
minlength:10,
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