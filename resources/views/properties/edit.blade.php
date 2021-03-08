@extends('layouts.app')

@section('title', __('Properties'))

@section('content')
    <x-forms.layout headerTitle="Edit property: {{ $property->name }}" redirect="{{ route('properties.index') }}">
        <x-ui.tabs :tabs="['mainSettings', 'description', 'media', 'seoSettings',]">
            <x-slot name="mainSettings">
                <form method="post" action="{{ route('properties.update', $property) }}">
                    @csrf
                    @method('PUT')
                    <div class="columns is-multiline">
                        <div class="column is-6">
                            <x-inputs.group for="name" name="name" value="{{ $property->name }}">
                                <x-slot name="title">{{ __('Property name') }}</x-slot>
                            </x-inputs.group>
                        </div>

                        <div class="column is-6">
                            <x-inputs.star-rating name="rating" value="{{ $property->rating }}">
                                <x-slot name="title">{{ __('Property rating') }}</x-slot>
                            </x-inputs.star-rating>
                        </div>

                        <div class="column is-6">
                            <x-inputs.group for="address" name="address" value="{{ $property->address }}">
                                <x-slot name="title">{{ __('Address') }}</x-slot>
                            </x-inputs.group>
                        </div>

                        <div class="column is-6">
                            <x-inputs.textarea for="short_description" name="short_description" value="{{ $property->short_description }}" rows="4">
                                <x-slot name="title">{{ __('Short description') }}</x-slot>
                            </x-inputs.textarea>
                        </div>

                        <div class="column is-6">
                            <div class="columns is-centered m-t-5">
                                <x-inputs.switcher for="active" name="active">
                                    <x-slot name="title">{{ __('Active?') }}</x-slot>
                                </x-inputs.switcher>
                            </div>
                        </div>

{{--                        <div class="columns is-centered m-t-5">--}}
{{--                            <x-inputs.switcher for="active" name="active">--}}
{{--                                <x-slot name="title">{{ __('Active?') }}</x-slot>--}}
{{--                            </x-inputs.switcher>--}}
{{--                        </div>--}}
                    </div>
                    <x-buttons.form-submit title="{{ __('Save Main Settings') }}"></x-buttons.form-submit>
                </form>
            </x-slot>

            <x-slot name="description">
                <form method="post" action="{{ route('properties.updateDescription', $property) }}">
                    @csrf
                    @method('PUT')
                    <div class="column is-12">
                        <x-inputs.sun-editor id="sun-editor" for="long_description" name="long_description" value="{{ $property->long_description }}">
                            <x-slot name="title">{{ __('Property description') }}</x-slot>
                        </x-inputs.sun-editor>
                    </div>
                    <x-buttons.form-submit title="{{ __('Save description') }}"></x-buttons.form-submit>
                </form>
            </x-slot>

            <x-slot name="media">
                <form method="post" action="{{ route('properties.updateMedia', $property) }}">
                    @csrf
                    @method('PUT')
                    <x-buttons.form-submit title="{{ __('Save media') }}"></x-buttons.form-submit>
                </form>
            </x-slot>

            <x-slot name="seoSettings">
                <x-forms.seo-settings action="{{ route('properties.updateSeo', $property) }}" :model="$property"></x-forms.seo-settings>
            </x-slot>

        </x-ui.tabs>
    </x-forms.layout>
@endsection

@push('scripts')
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
                placeholder: 'Write the description about property...'
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
