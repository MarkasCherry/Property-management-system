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
                        <!--Fieldset-->
                        <div class="column is-6">
                            <x-inputs.group for="name" value="{{ old('name') }}" name="name">
                                <x-slot name="title">{{ __('First name') }}</x-slot>
                            </x-inputs.group>
                        </div>

                        <!--Fieldset-->
                        <div class="column is-6">
                            <x-inputs.group for="last_name" value="{{ old('last_name') }}" name="last_name">
                                <x-slot name="title">{{ __('Last name') }}</x-slot>
                            </x-inputs.group>
                        </div>

                        <!--Fieldset-->
                        <div class="column is-6">
                            <x-inputs.group for="email" value="{{ old('email') }}" name="email">
                                <x-slot name="title">{{ __('Email') }}</x-slot>
                            </x-inputs.group>
                        </div>

                        <!--Fieldset-->
                        <div class="column is-6">
                            <x-inputs.group for="position" value="{{ old('position') }}" name="position">
                                <x-slot name="title">{{ __('Position') }}</x-slot>
                            </x-inputs.group>
                        </div>

                        <!--Fieldset-->
                        <div class="column is-6">
                            <div class="columns is-multiline">
                                <div class="column is-12">
                                    <div class="l-card-advanced">
                                        <div class="card-head">
                                            <div class="left">
                                                <h3 class="title is-6">{{ __('Assign roles for user') }}</h3>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="field">
                                                <div class="control has-validation columns is-multiline">
                                                    @foreach($roles as $role)
                                                        <label class="checkbox column is-12">
                                                            <input type="checkbox"
                                                                   @if(in_array($role->name, $selectedRoles))
                                                                   checked
                                                                   @endif
                                                                   value="{{ $role->name }}"
                                                                   wire:model.defer="selectedRoles"/>
                                                            <span></span>
                                                            {{ $role->name }}
                                                        </label>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--Fieldset-->
                        <div class="column is-6">
                            <div class="columns is-centered m-t-5">
                                <x-inputs.switcher for="active" value="1" name="active">
                                    <x-slot name="title">{{ __('Active?') }}</x-slot>
                                </x-inputs.switcher>
                            </div>
                        </div>

                        <!--Fieldset-->
                        <div class="column is-6">
                            <x-inputs.file name="photo" for="photo" file="{{ $photo }}"></x-inputs.file>
                        </div>

                    @if($formAction == 'update')
                        <!--Fieldset-->
                            <div class="column is-6">
                                <label class="checkbox is-outlined is-danger">
                                    <input type="checkbox" wire:model="generatePassword" value="1">
                                    <span></span>
                                    <span class="text-h-red">Generate new password for a user?</span>
                                </label>
                            </div>
                        @endif

                        @if($formAction == "update" && is_null($photo))
                            <div class="column is-6">
                                <div class="p-t-5">
                                    <img src="{{ asset('storage/' . $user->profile_photo_path) }}" width="223" alt="{{ $user->getFullName() }}">
                                </div>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
