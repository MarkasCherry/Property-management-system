<div class="toolbar ml-auto">
    @if(true)
        <a >
            <div class="toolbar-notifications is-hidden-mobile">
                <div class="dropdown is-spaced is-dots is-right">
                    <div class="is-trigger" aria-haspopup="true">
                        <i class="far fa-envelope"></i>
                    </div>
                </div>
            </div>
        </a>
    @else
    <a >
        <div class="toolbar-notifications is-hidden-mobile">
            <div class="dropdown is-spaced is-dots is-right">
                <div class="is-trigger" aria-haspopup="true">
                    <div class="tag is-rounded is-danger m-r-20">
                        <i class="fas fa-envelope-open-text"></i> 23
                    </div>
                    <span class="new-indicator pulsate"></span>
                </div>
            </div>
        </div>
    </a>
    @endif

</div>
