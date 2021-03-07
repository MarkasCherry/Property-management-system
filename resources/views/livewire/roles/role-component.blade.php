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
                    <!--Fieldset-->
                    <div class="column is-12">
                        <x-inputs.group for="name" value="{{ old('name') }}" name="name">
                            <x-slot name="title">{{ __('Role name') }}</x-slot>
                        </x-inputs.group>
                    </div>
                    <div class="tabs-wrapper is-squared" wire:ignore>
                        <div class="tabs-inner">
                            <div class="tabs">
                                <ul>
                                    @foreach($categories as $category)
                                        <li data-tab="role-tab{{ $category->id }}" class="@if($selectedTab == $category->id) is-active @endif" wire:click="$set('selectedTab', 1)">
                                            <a><span>{{ $category->name }}</span></a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        @foreach($categories as $category)
                            @if($category->categories->isNotEmpty())
                                <div id="role-tab{{ $category->id }}" class="tab-content @if($selectedTab == $category->id) is-active @endif">
                                    <div class="columns is-multiline">
                                        @foreach($category->categories as $categoryGroup)
                                            <div class="column is-4">
                                                <div class="l-card-advanced">
                                                    <div class="card-head">
                                                        <div class="left">
                                                            <h3 class="title is-6">{!! $categoryGroup->name !!}</h3>
                                                        </div>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="field">
                                                            <div class="control has-validation columns is-multiline">
                                                                @foreach($categoryGroup->permissions as $permission)
                                                                    <label class="checkbox column is-12">
                                                                        <input type="checkbox"
                                                                               @if(in_array($permission->id, $permissions))
                                                                               checked
                                                                               @endif
                                                                               value="{{ $permission->id }}"
                                                                               wire:model.defer="permissions"/>
                                                                        <span></span>
                                                                        {{ $permission->name }}
                                                                    </label>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <x-jet-input-error for="permissions" class="mt-2"/>
                </div>
            </div>
        </div>
    </form>
</div>
