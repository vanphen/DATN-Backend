@extends('layouts.app')

@section('login')
<div class="container">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-5 logo">
                <div class="logo-img">
                    <img class="img-background" src="https://pixinvent.com/demo/vuexy-vuejs-laravel-admin-template/demo-2/images/login.png?d814adb752d2d047b8292d6de603025f" alt="">
                </div>
            </div>
            <div class="col-md-5">
                <div class="login">
                    <div class="form-login" style=" color : #C2C6DC!important;">
                        <h4>Create Account</h4>
                        <form method="POST" action="{{ route('register') }}">
                        @csrf
                            <p>Email</p>
                            <input id="email" type="email" class="input-login @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Enter Email" required autocomplete="email">
                            @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                            <p style="margin-top: 5px;">Name</p>
                            <input id="name" type="text" class="input-login @error('name') is-invalid @enderror" placeholder="Enter Name" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                            <p style="margin-top: 5px;">Password</p>
                            <input id="password" type="password" placeholder="Enter Password" class="input-login @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            <p style="margin-top: 5px;">Confirm Password</p>
                            <input  id="password-confirm" class="input-login" type="password"  name="password_confirmation"  required autocomplete="new-password" placeholder="Enter Confirm Password">
                            <p style="margin-top: 5px;">Name Company</p>
                            <input id="nameCompany" type="text" class="input-login" placeholder="Enter Name Company" name="nameCompany" required autocomplete="name-company" autofocus>
                            <button class="button-click" type="submit" value="Register">Register</button>
                            <a class="button-click" style="float: right;" href="{{ route('login') }}" >Login</a>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-1"></div>
        </div>
    </div>
@endsection
