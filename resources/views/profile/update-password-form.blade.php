<x-jet-form-section submit="updatePassword">
    <x-slot name="title">
        {{ __('Update Password') }}
    </x-slot>

    <x-slot name="form">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Information saved!') }}
        </x-jet-action-message>

        <div class="columns is-multiline m-t-5">
            <div class="column is-12">
                <x-inputs.group for="current_password" name="state.current_password" type="password">
                    <x-slot name="title">{{ __('Current Password') }}</x-slot>
                </x-inputs.group>
            </div>
            <div class="column is-12">
                <x-inputs.group for="password" name="state.password" type="password">
                    <x-slot name="title">{{ __('New Password') }}</x-slot>
                </x-inputs.group>
            </div>
            <div class="column is-12">
                <x-inputs.group for="password" name="state.password_confirmation" type="password">
                    <x-slot name="title">{{ __('Confirm Password') }}</x-slot>
                </x-inputs.group>
            </div>
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-jet-button>
            {{ __('Save') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
