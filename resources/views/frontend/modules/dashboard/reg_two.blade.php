@extends('layouts.app')

@section('title')
<title>User | Registration</title>
@endsection

@section('head')
@include('frontend.include.head')
@endsection

@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
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
                    <form method="POST" action="{{ route('register.two') }}" style="margin-left: 120px" id="frm">
                        @csrf
                    <div class="welcome-col card2 first-screen show">
                        <h2>Welcome to TaskAffix</h2>
                        <p>Let's get started by creating your TaskAffix account</p>

                        <input type="text" name="id" value="{{$id}}">



                         <div class="e-col">                            
                            <input class="form-control" placeholder="Your Full phone number" type="tel" name="ph" id="ph">                           
                        </div> 
                        

                            <div class="e-col"> 
                            <label>Any work experience?</label>
                            <div class="d-flex">
                                <div class="custom-redio">
                                    <input class="custom-control-input" checked type="radio" name="work_exp" value="Y"> <label>Yes</label>
                                </div> 
                                <div class="custom-redio">
                                    <input class="custom-control-input" type="radio" name="work_exp" value="N"> <label>No</label>
                                </div>
                            </div>                                                     
                        </div>
                        <label id="work_exp-error" class="error" for="work_exp"></label>

                    
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
