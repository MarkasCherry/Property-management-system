@extends('layouts.app')

@section('title', __('Properties'))

@section('content')
    <x-forms.layout method="POST" action="{{ route('properties.store') }}" headerTitle="Add property" redirect="{{ route('properties.index') }}">
        <x-ui.tabs :tabs="['mainSettings']">
            <x-slot name="mainSettings">
                <div class="columns is-multiline">
                    <div class="column is-6">
                        <x-inputs.group for="name" name="name">
                            <x-slot name="title">{{ __('Property name') }}</x-slot>
                        </x-inputs.group>
                    </div>

                    <div class="column is-6">
                        <x-inputs.star-rating name="rating">
                            <x-slot name="title">{{ __('Property rating') }}</x-slot>
                        </x-inputs.star-rating>
                    </div>

                    <div class="column is-6">
                        <x-inputs.group for="address" name="address">
                            <x-slot name="title">{{ __('Address') }}</x-slot>
                        </x-inputs.group>
                    </div>

                    <div class="column is-6">
                        <x-inputs.textarea for="short_description" name="short_description" rows="4">
                            <x-slot name="title">{{ __('Short description') }}</x-slot>
                        </x-inputs.textarea>
                    </div>
                </div>
            </x-slot>
        </x-ui.tabs>
    </x-forms.layout>
@endsection
