<div class="columns is-centered">
    <form method="POST" wire:submit.prevent="{{ $formAction ?? 'store' }}">
        <div class="column is-12">
            <div class="columns is-multiline">
                <div class="column is-4">
                    <x-inputs.select for="client_id" name="client_id"
                                     :data="$clients"
                                     selectTitle="{{ __('No client selected') }}"
                                     value="">
                        <x-slot name="title">{{ __('Select client') }}</x-slot>
                    </x-inputs.select>
                </div>

                <div class="column is-4">
                    <x-inputs.select for="room_id" name="room_id"
                                     :data="$rooms"
                                     selectTitle="{{ __('No room selected') }}"
                                     value="">
                        <x-slot name="title">{{ __('Select room') }}</x-slot>
                    </x-inputs.select>
                </div>

                <div class="column is-4">
                    <x-inputs.select for="status_id" name="status_id"
                                     :data="$statuses"
                                     selectTitle="{{ __('No status selected') }}"
                                     value="">
                        <x-slot name="title">{{ __('Select status') }}</x-slot>
                    </x-inputs.select>
                </div>

                <div class="column is-4">
                    <x-inputs.group for="price" model="price">
                        <x-slot name="title">{{ __('Price (£)') }}</x-slot>
                    </x-inputs.group>
                </div>

                <div class="column is-4">
                    <x-inputs.group for="deposit_paid" model="deposit_paid">
                        <x-slot name="title">{{ __('Deposit paid (£)') }}</x-slot>
                    </x-inputs.group>
                </div>

                <div class="column is-4">
                    <x-inputs.group for="guest_no" model="guest_no">
                        <x-slot name="title">{{ __('Number of guests') }}</x-slot>
                    </x-inputs.group>
                </div>

                <div class="column is-6">
                    <div class="columns is-centered m-t-5">
                        <x-inputs.switcher model="is_paid" checked="{{ $is_paid }}">
                            <x-slot name="title">{{ __('Is paid?') }}</x-slot>
                        </x-inputs.switcher>
                    </div>
                </div>

                <div class="column is-6">
                    <div class="columns is-centered m-t-5">
                        <x-inputs.switcher model="breakfast_needed" checked="{{ $breakfast_needed }}">
                            <x-slot name="title">{{ __('Is breakfast needed?') }}</x-slot>
                        </x-inputs.switcher>
                    </div>
                </div>

                <div class="column is-12">
                    <div class="field" wire:ignore>
                        <div class="control">
                            <input id="bulma-calendar" class="input" type="date" data-is-range="true">
                        </div>
                    </div>
                    <x-jet-input-error for="end_date" class="mt-2"/>
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



