@extends('layouts.master_form')

@section('form')
    <form class="login100-form validate-form" action="{{ route('password.update') }}" method="post">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        <span class="login100-form-title p-b-49">
                {{ __('Reset Password') }}
            </span>

        <div class="wrap-input100 validate-input m-b-23" data-validate = "E-mail is reauired">
            <span class="label-input100">{{ __('E-Mail Address') }}</span>
            <input class="input100" type="email" name="email" value="{{ old('email') }}" autofocus placeholder="Type your E-mail Address">
            <span class="focus-input100" data-symbol="&#xf206;"></span>
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

        <div class="container-login100-form-btn">
            <div class="wrap-login100-form-btn">
                <div class="login100-form-bgbtn"></div>
                <button class="login100-form-btn">
                    {{ __('Reset Password') }}
                </button>
            </div>
        </div>
    </form>
@endsection

