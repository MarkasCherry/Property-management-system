@extends('layouts.app')

@section('content')

    <div class="datatable-toolbar">
        <div class="buttons">
            <a type="button" href="#" class="button h-button is-primary is-elevated" disabled>
                <span class="icon">
                        <i class="fas fa-plus"></i>
                </span>
                <span>{{ __('Create client') }}</span>
            </a>
        </div>
    </div>

    <livewire:clients-table />

@endsection

@push('styles_after')
    <link rel="stylesheet" href="{{ mix('assets/css/livewire-datatables.css') }}">
@endpush
