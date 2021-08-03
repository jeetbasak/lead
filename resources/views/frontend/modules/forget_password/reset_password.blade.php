@extends('layouts.app')
@section('title')
<title>User | Reset Password</title>
@endsection
@section('head')
@include('frontend.include.head')
@endsection
@section('content')

<div class="container-fluid p-0">
    <div class="d-flex signup-bg">
        <div class="left-panel">
            <div class="logo-col text-center"><h2>TaskAffix</h2></div>
            
            <div class="log-text">
                <h2>Welcome Back!</h2>
                <p>Enter your personal details and start journey with us</p>
                <a href="{{ route('register') }}">Sign Up</a>
            </div>
            
        </div>
        <div class="right-panel">
            <div class="login-info">
                <ul>
                    <li>Doesn't have an account yet?</li>
                    <li><a class="share-btn" href="{{ route('register') }}">Sign Up</a></li>
                </ul>
            </div>
            
            <div class="welcome-col">
                <h2>Reset Password</h2>
                <p>Please enter your new password </p>
                @include('admin.include.errors')
                <form method="POST" action="{{ route('user.new.password') }}" id="frm">
                    @csrf
                    {{-- email --}}
                    <input type="hidden" name="id" value="{{@$data->id}}">
                    <div class="e-col">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Enter your new password" value="{{ old('password') }}" required autocomplete="email" autofocus>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    
                    
                    
                        <div class="e-col">
                            <button type="submit" class="next-btn next-button">
                             Post
                            </button>
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        
    </div>
    @endsection
    @section('script')
    @include('frontend.include.script')
              <script type="text/javascript">
              $(function(){
                $('#frm').validate({
                    rules:{
                        password:{
                            required:true,
                            minlength : 4
                        },
                        repassword : {
                          required:true,
                          minlength : 4,
                          equalTo : '[name="password"]'
                     },
                    },
                    messages:{
                      password:{
                        required:'Please enter your new password',
                    },
                    repassword:{
                       required:'Please enter your confirm password',
                    },
                    }
                    
                })
              })
          </script>
    @endsection