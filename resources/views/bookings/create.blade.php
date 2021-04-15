@extends('layouts.app')

@section('title', __('Bookings'))

@section('content')
    <x-forms.layout headerTitle="Create booking" redirect="{{ route('bookings.index') }}">
        @livewire('bookings.booking-component', [
            'formTitle' => 'Create Booking',
            'indexRoute' => route('bookings.index'),
            'formSubmitButtonText' => 'Create'
        ])
    </x-forms.layout>
@endsection

@push('scripts')
    <script>
        let calendars = bulmaCalendar.attach('#bulma-calendar', {
            color: themeColors.primary,
            lang: 'en'
        });
        // To access to bulmaCalendar instance of an element
        let element = document.querySelector('#bulma-calendar');
        if (element) {
            // bulmaCalendar instance is available as element.bulmaCalendar
            element.bulmaCalendar.on('select', function(datepicker) {
                let dates = datepicker.data.value().split(' - ')

                $('#start_date').val(dates[0]);
                $('#end_date').val(dates[1]);

                window.livewire.emit('setDates', dates[0], dates[1]);
            });
        }
    </script>
@endpush
