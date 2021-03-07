<div class="page-content-wrapper">
    <div class="page-content is-relative">
        <div class="page-content-inner">
            <div class="account-wrapper">
                <div class="columns">
                    <div class="column is-12">
                        @if ($attributes->get('action'))
                        <form method="POST" action="{{ $attributes->get('action') }}">
                            @csrf

                            @if ($attributes->get('method') && $attributes->get('method') !== 'POST')
                                @method($attributes->get('method'))
                            @endif
                        @endif
                            <div class="form-layout">
                                <div class="form-outer">
                                    <div class="form-header">
                                        <div class="form-header-inner">
                                            <div class="left">
                                                @if (!isset($headerLeft))
                                                    <h3>{{ __($attributes->get('headerTitle') ?? 'Form title') }}</h3>
                                                @else
                                                    {{ $headerLeft }}
                                                @endif

                                            </div>
                                            <div class="right">
                                                <div class="buttons">
                                                    @if (!isset($headerRight))
                                                        <a href="{{ $attributes->get('redirect') ?? url()->previous() }}"
                                                           class="button h-button is-light is-dark-outlined">
                                                                    <span class="icon">
                                                                        <i class="lnir lnir-arrow-left rem-100"></i>
                                                                    </span>
                                                            <span>{{ __('Go back') }}</span>
                                                        </a>
                                                    @else
                                                        {{ $headerRight }}
                                                    @endif
                                                    @if ($attributes->get('action'))
                                                        <button id="save-button"
                                                                class="button h-button is-primary is-raised">
                                                            {{ __($attributes->get('saveText') ?? 'Create') }}
                                                        </button>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    @if(session('success'))
                                        <div class="message is-success m-l-40 m-r-40">
                                            <a onclick="$('div.message').hide()" class="delete"></a>
                                            <div class="message-body">
                                                {{ session('success') }}
                                            </div>
                                        </div>
                                    @endif

                                    <div class="form-body">
                                        {{ $slot }}
                                    </div>
                                </div>
                            </div>
                        @if($attributes->get('action'))
                        </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
