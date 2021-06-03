@extends('layouts.app')

@section('title') {{ __('Settings') }} @endsection

@section('content')

    <livewire:settings.settings-table />

@endsection

@push('styles_after')
    <link rel="stylesheet" href="{{ mix('assets/css/livewire-datatables.css') }}">
@endpush
