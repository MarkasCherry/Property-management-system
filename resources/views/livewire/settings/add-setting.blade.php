<div class="columns is-centered border-b p-b-50 p-t-50">
    <form method="POST" wire:submit.prevent="submit">
        <div class="column is-12">
            <div class="columns is-multiline">
                <div class="column is-12">
                    <h2 class="title is-5 is-narrow is-bold has-text-centered">{{ __('Add new setting') }}</h2>
                </div>
                <div class="column is-5">
                    <x-inputs.group for="name" name="name">
                        <x-slot name="title">{{ __('Name of the setting') }}</x-slot>
                    </x-inputs.group>
                </div>
                <div class="column is-5">
                    <x-inputs.group for="value" name="value">
                        <x-slot name="title">{{ __('Value of the Setting') }}</x-slot>
                    </x-inputs.group>
                </div>
                <div class="column is-2">
                    <button class="button h-button is-primary is-raised is-fullwidth m-t-40" type="submit">
                        {{ __('ADD') }}
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
