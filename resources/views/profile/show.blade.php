@extends('layouts.app')

@section('title')  {{ __('Profile') }} @endsection

@section('content')
    <div class="account-wrapper is-webapp">
        <div class="columns">
            <div class="column is-12">
                @livewire('profile.update-profile-information-form')
            </div>
        </div>
    </div>
    <div class="account-wrapper is-webapp">
        <div class="columns">
            <div class="column is-12">
                @livewire('profile.update-password-form')
            </div>
        </div>
    </div>
{{--    <div class="account-wrapper is-webapp">--}}
{{--        <div class="columns">--}}
{{--            <div class="column is-12">--}}
{{--                @livewire('profile.two-factor-authentication-form')--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div class="account-wrapper is-webapp">--}}
{{--        <div class="columns">--}}
{{--            <div class="column is-12">--}}
{{--                @livewire('profile.logout-other-browser-sessions-form')--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
@endsection
