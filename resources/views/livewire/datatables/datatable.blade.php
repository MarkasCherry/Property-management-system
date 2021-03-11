<div>
    @if($beforeTableSlot)
        <div class="mt-8">
            @include($beforeTableSlot)
        </div>
    @endif
    <div class="datatable-toolbar is-webapp">
        @if($this->searchableColumns()->count())
            <div class="field">
                <div class="control has-icon">
                    <input wire:model.debounce.500ms="search"
                           class="input search-input"
                           placeholder="Search in {{ $this->searchableColumns()->map->label->join(', ') }}"/>
                    <div class="form-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                    </div>
                </div>
            </div>
        @endif
        <div class="buttons">
            <x-icons.cog wire:loading class="h-9 w-9 animate-spin text-gray-400"/>

            <div class="field has-addons">
                @if($exportable)
                    <div class="control"
                         x-data="{ init() {
                         window.livewire.on('startDownload', link => window.open(link,'_blank'))
                         } }" x-init="init">
                        <button class="button h-button" wire:click="export">
                            <span class="icon is-small">
                                <i class="fas fa-file-excel"></i>
                            </span>
                            <span>{{ __('Export') }}</span>
                        </button>
                    </div>
                @endif
                    @if($hideable === 'select')
                        @include('datatables::hide-column-multiselect')
                    @endif
                    @if($hideable === 'buttons')
                        @foreach($this->columns as $index => $column)
                            <div class="control">
                                <button wire:click.prefetch="toggle('{{ $index }}')" class="button h-button">
                                    <span class="icon is-small">
                                        @if($column['hidden'])
                                            <i class="fas fa-check-circle"></i>
                                        @else
                                            <i class="fas fa-times-circle"></i>
                                        @endif
                                    </span>
                                    <span>{{ $column['label'] }}</span>
                                </button>
                            </div>
                        @endforeach
                    @endif
            </div>
        </div>
    </div>
    <div class="table-wrapper" data-simplebar="init">
        <div class="simplebar-wrapper" style="margin: 0px;">
            <div class="simplebar-height-auto-observer-wrapper">
                <div class="simplebar-height-auto-observer">
                </div>
            </div>
            <div class="simplebar-mask">
                <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                    <div class="simplebar-content-wrapper" style="height: auto; overflow: hidden;">
                        <div class="simplebar-content" style="padding: 0px;">
                            <table id="empty-datatable" class="table is-datatable is-hoverable table-is-bordered">
                                @unless($this->hideHeader)
                                    <thead>
                                        <tr>
                                            @foreach($this->columns as $index => $column)
                                                @if($hideable === 'inline')
                                                    @include('datatables::header-inline-hide', ['column' => $column, 'sort' => $sort])
                                                @elseif($column['type'] === 'checkbox')
                                                    <div class="relative table-cell h-12 w-48 overflow-hidden align-top px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider flex items-center focus:outline-none">
                                                        <div class="px-3 py-1 rounded @if(count($selected)) bg-orange-400 @else bg-gray-200 @endif text-white text-center">
                                                            {{ count($selected) }}
                                                        </div>
                                                    </div>
                                                @else
                                                    @include('datatables::header-no-hide', ['column' => $column, 'sort' => $sort])
                                                @endif
                                            @endforeach
                                            <!--<th>
                                                <div class="control">
                                                    <label class="checkbox is-primary is-outlined is-circle">
                                                        <input type="checkbox">
                                                        <span></span>
                                                    </label>
                                                </div>
                                            </th>
                                            <th>Type</th>
                                            <th>Name</th>
                                            <th class="has-text-centered sorting" data-sort="size">Size</th>
                                            <th class="has-text-centered sorting" data-sort="version">Version</th>
                                            <th>Last Updated</th>
                                            <th></th>-->
                                        </tr>
                                        <tr class="datatable-filter-line">
                                            @foreach($this->columns as $index => $column)
                                                @if($column['hidden'])
                                                    @if($hideable === 'inline')
                                                    @endif
                                                @else
                                                    <td class="datatable-filter-cell">
                                                        @if($column['type'] === 'checkbox')
                                                            <div
                                                                class="w-32 overflow-hidden align-top bg-blue-100 px-6 py-5 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider flex h-full flex-col items-center space-y-2 focus:outline-none">
                                                                <div>SELECT ALL</div>
                                                                <div>
                                                                    <input type="checkbox" wire:click="toggleSelectAll"
                                                                           @if(count($selected) === $this->results->total()) checked
                                                                           @endif class="form-checkbox mt-1 h-4 w-4 text-blue-600 transition duration-150 ease-in-out"/>
                                                                </div>
                                                            </div>
                                                        @else
                                                            @isset($column['filterable'])
                                                                @if( is_iterable($column['filterable']) )
                                                                    <div wire:key="{{ $index }}">
                                                                        @include('datatables::filters.select', ['index' => $index, 'name' => $column['label'], 'options' => $column['filterable']])
                                                                    </div>
                                                                @else
                                                                    <div wire:key="{{ $index }}">
                                                                        @include('datatables::filters.' . ($column['filterView'] ?? $column['type']), ['index' => $index, 'name' => $column['label']])
                                                                    </div>
                                                                @endif
                                                            @endisset
                                                        @endif
                                                    </td>
                                                @endif
                                            @endforeach
                                            <!--<td></td>
                                            <td></td>
                                            <td class="datatable-filter-cell">
                                                <div class="control has-icon">
                                                    <input type="text" placeholder="Type to Filter... " class="datatable-filter datatable-input-text input" data-filter="name">
                                                    <div class="form-icon">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                                                    </div>
                                                </div>
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>-->
                                        </tr>
                                    </thead>
                                @endif
                                @if(count($this->results) > 0)
                                    <tbody>
                                        @foreach($this->results as $result)
                                            <tr>
                                                @foreach($this->columns as $column)
                                                    @if($column['hidden'])
                                                        @if($hideable === 'inline')
                                                        @endif
                                                    @else
                                                        @if($column['type'] === 'checkbox')
                                                            <td>
                                                                @include('datatables::checkbox', ['value' => $result->checkbox_attribute])
                                                            </td>
                                                        @else
                                                            <td align="{{ $column['align'] }}">
                                                                {!! $result->{$column['name']} !!}
                                                            </td>
                                                        @endif
                                                    @endif
                                                @endforeach
                                            </tr>
                                        @endforeach
                                    </tbody>
                                @endif
                            </table>
                            @if(count($this->results) == 0)
                                <div class="section-placeholder">
                                    <div class="placeholder-content">
                                        <img class="light-image" src="{{ asset('assets/img/illustrations/placeholders/search-4.svg') }}" alt="">
                                        <img class="dark-image" src="{{ asset('assets/img/illustrations/placeholders/search-4-dark.svg') }}" alt="">
                                        <h3 class="dark-inverted">{{ __('No data to show') }}</h3>
                                        <p>{{ __('There is currently no data to show in this list.') }}</p>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="simplebar-placeholder" style="width: 1298px; height: 522px;">
            </div>
        </div>
        <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
            <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
        </div>
        <div class="simplebar-track simplebar-vertical" style="visibility: hidden;">
            <div class="simplebar-scrollbar" style="height: 0px; display: none;">
            </div>
        </div>
    </div>
    @unless($this->hidePagination)
        <div id="paging-first-datatable" class="pagination datatable-pagination pagination-datatables text-center">
            <div class="datatable-info">
                <div class="control">
                    <div class="select">
                        <select
                            class="datatable-filter datatable-select form-control"
                            name="perPage"
                            wire:model="perPage"
                        >
                            {{-- todo remove first option --}}
                            <option value="1">1</option>
                            <option value="10">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                            <option value="99999999">All</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="datatable-info">
                <span>
                    Results {{ $this->results->firstItem() }} - {{ $this->results->lastItem() }} of
                            {{ $this->results->total() }}
                </span>
            </div>
            <div class="lg:hidden">
                <span class="space-x-2">{{ $this->results->links('datatables::tailwind-simple-pagination') }}</span>
            </div>
            <div class="hidden lg:block">
                <span>{{ $this->results->links('datatables::tailwind-pagination') }}</span>
            </div>
        </div>
    @endif
    @if($afterTableSlot)
        <div class="mt-8">
            @include($afterTableSlot)
        </div>
    @endif
</div>
