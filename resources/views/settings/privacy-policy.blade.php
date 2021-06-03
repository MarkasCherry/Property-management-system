@extends('layouts.app')

@section('title') {{ __('Settings') }} @endsection

@section('content')

    <x-forms.layout headerTitle="Edit privacy policy">
        <form method="POST" action="{{ route('settings.privacyPolicy.update') }}">
            @csrf
            @method('PUT')
            <div class="column is-12">
                <x-inputs.sun-editor id="sun-editor" for="value" name="value" value="{{ $setting->value ?? null}}">
                    <x-slot name="title">{{ __('Your privacy policy') }}</x-slot>
                </x-inputs.sun-editor>
            </div>
            <x-buttons.form-submit title="{{ __('Save') }}"></x-buttons.form-submit>
        </form>
    </x-forms.layout>

@endsection

@push('scripts')
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
