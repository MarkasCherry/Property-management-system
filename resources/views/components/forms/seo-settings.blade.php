<div>
    <form method="POST" action="{{ $attributes->get('action') }}">
        @method('PUT')
        @csrf

        <div class="columns is-multiline">
            <div class="column is-6">
                <x-inputs.textarea name="seo_h1_title" for="seo_h1_title" value="{{ $model->seo_h1_title }}">
                    <x-slot name="title">{{ __('SEO H1 Title') }}</x-slot>
                </x-inputs.textarea>
            </div>

            <div class="column is-6">
                <x-inputs.textarea name="seo_meta_title" for="seo_meta_title" value="{{ $model->seo_meta_title }}">
                    <x-slot name="title">{{ __('SEO Meta Title') }}</x-slot>
                </x-inputs.textarea>
            </div>

            <div class="column is-12">
                <x-inputs.textarea name="seo_meta_description" for="seo_meta_description" value="{{ $model->seo_meta_description }}">
                    <x-slot
                        name="title">{{ __('SEO Meta Description') }}</x-slot>
                </x-inputs.textarea>
            </div>
        </div>
        <x-buttons.form-submit title="{{ __('Save SEO Settings') }}"></x-buttons.form-submit>
    </form>
</div>
