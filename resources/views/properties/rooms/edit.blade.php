@extends('layouts.app')

@section('title', __('Rooms'))

@section('content')
    <x-forms.layout headerTitle='Edit room {{ $room->room_number }} of "{{ $room->property->name }}"' redirect="{{ route('properties.show', $room->property) }}">
        <x-ui.tabs :tabs="['mainSettings', 'media', 'seoSettings']">
            <x-slot name="mainSettings">
                <form method="post" action="{{ route('rooms.update', $room) }}">
                    @csrf
                    @method('PUT')
                    <div class="columns is-multiline">
                        <div class="column is-4">
                            <x-inputs.group for="name" name="name" value="{{ $room->name }}">
                                <x-slot name="title">{{ __('Property name') }}</x-slot>
                            </x-inputs.group>
                        </div>

                        <div class="column is-4">
                            <x-inputs.group for="room_number" name="room_number" value="{{ $room->room_number }}">
                                <x-slot name="title">{{ __('Room number') }}</x-slot>
                            </x-inputs.group>
                        </div>

                        <div class="column is-4">
                            <div class="columns is-centered m-t-5">
                                <x-inputs.switcher name="active" checked="{{ $room->active }}">
                                    <x-slot name="title">{{ __('Active?') }}</x-slot>
                                </x-inputs.switcher>
                            </div>
                        </div>

                        <div class="column is-4">
                            <x-inputs.group for="capacity" name="capacity" value="{{ $room->capacity }}" type="number">
                                <x-slot name="title">{{ __('Max number of people') }}</x-slot>
                            </x-inputs.group>
                        </div>

                        <div class="column is-4">
                            <x-inputs.group for="bed_count" name="bed_count" value="{{ $room->bed_count }}" type="number">
                                <x-slot name="title">{{ __('Number of beds') }}</x-slot>
                            </x-inputs.group>
                        </div>

                        <div class="column is-4">
                            <x-inputs.group for="bathroom_count" name="bathroom_count" value="{{ $room->bathroom_count }}" type="number">
                                <x-slot name="title">{{ __('Number of bathrooms') }}</x-slot>
                            </x-inputs.group>
                        </div>


                        <div class="column is-6">
                            <x-inputs.textarea for="short_description" name="short_description" value="{{ $room->short_description }}" rows="4">
                                <x-slot name="title">{{ __('Short description') }}</x-slot>
                            </x-inputs.textarea>
                        </div>

                        <div class="column is-6">
                            <x-inputs.textarea for="long_description" name="long_description" value="{{ $room->long_description }}" rows="4">
                                <x-slot name="title">{{ __('Short description') }}</x-slot>
                            </x-inputs.textarea>
                        </div>
                    </div>
                    <x-buttons.form-submit title="{{ __('Save Main Settings') }}"></x-buttons.form-submit>
                </form>
            </x-slot>

            <x-slot name="media">
                <form method="post" action="{{ route('rooms.updateMedia', $room) }}">
                    @csrf
                    @method('PUT')
                    <x-buttons.form-submit title="{{ __('Save media') }}"></x-buttons.form-submit>
                </form>
            </x-slot>

{{--            <x-slot name="amenities">--}}
{{--                <form method="post" action="{{ route('properties.updateAmenities', $property) }}">--}}
{{--                    @csrf--}}
{{--                    @method('PUT')--}}
{{--                    <div class="field">--}}
{{--                        <label>{{ __('Add property amenities') }}</label>--}}
{{--                        <div class="control">--}}
{{--                            <select class="form-control" name="amenities[]"--}}
{{--                                    id="choices-multiple-remove-button" placeholder="{{ __('Select amenities') }}"--}}
{{--                                    multiple>--}}
{{--                                @foreach($amenities as $amenity)--}}
{{--                                    <option value="{{ $amenity->id }}" @if($property->amenities()->whereAmenityId($amenity->id)->exists()) selected @endif>--}}
{{--                                        {{ $amenity->name }}--}}
{{--                                    </option>--}}
{{--                                @endforeach--}}
{{--                            </select>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <x-buttons.form-submit title="{{ __('Save amenities') }}"></x-buttons.form-submit>--}}
{{--                </form>--}}
{{--            </x-slot>--}}

            <x-slot name="seoSettings">
                <x-forms.seo-settings action="{{ route('rooms.updateSeo', $room) }}" :model="$room"></x-forms.seo-settings>
            </x-slot>

        </x-ui.tabs>
    </x-forms.layout>
@endsection

@push('scripts')
    <script>
        var multipleCancelButton = new Choices('#choices-multiple-remove-button', {
            removeItemButton: true,
        });
    </script>

    <script>
        lightGallery(document.getElementById('lightgallery'));
    </script>

@endpush
