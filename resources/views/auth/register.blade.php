@extends('layouts.master_form')

@section('form')
    <form class="login100-form validate-form" method="POST" action="{{ route('register') }}">
        @csrf
        <span class="login100-form-title p-b-49">
            {{_('Registation')}}
        </span>
        <div class="wrap-input100  m-b-23">
            <span class="label-input100">Full Name</span>
            <input class="input100" type="name" name="name" value="{{ old('name') }}" autofocus placeholder="Type your Full name">
            <span class="focus-input100" data-symbol="&#xf206;"></span>
        </div>
        <div class="wrap-input100  m-b-23">
            <span class="label-input100">E-mail</span>
            <input class="input100" type="email" name="email" value="{{ old('email') }}" autofocus placeholder="Type your E-mail">
            <span class="focus-input100" data-symbol="&#xf15a;"></span>
        </div>
        <div class="wrap-input100  m-b-23">
            <span class="label-input100">Phone</span>
            <input class="input100" type="text" name="phone" value="{{ old('phone') }}" autofocus placeholder="Type your Phone Number">
            <span class="focus-input100" data-symbol="&#xf2be;"></span>
        </div>
        <div class="wrap-input100  m-b-23">
            <span class="label-input100">Password</span>
            <input class="input100" type="password" name="password" placeholder="Type your password">
            <span class="focus-input100" data-symbol="&#xf190;"></span>
        </div>
        <div class="wrap-input100  m-b-23">
            <span class="label-input100">Confirm Password</span>
            <input class="input100" type="password" name="password_confirmation" placeholder="Type your password again">
            <span class="focus-input100" data-symbol="&#xf190;"></span>
        </div>
        <div class="container-login100-form-btn mt-5">
            <div class="wrap-login100-form-btn">
                <div class="login100-form-bgbtn"></div>
                <button class="login100-form-btn">
                    Registaion
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
                    Or Already Member
                </span>

            <a href="{{route('login')}}" class="txt2">
                Login
            </a>
        </div>
    </form>

@endsection
