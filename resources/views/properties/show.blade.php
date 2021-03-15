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

                <div class="tabs-inner">
                    <div class="tabs">
                        <ul>
                            <li data-tab="active-items-tab" class="is-active"><a><span>Active</span></a></li>
                            <li data-tab="inactive-items-tab"><a><span>Inactive</span></a></li>
                            <li class="tab-naver"></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="page-content-inner is-webapp">

                <!--List-->
                <div class="list-view list-view-v2">

                    <!--List Empty Search Placeholder -->
                    <div class="page-placeholder custom-text-filter-placeholder is-hidden">
                        <div class="placeholder-content">
                            <img class="light-image" src="assets/img/illustrations/placeholders/search-2.svg" alt=""/>
                            <img class="dark-image" src="assets/img/illustrations/placeholders/search-2-dark.svg"
                                 alt=""/>
                            <h3>We couldn't find any matching results.</h3>
                            <p class="is-larger">Too bad. Looks like we couldn't find any matching results for the
                                search terms you've entered. Please try different search terms or criteria.</p>
                        </div>
                    </div>

                    <!--Active Tab-->
                    <div id="active-items-tab" class="tab-content is-active">
                        <div class="list-view-inner">
                            @foreach($property->rooms as $room)
                            <!--List Item-->
                                <div class="list-view-item">
                                    <div class="list-view-item-inner">
                                        <img src="{{ asset('https://images.pexels.com/photos/584399/living-room-couch-interior-room-584399.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500') }}" alt="">
                                        <div class="meta-left">
                                            <h3>
                                                <span data-filter-match>{{ $room->name }}</span>
                                                <span class="rating">
                                                    <i class="fas fa-star active"></i>
                                                    <i class="fas fa-star active"></i>
                                                    <i class="fas fa-star active"></i>
                                                    <i class="fas fa-star active"></i>
                                                    <i class="fas fa-star"></i>
                                                </span>
                                            </h3>
                                            <p>
                                                <i data-feather="map-pin"></i>
                                                <span data-filter-match>{{ $property->address }}</span>
                                            </p>
                                            <span>
                                                <span data-filter-match>{{ __('Max ')  . $room->capacity . __(' pers.') }}</span>
                                                <i class="fas fa-circle icon-separator"></i>
                                                <span data-filter-match>3 beds</span>
                                                <i class="fas fa-circle icon-separator"></i>
                                                <span data-filter-match>1 bathroom</span>
                                                </span>

                                            <div class="icon-list">
                                                <span>
                                                        <i class="lnil lnil-car"></i>
                                                        <span data-filter-match>Parking</span>
                                                </span>
                                                <span>
                                                        <i class="lnil lnil-signal"></i>
                                                        <span data-filter-match>Wifi</span>
                                                </span>
                                                <span>
                                                        <i class="lnil lnil-air-flow"></i>
                                                        <span data-filter-match>Heater</span>
                                                </span>
                                                <span>
                                                        <i class="lnil lnil-sun"></i>
                                                        <span data-filter-match>Cleaning</span>
                                                </span>
                                                <span>
                                                        <i class="lnil lnil-more"></i>
                                                        <span>3 more</span>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="meta-right">
                                            <div class="buttons">
                                                <a class="button h-button is-light">More Info</a>
                                                <a href="{{ route('rooms.edit', $room) }}" class="button h-button is-primary is-raised">{{ __('Settings') }}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!--Inactive Tab-->
                    <div id="inactive-items-tab" class="tab-content">
                        <div class="list-view-inner">

                            <!--Empty placeholder-->
                            <div class="page-placeholder custom-text-filter-placeholder">
                                <div class="placeholder-content">
                                    <img class="light-image" src="{{ asset('assets/img/illustrations/placeholders/having-coffee.svg') }}" alt="" />
                                    <img class="dark-image" src="{{ asset('assets/img/illustrations/placeholders/having-coffee-dark.svg') }}" alt="" />
                                    <h3>There are no inactive properties.</h3>
                                    <p class="is-larger">Looks like there are no inactive properties to display. You can
                                        disable and also enable a property from the property settings.</p>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection


