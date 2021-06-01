<div class="page-content-inner {{ !$question->active ? 'is-hidden' : null }}">
    <div class="list-view list-view-v3">
        <div id="active-items-tab" class="tab-content is-active">
            <div class="list-view-inner">
                <div class="list-view-item">
                    <div class="list-view-item-inner">
                        <div class="meta-left">
                            <h3 class="m-b-50" style="width: 70%">{{ $question->question }}</h3>
                            <span>
                                <i class="fas fa-user"></i>
                                <span data-filter-match>{{ $question->full_name }}</span>
                                <i class="fas fa-circle icon-separator"></i>
                                <i class="far fa-envelope"></i>
                                <a href="mailto:{{ $question->email }}" data-filter-match>{{ $question->email }}</a>
                                <i class="fas fa-circle icon-separator"></i>
                                <i class="fas fa-phone-alt"></i>
                                <a href="tel:{{ $question->phone_number }}" data-filter-match>{{ $question->phone_number ?? 'unknown' }}</a>
                                <i class="fas fa-circle icon-separator"></i>
                                <i data-feather="clock"></i>
                                <span data-filter-match>{{ $question->created_at }}</span>
                            </span>
                        </div>
                        <div style="width: 30%" class="meta-right">
                            <div class="buttons">
                                <button wire:click="$toggle('answering')" class="button h-button is-primary is-outlined is-raised">
                                    {{ $answering ? 'Hide' : 'Answer' }}
                                </button>
                                <button wire:click="destroy" class="alertify-modal button h-button is-primary is-danger">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    @if($answering)
                    <div class="m-t-50">
                        <form method="POST" wire:submit.prevent="submit">
                            <x-inputs.textarea for="answer" name="answer" rows="4">
                                <x-slot name="title">{{ __('Leave your answer') }}</x-slot>
                            </x-inputs.textarea>

                            <div class="has-text-right">
                                <button type="submit" class="alertify-modal button h-button is-success is-success">
                                    {{ __('Send answer') }}
                                </button>
                            </div>
                        </form>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
