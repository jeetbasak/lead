@extends('admin.layouts.app')
@section('title')
<title>Admin | Login</title>
@endsection
@section('head')
@include('admin.include.head')
@endsection
@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.login') }}" aria-label="{{ __('Login') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                                @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                                @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                {{ __('Login') }}
                                </button>
                                @if (Route::has('admin.password.request'))
                                <a class="btn btn-link" href="{{ route('admin.password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<div class="container-fluid p-0">
    <div class="d-flex signup-bg">
        <div class="left-panel">
            <div class="logo-col text-center"><h2>TaskAffix</h2></div>
            
            <div class="log-text">
                <h2>ADMIN</h2>
                <p>Welcome Back!</p>
                {{--  <a href="{{ route('register') }}">Sign Up</a> --}}
            </div>
            
        </div>
        <div class="right-panel">
            <div class="login-info">
                <ul>
                    {{--  <li>Doesn't have an account yet?</li> --}}
                    {{-- <li><a class="share-btn" href="{{ route('register') }}">Sign Up</a></li> --}}
                </ul>
            </div>
            
            <div class="welcome-col">
                <h2>Sign In to TaskAffix</h2>
                <p>Please login in to your account</p>
                <form method="POST" action="{{ route('admin.login') }}" aria-label="{{ __('Login') }}">
                    @csrf
                    {{-- email --}}
                    <div class="e-col">
                        <input id="email" placeholder="Enter your email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                        @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </div>
                    {{-- password --}}
                    <div class="e-col">
                        <div class="input-group"  id="show_hide_password">
                            <input id="password" placeholder="Enter your password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                            @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                            <div class="input-group-addon">
                                <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                    {{-- remember me --}}
                    <div class="e-col">
                        <div class="flx-row">
                            <div class="custom-checkbox">
                                <input class="custom-control-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="custom-control-label">Remember me</label> </div>
                                
                                {{-- fp --}}
                                @if (Route::has('admin.password.request'))
                                <a class="btn btn-link" href="{{ route('admin.password.request') }}">
                                    Forgot Your Password?
                                </a>
                                @endif
                            </div>
                        </div>
                        <div class="e-col">
                            <button type="submit" class="next-btn next-button">
                            Login
                            </button>
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        
    </div>
    @endsection
    @section('script')
    @include('admin.include.script')
    @endsection