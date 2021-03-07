<div class="tabs-wrapper is-squared">
    <div class="tabs-inner">
        <div class="tabs">
            <ul class="form-tabs">
                @foreach($tabs as $key => $tab)
                    <li data-tab="role-tab-{{ $tab['key'] }}" @if($key == 0) class="is-active" @endif>
                        <a onclick="localStorage.setItem('selectedTab', 'role-tab-{{ $tab['key'] }}')"><span>{{ __($tab['name']) }}</span></a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    @foreach($tabs as $key => $tab)
        <div id="role-tab-{{ $tab['key'] }}" class="form-tab-content tab-content @if($key == 0) is-active @endif">
            @if (isset(${$tab['key']}))
                {{ ${$tab['key']} }}
            @endif
        </div>
    @endforeach
</div>
