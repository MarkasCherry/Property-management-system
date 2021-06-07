@extends('layouts.app')

@section('content')

    <livewire:needs-housekeeping-table />

@endsection

@push('styles_after')
    <link rel="stylesheet" href="{{ mix('assets/css/livewire-datatables.css') }}">
@endpush
