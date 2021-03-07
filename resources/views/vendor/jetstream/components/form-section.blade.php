@props(['submit'])

<div {{ $attributes }}>
    <div class="account-box is-form is-footerless">
        <form wire:submit.prevent="{{ $submit }}">
            <div class="form-head stuck-header">
                <div class="form-head-inner">
                    <div class="left">
                        <h3>{{ $title }}</h3>
                    </div>
                    <div class="right">
                        <div class="buttons">
                            @if (isset($actions))
                                {{ $actions }}
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-body">
                {{ $form }}
            </div>
        </form>
    </div>
</div>
