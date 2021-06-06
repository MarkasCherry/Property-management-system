@extends('layouts.app')

@section('content')
    <div class="page-content-wrapper">
        <div class="page-content is-relative">
            <div class="list-view-toolbar">
                <div class="control has-icon">
                    <input class="input custom-text-filter" placeholder="Search..."
                           data-filter-target=".list-view-item">
                    <div class="form-icon">
                        <i data-feather="search"></i>
                    </div>
                </div>

                <div class="list-info">
                    <span>{{ ($bookings->count() + $todayBookings->count()) . __(' Bookings found') }}</span>
                </div>

                <div class="buttons">
                    <a href="{{ route('bookings.create') }}" class="button h-button is-primary is-elevated">
                                <span class="icon">
                                        <i class="fas fa-plus"></i>
                                    </span>
                        <span>{{ __('Add booking') }}</span>
                    </a>
                </div>
            </div>

            <div class="page-content-inner">

                <!--List-->
                <div class="list-view list-view-v1">

                    <!--List Empty Search Placeholder -->
                    <div class="page-placeholder custom-text-filter-placeholder is-hidden">
                        <div class="placeholder-content">
                            <img class="light-image" src="assets/img/illustrations/placeholders/search-1.svg" alt=""/>
                            <img class="dark-image" src="assets/img/illustrations/placeholders/search-1.svg" alt=""/>
                            <h3>We couldn't find any matching results.</h3>
                            <p class="is-larger">Too bad. Looks like we couldn't find any matching results for the
                                search terms you've entered. Please try different search terms or criteria.</p>
                        </div>
                    </div>

                    <div class="list-view-inner">
                    @if(!empty($todayBookings))
                        <div style="border: 1px solid orangered; border-radius: 10px; padding: 20px;" class="m-b-20">
                        @foreach($todayBookings as $booking)
                            <!--Item-->
                            <div class="list-view-item">
                                <div class="list-view-item-inner">
                                    <div class="meta-left">
                                        <h3 data-filter-match>{{ $booking->client->fullName }}</h3>
                                    </div>
                                    <span class="tag is-rounded is-elevated m-r-50" style="background-color: {{ $booking->status->color }};"
                                          data-filter-match>{{ $booking->status->name }}
                                    </span>
                                    <div class="meta-right">
                                        <div class="stats">
                                            <div class="separator"></div>
                                            <div class="stat m-l-20 m-r-20">
                                                <span style="font-size: 14px">{{ Carbon\Carbon::parse($booking->booked_from)->format('Y-m-d') }}</span>
                                                <span>{{ __('Booked from') }}</span>
                                            </div>
                                            <div class="separator"></div>
                                            <div class="stat m-l-20 m-r-20">
                                                <span style="font-size: 14px" >{{ Carbon\Carbon::parse($booking->booked_to)->format('Y-m-d') }}</span>
                                                <span>{{ __('Booked to') }}</span>
                                            </div>
                                            <div class="separator"></div>
                                            <div class="stat m-l-20 m-r-20">
                                                <span style="font-size: 14px" >{{ \App\Tools::displayPrice($booking->deposit_paid) }}</span>
                                                <span>{{ __('Deposit paid') }}</span>
                                            </div>
                                            <div class="separator"></div>
                                            <div class="stat m-l-20 m-r-20">
                                                <span style="font-size: 14px">{{ \App\Tools::displayPrice($booking->price) }}</span>
                                                <span>{{ __('Total Price') }}</span>
                                            </div>
                                            <div class="separator"></div>
                                            <div class="stat m-l-20 m-r-20">
                                                <span data-filter-match style="font-size: 14px" >{{ $booking->breakfast_needed ? 'Yes' : 'No' }}</span>
                                                <span>{{ __('Breakfast needed?') }}</span>
                                            </div>
                                            <div class="separator"></div>
                                            <div class="stat m-l-20 m-r-20">
                                                <span data-filter-match style="font-size: 14px" >{{ $booking->guest_no }}</span>
                                                <span>{{ __('Number of Guests') }}</span>
                                            </div>
                                        </div>

                                        <!--Dropdown-->
                                        <div class="dropdown is-spaced is-dots is-right dropdown-trigger">
                                            <div class="is-trigger" aria-haspopup="true">
                                                <i data-feather="more-vertical"></i>
                                            </div>
                                            <div class="dropdown-menu" role="menu">
                                                <div class="dropdown-content">
                                                    <a href="{{ route('clients.edit', $booking->client) }}" class="dropdown-item is-media">
                                                        <div class="icon">
                                                            <i class="lnil lnil-user-alt"></i>
                                                        </div>
                                                        <div class="meta">
                                                            <span>Client</span>
                                                            <span>View client profile</span>
                                                        </div>
                                                    </a>
                                                    <hr class="dropdown-divider">
                                                    <a href="{{ route('bookings.edit', $booking) }}" class="dropdown-item is-media">
                                                        <div class="icon">
                                                            <i class="far fa-edit"></i>
                                                        </div>
                                                        <div class="meta">
                                                            <span>Edit</span>
                                                            <span>Edit this booking</span>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                            <span class="tag is-danger">{{ __('BOOKINGS OF TODAY') }}</span>
                        </div>
                    @endif

                    @foreach($bookings as $booking)
                        <!--Item-->
                            <div class="list-view-item">
                                <div class="list-view-item-inner">
                                    <div class="meta-left">
                                        <h3 data-filter-match>{{ $booking->client->fullName }}</h3>
                                    </div>
                                    <span class="tag is-rounded is-elevated m-r-50" style="background-color: {{ $booking->status->color }};"
                                          data-filter-match>{{ $booking->status->name }}
                                    </span>
                                    <div class="meta-right">
                                        <div class="stats">
                                            <div class="separator"></div>
                                            <div class="stat m-l-20 m-r-20">
                                                <span style="font-size: 14px">{{ Carbon\Carbon::parse($booking->booked_from)->format('Y-m-d') }}</span>
                                                <span>{{ __('Booked from') }}</span>
                                            </div>
                                            <div class="separator"></div>
                                            <div class="stat m-l-20 m-r-20">
                                                <span style="font-size: 14px" >{{ Carbon\Carbon::parse($booking->booked_to)->format('Y-m-d') }}</span>
                                                <span>{{ __('Booked to') }}</span>
                                            </div>
                                            <div class="separator"></div>
                                            <div class="stat m-l-20 m-r-20">
                                                <span style="font-size: 14px" >{{ \App\Tools::displayPrice($booking->deposit_paid) }}</span>
                                                <span>{{ __('Deposit paid') }}</span>
                                            </div>
                                            <div class="separator"></div>
                                            <div class="stat m-l-20 m-r-20">
                                                <span style="font-size: 14px">{{ \App\Tools::displayPrice($booking->price) }}</span>
                                                <span>{{ __('Total Price') }}</span>
                                            </div>
                                            <div class="separator"></div>
                                            <div class="stat m-l-20 m-r-20">
                                                <span data-filter-match style="font-size: 14px" >{{ $booking->breakfast_needed ? 'Yes' : 'No' }}</span>
                                                <span>{{ __('Breakfast needed?') }}</span>
                                            </div>
                                            <div class="separator"></div>
                                            <div class="stat m-l-20 m-r-20">
                                                <span data-filter-match style="font-size: 14px" >{{ $booking->guest_no }}</span>
                                                <span>{{ __('Number of Guests') }}</span>
                                            </div>
                                        </div>

                                        <!--Dropdown-->
                                        <div class="dropdown is-spaced is-dots is-right dropdown-trigger">
                                            <div class="is-trigger" aria-haspopup="true">
                                                <i data-feather="more-vertical"></i>
                                            </div>
                                            <div class="dropdown-menu" role="menu">
                                                <div class="dropdown-content">
                                                    <a href="{{ route('clients.edit', $booking->client) }}" class="dropdown-item is-media">
                                                        <div class="icon">
                                                            <i class="lnil lnil-user-alt"></i>
                                                        </div>
                                                        <div class="meta">
                                                            <span>Client</span>
                                                            <span>View client profile</span>
                                                        </div>
                                                    </a>
                                                    <hr class="dropdown-divider">
                                                    <a href="{{ route('bookings.edit', $booking) }}" class="dropdown-item is-media">
                                                        <div class="icon">
                                                            <i class="far fa-edit"></i>
                                                        </div>
                                                        <div class="meta">
                                                            <span>Edit</span>
                                                            <span>Edit this booking</span>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                {{ $bookings->onEachSide(1)->links('vendor.pagination.default') }}

            </div>
        </div>
    </div>
@endsection
