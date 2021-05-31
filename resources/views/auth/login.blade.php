@extends('layouts.auth')

@section('content')
    <div class="modern-login">

        <div class="underlay is-hidden-mobile"></div>

        <div class="columns is-gapless is-vcentered">
            <div class="column is-relative is-8 h-hidden-mobile">
                <div class="hero is-fullheight is-image">
                    <div class="hero-body">
                        <div class="container">
                            <div class="columns">
                                <div class="column">
                                    <img class="hero-image"
                                         src="{{ asset('assets/img/illustrations/onboarding/set2-2.svg') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="column is-4 is-relative">
                <a class="top-logo" href="/">
                    <img class="light-image" src="{{ asset('assets/img/logo.png') }}" alt="">
                    <img class="dark-image" src="{{ asset('assets/img/logo.png') }}" alt="">
                </a>
                <label class="dark-mode ml-auto">
                    <input type="checkbox" name="dark-mode" checked>
                    <span></span>
                </label>
                <div class="is-form">
                    <div class="hero-body">
                        <div class="form-text">
                            <h2>Sign In</h2>
                            <p>{{ env('APP_NAME') }}</p>
                        </div>
                        <form id="login-form" class="login-wrapper" method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="control has-validation @error('email') has-error @enderror">
                                <input type="text" class="input" name="email" value="{{ old('email') }}" placeholder="">
                                @error('email')
                                <small class="error-text" style="display:block;">{{ $message }}</small>
                                @enderror
                                <div class="auth-label">Email Address</div>
                                <div class="auth-icon">
                                    <i class="lnil lnil-envelope"></i>
                                </div>
                            </div>
                            <div class="control has-validation @error('password') has-error @enderror">
                                <input type="password" name="password" class="input">
                                @error('password')
                                    <small class="error-text" style="display:block;">{{ $message }}</small>
                                @enderror
                                <div class="auth-label">Password</div>
                                <div class="auth-icon">
                                    <i class="lnil lnil-lock-alt"></i>
                                </div>
                            </div>

                            <div class="control is-flex">
                                <label class="remember-toggle">
                                    <input type="checkbox" name="remember-me" @if(old('remember-me')) checked @endif>
                                    <span class="toggler">
                                            <span class="active">
                                                <i data-feather="check"></i>
                                            </span>
                                            <span class="inactive">
                                                <i data-feather="circle"></i>
                                            </span>
                                    </span>
                                </label>
                                <div class="remember-me">Remember Me</div>
                                <a href="{{ route('password.request') }}">Forgot Password?</a>
                            </div>
                            <div class="button-wrap has-help">
                                <button id="login-submit" type="submit"
                                        class="button h-button is-big is-rounded is-primary is-bold is-raised">Login Now
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
