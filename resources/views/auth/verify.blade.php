@extends('layouts/master_form')

@section('form')
    <form class="login100-form validate-form" action="{{route('login')}}" method="post">
        @csrf

        <span class="login100-form-title p-b-49">
            {{ __('Verify Your Email Address') }}
        </span>
        @if (session('resent'))
            <div class="alert alert-success" role="alert">
                {{ __('A fresh verification link has been sent to your email address.') }}
            </div>
        @endif
        {{ __('Before proceeding, please check your email for a verification link.') }}
        {{ __('If you did not receive the email') }}
        <div class="container-login100-form-btn">
            <div class="wrap-login100-form-btn">
                <div class="login100-form-bgbtn"></div>
                <button class="login100-form-btn">
                    {{ __('click here to request another') }}
                </button>
            </div>
        </div>
    </form>
@endsection

