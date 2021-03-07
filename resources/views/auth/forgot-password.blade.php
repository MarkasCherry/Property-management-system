@extends('layouts.auth')

@section('content')
    <div class="auth-wrapper">

        <div class="modern-login">

            <div class="underlay is-hidden-mobile"></div>

            <div class="columns is-gapless is-vcentered">
                <div class="column is-relative is-8 h-hidden-mobile">
                    <div class="hero is-fullheight is-image">
                        <div class="hero-body">
                            <div class="container">
                                <div class="columns">
                                    <div class="column">
                                        <img class="hero-image" src="{{ asset('assets/img/illustrations/login/station.svg') }}" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="column is-4 is-relative">
                    <a class="top-logo" href="/">
                        <img class="light-image" src="{{ asset('assets/img/logos/logo/logo.svg') }}" alt="">
                        <img class="dark-image" src="{{ asset('assets/img/logos/logo/logo-light.svg') }}" alt="">
                    </a>
                    <label class="dark-mode ml-auto">
                        <input type="checkbox" name="dark-mode" checked>
                        <span></span>
                    </label>
                    <div class="is-form">
                        <div class="hero-body">
                            <div class="form-text">
                                <h2>Recover Account</h2>
                                <p>Reset your account password.</p>
                            </div>

                            <form id="recover-form" class="login-wrapper" method="POST" action="{{ route('password.email') }}">
                                @csrf
                                <p class="recover-text">Enter your email and click on the confirm button to reset your password. We'll send you an email detailing the steps to complete the procedure.</p>
                                <div class="control has-validation @error('email') has-error @enderror">
                                    <input type="text" name="email" value="{{ old('email') }}" class="input">
                                    @error('email')
                                        <small class="error-text" style="display:block;">{{ $message }}</small>
                                    @enderror
                                    <div class="auth-label">Email Address</div>
                                    <div class="auth-icon">
                                        <i class="lnil lnil-envelope"></i>
                                    </div>
                                </div>

                                @if (session('status'))
                                    <div class="mb-4 font-medium text-sm text-green-600">
                                        {{ session('status') }}
                                    </div>
                                @endif

                                <div class="button-wrap">
                                    <a href="{{ route('login') }}" type="button" class="button h-button is-white is-big is-rounded is-lower">Cancel</a>
                                    <button type="submit" class="button h-button is-solid is-big is-rounded is-lower is-raised is-colored">Confirm</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
