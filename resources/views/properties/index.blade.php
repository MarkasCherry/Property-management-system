@extends('layouts.app')

@section('content')

    <div class="datatable-toolbar">

        <div class="buttons">
            <a type="button" href="{{ route('properties.create') }}" class="button h-button is-primary is-elevated">
                <span class="icon">
                        <i class="fas fa-plus"></i>
                </span>
                <span>Add Property</span>
            </a>
        </div>
    </div>

    @foreach($properties as $property)
        <h1>{{ $property->name }}</h1>
    @endforeach

@endsection

@push('styles_after')
    <link rel="stylesheet" href="{{ mix('assets/css/livewire-datatables.css') }}">
@endpush
