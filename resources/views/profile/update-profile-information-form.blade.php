<x-jet-form-section submit="updateProfileInformation">

    <x-slot name="title">
        {{ __('Edit profile information') }}
    </x-slot>

    <x-slot name="form">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Information saved!') }}
        </x-jet-action-message>

        <div x-data="{photoName: null, photoPreview: null}">
            <!--Fieldset-->
            <div class="fieldset">
                <div class="h-avatar profile-h-avatar is-xl" x-show="! photoPreview">
                    <img class="avatar" src="{{ $this->user->profile_photo_url }}"
                         alt="{{ $this->user->name }}"/>
                </div>

                <!-- New Profile Photo Preview -->
                <div class="h-avatar is-xl" x-show="photoPreview">
                    <img class="avatar" x-bind:src="photoPreview" alt="{{ $this->user->name }}">
                </div>

                <x-jet-input-error for="photo" class="mt-2"/>
            </div>

            <!--Profile Settings-->
            <div class="profile-wrapper is-webapp">
                <div class="profile-header has-text-centered">
                    <!-- Profile Photo File Input -->
                    <input type="file" class="is-hidden"
                           wire:model="photo"
                           x-ref="photo"
                           x-on:change="
                                photoName = $refs.photo.files[0].name;
                                const reader = new FileReader();
                                reader.onload = (e) => {
                                    photoPreview = e.target.result;
                                };
                                reader.readAsDataURL($refs.photo.files[0]);
                        "/>
                    <x-jet-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.photo.click()">
                        {{ __('Select A New Photo') }}
                    </x-jet-button>
                    @if ($this->user->profile_photo_path)
                        <x-jet-danger-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                            {{ __('Remove Photo') }}
                        </x-jet-danger-button>
                    @endif
                </div>
            </div>
        </div>

        <div class="columns is-multiline m-t-5">
            <div class="column is-6">
                <x-inputs.group for="name" name="state.name">
                    <x-slot name="title">{{ __('Name') }}</x-slot>
                </x-inputs.group>
            </div>
            <div class="column is-6">
                <x-inputs.group for="last_name" name="state.last_name">
                    <x-slot name="title">{{ __('Last name') }}</x-slot>
                </x-inputs.group>
            </div>
            <div class="column is-6">
                <x-inputs.group for="email" name="state.email">
                    <x-slot name="title">{{ __('Email') }}</x-slot>
                </x-inputs.group>
            </div>
            <div class="column is-6">
                <x-inputs.group for="position" name="state.position" >
                    <x-slot name="title">{{ __('Position') }}</x-slot>
                </x-inputs.group>
            </div>
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-jet-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Save') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
