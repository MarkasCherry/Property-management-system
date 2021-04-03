<div>
    <form method="POST" wire:submit.prevent="{{ $formAction ?? 'store' }}">
        @csrf
        <div class="form-body">
            <div class="columns is-multiline">
                <!--Fieldset-->
                <div class="column is-6">
                    <x-inputs.group for="name" value="{{ old('name') }}" model="name">
                        <x-slot name="title">{{ __('First name') }}</x-slot>
                    </x-inputs.group>
                </div>

                <!--Fieldset-->
                <div class="column is-6">
                    <x-inputs.group for="lastname" value="{{ old('lastname') }}" model="lastname">
                        <x-slot name="title">{{ __('Last name') }}</x-slot>
                    </x-inputs.group>
                </div>

                <!--Fieldset-->
                <div class="column is-6">
                    <x-inputs.group for="email" value="{{ old('email') }}" model="email">
                        <x-slot name="title">{{ __('Email') }}</x-slot>
                    </x-inputs.group>
                </div>

                <!--Fieldset-->
                <div class="column is-6">
                    <x-inputs.group for="phone" value="{{ old('phone') }}" model="phone">
                        <x-slot name="title">{{ __('Phone') }}</x-slot>
                    </x-inputs.group>
                </div>

                <!--Fieldset-->
                <div class="column is-6">
                    <div class="columns is-centered m-t-5">
                        <x-inputs.switcher for="active" value="1" model="active">
                            <x-slot name="title">{{ __('Active?') }}</x-slot>
                        </x-inputs.switcher>
                    </div>
                </div>

                <!--Fieldset-->
                <div class="column is-6">
                    <label class="checkbox is-outlined is-danger">
                        <input type="checkbox" wire:model="generatePassword" value="1">
                        <span></span>
                        <span class="text-h-red">Generate new password for a client?</span>
                    </label>
                </div>
            </div>

            <div class="has-text-right">
                <button id="save-button" class="button h-button is-primary is-raised">
                    {{ $formSubmitButtonText ?? 'store' }}
                </button>
            </div>
        </div>
    </form>
</div>
