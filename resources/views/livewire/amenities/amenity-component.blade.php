<div class="column is-12">
    <form method="POST" wire:submit.prevent="{{ $formAction ?? 'store' }}">
        @csrf
        <div class="form-layout">
            <div class="form-outer">
                <div class="form-header stuck-header">
                    <div class="form-header-inner">
                        <div class="left">
                            <h3>{{ $formTitle }}</h3>
                        </div>
                        <div class="right">
                            <div class="buttons">
                                <a href="{{ $indexRoute }}" class="button h-button is-light is-dark-outlined">
                                    <span class="icon">
                                        <i class="lnir lnir-arrow-left rem-100"></i>
                                    </span>
                                    <span>Go back</span>
                                </a>
                                <button id="save-button" class="button h-button is-primary is-raised">
                                    {{ $formSubmitButtonText ?? 'Create' }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-body">
                    <div class="columns is-multiline">
                        <div class="column is-6">
                            <x-inputs.group for="name" model="name" important>
                                <x-slot name="title">{{ __('Facility name') }}</x-slot>
                            </x-inputs.group>
                        </div>

                        <div class="column is-6">
                            <div class="columns is-centered m-t-5">
                                <x-inputs.switcher model="active" checked="{{ $active }}">
                                    <x-slot name="title">{{ __('Active?') }}</x-slot>
                                </x-inputs.switcher>
                            </div>
                        </div>

                        <div class="column is-6">
                            <x-inputs.group for="font_awesome" model="font_awesome" placeholder="e.g. fab fa-apple">
                                <x-slot name="title">{{ __('Font awesome class') }}</x-slot>
                            </x-inputs.group>
                            <a href="https://fontawesome.com/icons?d=gallery&p=2" target="_blank">
                                {{ __('Go to Font Awesome library') }}
                            </a>
                        </div>

                        <!--Fieldset-->
                        <div class="column is-6 has-text-centered">
                            <x-jet-label for="icon" value="{{ __('Upload your custom icon') }}" />
                            <div class="columns is-centered m-t-5">
                                <x-inputs.file name="icon" for="icon" file="{{ $icon }}"></x-inputs.file>
                            </div>
                        </div>

                        @if($formAction == "update" && is_null($icon))
                            <div class="column is-6">
                                <x-jet-label for="icon" value="{{ __('Your custom icon:') }}" />
                                <div class="p-t-5">
                                    <img src="{{ asset('storage/' . $amenity->icon) }}" width="100" alt="{{ $amenity->name }}">
                                </div>
                            </div>
                        @endif
                    </div>
                    <x-jet-input-error for="permissions" class="mt-2"/>
                </div>
            </div>
        </div>
    </form>
</div>
