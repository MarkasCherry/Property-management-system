@extends('layouts.app')

@section('title', __('Properties'))

@section('content')
    <x-forms.layout headerTitle="Edit Client" redirect="{{ route('clients.index') }}">
        @livewire('clients.client-component', [
            'formTitle' => 'Edit Client',
            'indexRoute' => route('clients.index'),
            'formAction' => 'update',
            'formSubmitButtonText' => 'Update',
            'client' => $client,
        ])
    </x-forms.layout>
@endsection
