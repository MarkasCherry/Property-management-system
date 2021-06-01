<div class="toolbar ml-auto">
    @if(\App\Models\Question::active()->exists())
        <a href="{{ route('questions.index') }}">
            <div class="toolbar-notifications is-hidden-mobile">
                <div class="dropdown is-spaced is-dots is-right">
                    <div class="is-trigger" aria-haspopup="true">
                        <div class="tag is-rounded is-danger m-r-20">
                            <i class="fas fa-envelope-open-text"></i> {{ \App\Models\Question::active()->count() }}
                        </div>
                        <span class="new-indicator pulsate"></span>
                    </div>
                </div>
            </div>
        </a>
    @else
        <a href="{{ route('questions.index') }}">
            <div class="toolbar-notifications is-hidden-mobile">
                <div class="dropdown is-spaced is-dots is-right">
                    <div class="is-trigger" aria-haspopup="true">
                        <i class="far fa-envelope"></i>
                    </div>
                </div>
            </div>
        </a>
    @endif
</div>
