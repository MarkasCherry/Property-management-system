<div class="control has-icons-left">
    <div class="h-select">
        <div class="select-box">
            <span>
                {{ __('Show / Hide Columns') }}
            </span>
        </div>
        <div class="select-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
        </div>
        <div class="select-drop has-slimscroll-sm">
            <div class="drop-inner">
                @foreach($this->columns as $index => $column)
                    <div class="option-row" wire:click="toggle({{$index}})">
                        <div class="option-meta">
                            <span>{{ $column['label'] }}</span>
                            <span style="margin-left: auto ;">
                                @if($column['hidden'])
                                    <x-icons.x-circle class="h-3 w-3 stroke-current text-gray-400" />
                                @else
                                    <x-icons.check-circle class="h-3 w-3 stroke-current text-green-500" />
                                @endif
                            </span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!--<div class="icon is-small is-left">
        <i class="lnil lnil-menu-circle"></i>
    </div>-->
</div>
