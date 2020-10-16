@extends('layouts/master_form')
@section('form')
    <form class="login100-form validate-form" action="{{route('login')}}" method="post">
        @csrf
        <span class="login100-form-title p-b-49">
                {{_('Login')}}
            </span>

        <div class="wrap-input100 validate-input m-b-23" data-validate = "E-mail is reauired">
            <span class="label-input100">E-mail</span>
            <input class="input100" type="email" name="email" value="{{ old('email') }}" autofocus placeholder="Type your E-mail">
            <span class="focus-input100" data-symbol="&#xf206;"></span>
        </div>

        <div class="wrap-input100 validate-input" data-validate="Password is required">
            <span class="label-input100">Password</span>
            <input class="input100" type="password" name="password" placeholder="Type your password">
            <span class="focus-input100" data-symbol="&#xf190;"></span>
        </div>
        <div class="text-left pt-4 pb-1">
            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
            <span class="checkmark"></span>
            <label class="chech_container">Remember me</label>
        </div>
        <div class="text-left pt-1 p-b-31 ">
            <a href="{{ route('password.request') }}">
                Forgot password?
            </a>
        </div>

        <div class="container-login100-form-btn">
            <div class="wrap-login100-form-btn">
                <div class="login100-form-bgbtn"></div>
                <button class="login100-form-btn">
                    Login
                </button>
            </div>
        </div>

        <div class="txt1 text-center p-t-54 p-b-20">
                <span>
                    Or Sign Up Using
                </span>
        </div>

        <div class="flex-c-m">
            <a href="{{ url('/auth/redirect/facebook') }}" class="login100-social-item bg1">
                <i class="fa fa-facebook"></i>
            </a>

            <a href="#" class="login100-social-item bg2">
                <i class="fa fa-twitter"></i>
            </a>

            <a href="{{ url('/auth/redirect/google') }}" class="login100-social-item bg3">
                <i class="fa fa-google"></i>
            </a>
        </div>

        <div class="flex-col-c pt-5">
                <span class="txt1 p-b-17">
                    Or Sign Up Using
                </span>

            <a href="{{route('register')}}" class="txt2">
                Sign Up
            </a>
        </div>
    </form>
@endsection
