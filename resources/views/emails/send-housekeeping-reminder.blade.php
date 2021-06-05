@component('mail::message')
    <p>{{ __('The following rooms must be cleaned today:') }}</p>
    <ul>
        @foreach($rooms as $room)
            <li>{{ __('Room ') . $room->room_number . __(' of property "') . $room->property->name .'"' }}</li>
        @endforeach
    </ul>
@endcomponent
