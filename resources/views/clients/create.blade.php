@extends('layouts.app')

@section('title', __('Properties'))

@section('content')
    <x-forms.layout headerTitle="Create Client" redirect="{{ route('clients.index') }}">
            @livewire('clients.client-component', [
                'formTitle' => 'Create Client',
                'indexRoute' => route('clients.index'),
                'formSubmitButtonText' => 'Create'
            ])
    </x-forms.layout>
@endsection
