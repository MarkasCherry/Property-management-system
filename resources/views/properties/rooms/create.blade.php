@extends('layouts.app')

@section('title', __('Properties'))

@section('content')
    <x-forms.layout method="POST" action="{{ route('properties.storeRoom', $property) }}" headerTitle='Add room to "{{ $property->name }}"' redirect="{{ route('properties.index') }}">
        <x-ui.tabs :tabs="['mainSettings']">
            <x-slot name="mainSettings">
                <div class="columns is-multiline">
                    <div class="column is-4">
                        <x-inputs.group for="name" name="name" value="{{ old('name') }}">
                            <x-slot name="title">{{ __('Room name') }}</x-slot>
                        </x-inputs.group>
                    </div>

                    <div class="column is-4">
                        <x-inputs.group for="room_number" name="room_number" value="{{ old('room_number') }}">
                            <x-slot name="title">{{ __('Room number') }}</x-slot>
                        </x-inputs.group>
                    </div>

                    <div class="column is-4">
                        <div class="columns is-centered m-t-5">
                            <x-inputs.switcher name="active" checked="{{ old('active') }}">
                                <x-slot name="title">{{ __('Active?') }}</x-slot>
                            </x-inputs.switcher>
                        </div>
                    </div>

                    <div class="column is-4">
                        <x-inputs.group for="capacity" name="capacity" value="{{ old('capacity') }}" type="number">
                            <x-slot name="title">{{ __('Max number of people') }}</x-slot>
                        </x-inputs.group>
                    </div>

                    <div class="column is-4">
                        <x-inputs.group for="bed_count" name="bed_count" value="{{ old('bed_count') }}" type="number">
                            <x-slot name="title">{{ __('Number of beds') }}</x-slot>
                        </x-inputs.group>
                    </div>

                    <div class="column is-4">
                        <x-inputs.group for="bathroom_count" name="bathroom_count" value="{{ old('bathroom_count') }}" type="number">
                            <x-slot name="title">{{ __('Number of bathrooms') }}</x-slot>
                        </x-inputs.group>
                    </div>


                    <div class="column is-6">
                        <x-inputs.textarea for="short_description" name="short_description" value="{{ old('short_description') }}" rows="4">
                            <x-slot name="title">{{ __('Short description') }}</x-slot>
                        </x-inputs.textarea>
                    </div>

                    <div class="column is-6">
                        <x-inputs.textarea for="long_description" name="long_description" value="{{ old('long_description') }}" rows="4">
                            <x-slot name="title">{{ __('Long description') }}</x-slot>
                        </x-inputs.textarea>
                    </div>
                </div>
            </x-slot>
        </x-ui.tabs>
    </x-forms.layout>
@endsection
