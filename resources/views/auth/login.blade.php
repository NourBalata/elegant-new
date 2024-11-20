@extends('auth.layouts.app')

@section('content')

<div class="main-wrapper login-body">
    <div class="container-fluid px-0">
        <div class="row">

            <div class="col-lg-6 login-wrap">
                <div class="login-sec">
                    <div class="log-img">
                        <img class="img-fluid" src="{{asset('dashboard/assets/img/login-02.png')}}" alt="Logo">
                    </div>
                </div>
            </div>


            <div class="col-lg-6 login-wrap-bg">
                <div class="login-wrapper">
                    <div class="loginbox">
                        <div class="login-right">
                            <div class="login-right-wrap">
                                <div class="account-logo">
                                    <a href="#"><img src="{{asset('dashboard/assets/img/login-logo.png')}}" alt=""></a>
                                </div>
                                <h2>{{ __('Login') }}</h2>

                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label>{{ __('Email Address') }} <span class="login-danger">*</span></label>
                                        <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus >
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Password <span class="login-danger">*</span></label>
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                        <span class="profile-views feather-eye-off toggle-password"></span>

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                    @if (Route::has('password.request'))
                                    <div class="forgotpass">
                                        <div class="remember-me">
                                            <label class="custom_check mr-2 mb-0 d-inline-flex remember-me"   type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>   {{ __('Remember Me') }}
                                                <input type="checkbox" name="radio">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>


                                        <a href="{{ route('password.request') }}"> {{ __('Forgot Your Password?') }}</a>
                                    </div>
                                    @endif
                                    <div class="form-group login-btn">
                                        <button class="btn btn-primary btn-block" type="submit">Login</button>
                                    </div>
                                </form>

                                <div class="next-sign">
                                    <p class="account-subtitle">Need an account? <a href="#">Sign Up</a></p>

                                    <div class="social-login">
                                        <a href="javascript:;"><img src="{{asset('dashboard/assets/img/icons/login-icon-01.svg')}}" alt=""></a>
                                        <a href="javascript:;"><img src="{{asset('dashboard/assets/img/icons/login-icon-02.svg')}}" alt=""></a>
                                        <a href="javascript:;"><img src="{{asset('dashboard/assets/img/icons/login-icon-03.svg')}}" alt=""></a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


@endsection
