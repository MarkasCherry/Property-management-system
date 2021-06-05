@component('mail::message')
    <h1>{{ __('Dear,') }} {{ $booking->client->name }}</h1>
    <p>{{ $text }} at {{ $booking->room->property->name }} (room: {{ $booking->room->room_number }})</p>
    <p>We are are looking forward seeing you</p>
@endcomponent
