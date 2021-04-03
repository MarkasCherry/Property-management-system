@extends('layouts.app')

@section('title', __('Properties'))

@section('content')
    <x-forms.layout headerTitle="Edit client" redirect="{{ route('clients.index') }}">
        <x-ui.tabs :tabs="['mainSettings', 'media']">
            <x-slot name="mainSettings">
                @livewire('clients.client-component', [
                    'formTitle' => 'Edit Client',
                    'indexRoute' => route('clients.index'),
                    'formAction' => 'update',
                    'formSubmitButtonText' => 'Update',
                    'client' => $client,
                ])
            </x-slot>
            <x-slot name="media">

            </x-slot>
        </x-ui.tabs>
    </x-forms.layout>
@endsection
