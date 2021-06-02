@extends('layouts.app')

@section('title') {{ __('Questions') }} @endsection

@section('content')

    <livewire:reviews.reviews-table />

@endsection

@push('styles_after')
    <link rel="stylesheet" href="{{ mix('assets/css/livewire-datatables.css') }}">
@endpush
