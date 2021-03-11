@extends('layouts.app')

@section('content')

    <div class="datatable-toolbar">

        <div class="buttons">
            <a type="button" href="{{ route('facilities.create') }}" class="button h-button is-primary is-elevated">
                <span class="icon">
                        <i class="fas fa-plus"></i>
                </span>
                <span>Add Facility</span>
            </a>
        </div>
    </div>

    <livewire:facilities-table/>

@endsection

@push('styles_after')
    <link rel="stylesheet" href="{{ mix('assets/css/livewire-datatables.css') }}">
@endpush
