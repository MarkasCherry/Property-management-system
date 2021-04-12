<div>
    <form method="POST" wire:submit.prevent="{{ $formAction ?? 'store' }}">
        @csrf
        <div class="form-body">
            <div class="columns is-multiline">
                <!--Fieldset-->
                <div class="column is-6">
                    <x-inputs.group for="code" model="code">
                        <x-slot name="title">{{ __('Booking CODE') }}</x-slot>
                    </x-inputs.group>
                </div>

                <!--Fieldset-->
                <div class="column is-6">
                    <div class="columns is-centered m-t-5">
                        <x-inputs.switcher for="is_paid" value="1" model="is_paid">
                            <x-slot name="title">{{ __('Is paid?') }}</x-slot>
                        </x-inputs.switcher>
                    </div>
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
