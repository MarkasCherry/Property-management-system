<div>
    <form method="POST" action="{{ $attributes->get('action') }}">
        @method('PUT')
        @csrf

        <div class="columns is-multiline">
            <div class="column is-6">
                <x-inputs.textarea name="seo_h1_title" :model="$model">
                    <x-slot name="title">{{ __('SEO H1 Title') }}</x-slot>
                </x-inputs.textarea>
            </div>

            <div class="column is-6">
                <x-inputs.textarea name="seto_meta_title" :model="$model">
                    <x-slot name="title">{{ __('SEO Meta Title') }}</x-slot>
                </x-inputs.textarea>
            </div>

            <div class="column is-12">
                <x-inputs.textarea name="seo_meta_description" :model="$model">
                    <x-slot
                        name="title">{{ __('SEO Meta Description') }}</x-slot>
                </x-inputs.textarea>
            </div>
        </div>

        <button class="button h-button is-primary is-raised" type="submit">
            {{ __('Save SEO Settings') }}
        </button>
    </form>
</div>
