@component('mail::message')
    We have generated a new password for your account. Please login using this password:<br>
    <div style="text-align: center">
        <b>{{ $password }}</b>
    </div>
    @component('mail::button', ['url' => env('APP_URL')])
        Login here
    @endcomponent

    Thanks,<br>
    {{ env('APP_NAME') }}
@endcomponent
