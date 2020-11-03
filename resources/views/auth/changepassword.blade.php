@extends('layouts/master')
@section('content')
    <div class="container mt-30 ">
        <div class="row">
            <div class="col-md-4"></div>
            <div class=" col-sm-12 col-md-4">
                <div class="card">
                    <h2 class="card-header text-center mb-30">
                        {{ __('Reset Password') }}
                    </h2>
                    <form method="post" action="{{ route('password.update') }}">
                        @csrf
                        <div class="form-group mt-20">
                            <input type="password" autofocus  class="form-control {{ $errors->has('oldpass') ? ' is-invalid' : '' }}" placeholder="Current Password"  name="oldpass" value="{{ $oldpass ?? old('oldpass') }}">
                        </div>

                        <div class="form-group mt-20">
                            <input type="password" class="form-control" placeholder="Password" id="password" name="password">
                        </div>

                        <div class="form-group mt-20">
                            <input type="password" class="form-control" placeholder="Repeat Password" id="password_confirmation" name="password_confirmation">
                        </div>
                        <button type="submit" class="btn btn-info"> {{ __('Reset Password') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
