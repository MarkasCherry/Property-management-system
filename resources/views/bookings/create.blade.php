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
