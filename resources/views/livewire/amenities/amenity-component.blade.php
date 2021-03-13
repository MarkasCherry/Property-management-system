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
                            <x-inputs.group for="name" value="{{ old('name') }}" name="name">
                                <x-slot name="title">{{ __('Facility name') }}</x-slot>
                            </x-inputs.group>
                        </div>

                        <div class="column is-6">
                            <div class="columns is-centered m-t-5">
                                <x-inputs.switcher name="active" checked="{{ $active }}">
                                    <x-slot name="title">{{ __('Active?') }}</x-slot>
                                </x-inputs.switcher>
                            </div>
                        </div>
                    </div>
                    <x-jet-input-error for="permissions" class="mt-2"/>
                </div>
            </div>
        </div>
    </form>
</div>
