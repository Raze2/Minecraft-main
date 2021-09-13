@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center text-white">
        <h2>{{ trans('frontend.players-login') }}</h2>
    </div>
    <div class="row justify-content-center">
        <div class="col-12 col-md-6">
            <p class="login-box-msg">
                {{ trans('global.login') }}
            </p>

            <div class="alert alert-info py-2 px-3" style="font-size: 13px;">
                Please Type /createpassword IN THE SERVER! <br>
                <p class="text-right m-0" style="color: #0c5460;direction:rtl;font-size: 13px;">اذا كان لديك حساب ماين كرافت اصلية قم بكتابة /createpassword في السيرفر لتستطيع التسجيل في الموقع من خلال اسمك وكلمة السر</span>
                </div>

            @if(session()->has('message'))
                <p class="alert alert-danger">
                    {{ session()->get('message') }}
                </p>
            @endif

            <form action="{{ route('frontend.login') }}" method="POST">
                @csrf

                <div class="form-group">
                    <input id="username" type="username" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" required autocomplete="username" autofocus placeholder="{{ trans('global.login_username') }}" name="username" value="{{ old('username', null) }}">

                    @if($errors->has('username'))
                        <div class="invalid-feedback">
                            {{ $errors->first('username') }}
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="{{ trans('global.login_password') }}">

                    @if($errors->has('password'))
                        <div class="invalid-feedback">
                            {{ $errors->first('password') }}
                        </div>
                    @endif
                </div>


                <div class="row">
                    <div class="col-md-8">
                        <div class="icheck-primary">
                            <input type="checkbox" name="remember" id="remember">
                            <label for="remember" class="text-white">{{ trans('global.remember_me') }}</label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-md-5">
                        <button type="submit" class="btn_1 btn-block">
                            {{ trans('global.login') }}
                        </button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>


            {{-- @if(Route::has('password.request'))
                <p class="mb-1">
                    <a href="{{ route('password.request') }}">
                        {{ trans('global.forgot_password') }}
                    </a>
                </p>
            @endif --}}
            {{-- <p class="mb-1">
                <a class="text-center" href="{{ route('register') }}">
                    {{ trans('global.register') }}
                </a>
            </p> --}}
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
@endsection