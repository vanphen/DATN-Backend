@extends('layouts.app')

@section('login')
<div class="container">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-5 logo">
                <div class="logo-img">
                    <img class="img-background" src="https://pixinvent.com/demo/vuexy-vuejs-laravel-admin-template/demo-2/images/register.jpg?cfd9ef099bfc1f99c6f2970ae05a6a4a" alt="">
                </div>
            </div>
            <div class="col-md-5">
                <div class="login">
                    <div class="form-login" style=" color : #c2c6dc!important;">
                        <h4>Login Here</h4>
                        <p>Welcome back, please login to your account.</p>
                        <form method="POST" action="{{ route('login') }}">
                        @csrf
                            <p>Email</p>
                            <input id="email" type="email" class="input-login @error('email') is-invalid @enderror" name="email"  placeholder="Enter Username" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <p style="margin-top: 15px;">Password</p>
                            <input id="password" type="password"  placeholder="Enter Password" class="input-login @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            
                            @if ( Session::has('error') )
                            <label class="form-check-label" role="alert" style="color:red;margin: 5px;" for="error invalid-feedback">
                            {{ Session::get('error') }}
                            </label>
                            @endif

                            <div class="form-check">
                                    <!-- <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label> -->
                            </div>
                            <!-- @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                            @endif -->
                            <button class="button-click" type="submit" value="Register">Login</button>

                            <a class="button-click" style="float: right;" href="{{ route('register') }}" >Register</a>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-1"></div>
        </div>
    </div>
@endsection
