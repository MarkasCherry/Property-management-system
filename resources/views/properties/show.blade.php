@extends('layouts.app')

@section('content')
    <div class="page-content-wrapper">
        <div class="page-content is-relative tabs-wrapper is-slider is-squared is-inverted">

            <div class="list-view-toolbar is-webapp">
                <div class="control has-icon">
                    <input class="input custom-text-filter" placeholder="Search..."
                           data-filter-target=".list-view-item">
                    <div class="form-icon">
                        <i data-feather="search"></i>
                    </div>
                </div>

                <div class="list-info">
                    <span>{{ $property->rooms->count() . __(' rooms') }} </span>
                </div>

                <div class="buttons">
                    <a href="{{ route('properties.index') }}" class="button h-button is-light is-dark-outlined">
                        <span class="icon">
                            <i class="lnir lnir-arrow-left rem-100"></i>
                        </span>
                        <span>{{ __('Go back') }}</span>
                    </a>

                    <a href="{{ route('properties.addRoom', $property) }}" class="button h-button is-primary is-raised">
                        <span class="icon">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span>{{ __('Add Room') }}</span>
                    </a>
                </div>
            </div>

            <div class="page-content-inner is-webapp">

                <!--List-->
                <div class="list-view list-view-v2">

                    <!--List Empty Search Placeholder -->
                    <div class="page-placeholder custom-text-filter-placeholder is-hidden">
                        <div class="placeholder-content">
                            <img class="light-image" src="{{ asset('assets/img/illustrations/placeholders/search-2.svg') }}" alt="{{ __('not-found') }}"/>
                            <img class="dark-image" src="{{ asset('assets/img/illustrations/placeholders/search-2-dark.svg') }}"
                                 alt=""/>
                            <h3>We couldn't find any matching results.</h3>
                            <p class="is-larger">{{ __('Too bad. Looks like we couldn\'t find any matching results for the search terms you\'ve entered. Please try different search terms or criteria.') }}</p>
                        </div>
                    </div>

                    <div id="active-items-tab" class="tab-content is-active">
                        <div class="list-view-inner">
                            @forelse($property->rooms as $room)
                                <div class="list-view-item">
                                    <div class="list-view-item-inner">
                                        <img style="max-height: unset" src="{{ asset('https://images.pexels.com/photos/584399/living-room-couch-interior-room-584399.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500') }}" alt="">
                                        <div class="meta-left">
                                            <h3>
                                                <span data-filter-match>{{ $room->name }}</span>
                                            </h3>
                                            <h4 class="p-t-5">
                                                <span data-filter-match>{{ __('Room number') }}: <b>{{ $room->room_number }}</b></span>
                                            </h4>
                                            <p class="p-t-5 columns">
                                                <span class="column is-10" data-filter-match>{{ $room->short_description }}</span>
                                            </p>
                                            <span>
                                                <span data-filter-match>{{ __('Max ')  . $room->capacity . __(' pers.') }}</span>
                                                <i class="fas fa-circle icon-separator"></i>
                                                <span data-filter-match>{{ $room->bed_count . __(' beds') }}</span>
                                                <i class="fas fa-circle icon-separator"></i>
                                                <span data-filter-match>{{ $room->bathroom_count . __(' bathroom') }}</span>
                                            </span>

                                        </div>
                                        <div class="meta-right">
                                            <div class="buttons">
                                                <a href="{{ route('rooms.edit', $room) }}" class="button h-button is-primary is-raised">{{ __('Settings') }}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <!--No results returned -->
                                <div class="page-placeholder custom-text-filter-placeholder">
                                    <div class="placeholder-content">
                                        <img class="light-image" src="{{ asset('assets/img/illustrations/placeholders/search-3.svg') }}" alt=""/>
                                        <img class="dark-image" src="{{ asset('assets/img/illustrations/placeholders/search-3-dark.svg') }}" alt=""/>
                                        <h3>{{ __("No rooms found") }}</h3>
                                        <p class="is-larger">{{ __('We were not able to find any rooms. You can always add them by clicking "+add room"
                                            in the top right corner.') }}</p>
                                    </div>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


