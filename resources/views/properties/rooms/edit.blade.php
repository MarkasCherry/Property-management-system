@extends('layouts.app')

@section('title', __('Rooms'))

@section('content')
    <x-forms.layout headerTitle='Edit room {{ $room->room_number }} of "{{ $room->property->name }}"' redirect="{{ route('properties.show', $room->property) }}">
        <x-ui.tabs :tabs="['mainSettings', 'media', 'housekeeping', 'seoSettings']">
            <x-slot name="mainSettings">
                <form method="post" action="{{ route('rooms.update', $room) }}">
                    @csrf
                    @method('PUT')
                    <div class="columns is-multiline">
                        <div class="column is-3">
                            <x-inputs.group for="name" name="name" value="{{ $room->name }}">
                                <x-slot name="title">{{ __('Room name') }}</x-slot>
                            </x-inputs.group>
                        </div>

                        <div class="column is-3">
                            <x-inputs.group for="room_number" name="room_number" value="{{ $room->room_number }}">
                                <x-slot name="title">{{ __('Room number') }}</x-slot>
                            </x-inputs.group>
                        </div>

                        <div class="column is-6">
                            <div class="columns is-centered m-t-5">
                                <x-inputs.switcher name="active" checked="{{ $room->active }}">
                                    <x-slot name="title">{{ __('Active?') }}</x-slot>
                                </x-inputs.switcher>
                            </div>
                        </div>

                        <div class="column is-3">
                            <x-inputs.group for="capacity" name="capacity" value="{{ $room->capacity }}" type="number">
                                <x-slot name="title">{{ __('Max number of people') }}</x-slot>
                            </x-inputs.group>
                        </div>

                        <div class="column is-3">
                            <x-inputs.group for="bed_count" name="bed_count" value="{{ $room->bed_count }}" type="number">
                                <x-slot name="title">{{ __('Number of beds') }}</x-slot>
                            </x-inputs.group>
                        </div>

                        <div class="column is-3">
                            <x-inputs.group for="bathroom_count" name="bathroom_count" value="{{ $room->bathroom_count }}" type="number">
                                <x-slot name="title">{{ __('Number of bathrooms') }}</x-slot>
                            </x-inputs.group>
                        </div>

                        <div class="column is-3">
                            <x-inputs.group for="night_price" name="night_price" value="{{ $room->night_price }}">
                                <x-slot name="title">{{ __('Price per night') }}</x-slot>
                            </x-inputs.group>
                        </div>

                        <div class="column is-12">
                            <x-inputs.textarea for="short_description" name="short_description" value="{{ $room->short_description }}" rows="4">
                                <x-slot name="title">{{ __('Short description') }}</x-slot>
                            </x-inputs.textarea>
                        </div>

                        <div class="column is-12">
                            <x-inputs.sun-editor id="sun-editor" for="long_description" name="long_description" value="{{ $room->long_description }}">
                                <x-slot name="title">{{ __('Long description') }}</x-slot>
                            </x-inputs.sun-editor>
                        </div>
                    </div>
                    <x-buttons.form-submit title="{{ __('Save Main Settings') }}"></x-buttons.form-submit>
                </form>
            </x-slot>

            <x-slot name="media">
                <x-forms.media :model="'App_Models_Room'" :modelId="$room->id"></x-forms.media>
            </x-slot>

            <x-slot name="housekeeping">
                <form method="post" action="{{ route('rooms.updateHousekeeping', $room) }}">
                    @csrf
                    @method('PUT')
                    <div class="columns is-multiline">
                        <div class="column is-6">
                            <div class="field">
                                <x-jet-label for="last_housekeeping" value="{{ __('Last Housekeeping') }}"/>
                                <input type="date" name="last_housekeeping"
                                       value="{{ old('last_housekeeping') ?? Carbon\Carbon::parse($room->last_housekeeping)->format('Y-m-d') }}"
                                       class="input"
                                />
                                <x-jet-input-error for="last_housekeeping" class="mt-2"/>
                            </div>
                        </div>

                        <div class="column is-6 m-b-20">
                            <div class="columns is-centered">
                                <x-inputs.switcher name="needs_housekeeping" checked="{{ $room->needs_housekeeping }}">
                                    <x-slot name="title">{{ __('Needs housekeeping?') }}</x-slot>
                                </x-inputs.switcher>
                            </div>
                        </div>
                    </div>
                    <x-buttons.form-submit title="{{ __('Save Main Settings') }}"></x-buttons.form-submit>
                </form>
            </x-slot>

            <x-slot name="seoSettings">
                <x-forms.seo-settings action="{{ route('rooms.updateSeo', $room) }}" :model="$room"></x-forms.seo-settings>
            </x-slot>
        </x-ui.tabs>
    </x-forms.layout>
@endsection

@push('scripts')
    <script>
        media("App_Models_Room", {{ $room->id }});
    </script>

    <script>
        var multipleCancelButton = new Choices('#choices-multiple-remove-button', {
            removeItemButton: true,
        });
    </script>

    <script>
        lightGallery(document.getElementById('lightgallery'));
    </script>

    <script>
        $(document).ready(function() {
            const editor = SUNEDITOR.create((document.getElementById('sun-editor') || 'sun-editor'), {
                buttonList: [
                    ['undo', 'redo'],
                    ['font', 'fontSize', 'formatBlock'],
                    ['paragraphStyle', 'blockquote'],
                    ['bold', 'underline', 'italic', 'strike', 'subscript', 'superscript'],
                    ['fontColor', 'hiliteColor', 'textStyle'],
                    ['removeFormat'],
                    ['outdent', 'indent'],
                    ['align', 'horizontalRule', 'list', 'lineHeight'],
                    ['table', 'link'],
                    ['fullScreen', 'showBlocks', 'codeView'],
                    ['preview'],
                ],
                width: '100%',
                height: 250,
                placeholder: 'Write the description about room...'
            });

            $(window).click(function() {
                if(editor.getContents() === '<p><br></p>') {
                    $('#sun-editor-text').val(null);
                } else {
                    $('#sun-editor-text').val(editor.getContents());
                }
            });
        });
    </script>

@endpush
