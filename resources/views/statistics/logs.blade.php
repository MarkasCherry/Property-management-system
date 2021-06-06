@extends('layouts.app')

@section('content')

    <livewire:statistic-logs />

@endsection

@push('styles_after')
    <link rel="stylesheet" href="{{ mix('assets/css/livewire-datatables.css') }}">
@endpush
