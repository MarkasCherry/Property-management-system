@extends('layouts.app')

@section('content')
    <div class="page-content-wrapper">
        <div class="page-content is-relative">

            <div class="page-title has-text-centered is-webapp">

                <div class="title-wrap">
                    <h1 class="title is-4">List View</h1>
                </div>

                <div class="toolbar ml-auto">

                    <div class="toolbar-link">
                        <label class="dark-mode ml-auto">
                            <input type="checkbox" checked>
                            <span></span>
                        </label>
                    </div>

                    <a class="toolbar-link right-panel-trigger" data-panel="languages-panel">
                        <img src="assets/img/icons/flags/united-states-of-america.svg" alt="">
                    </a>

                    <div class="toolbar-notifications is-hidden-mobile">
                        <div class="dropdown is-spaced is-dots is-right dropdown-trigger">
                            <div class="is-trigger" aria-haspopup="true">
                                <i data-feather="bell"></i>
                                <span class="new-indicator pulsate"></span>
                            </div>
                            <div class="dropdown-menu" role="menu">
                                <div class="dropdown-content">
                                    <div class="heading">
                                        <div class="heading-left">
                                            <h6 class="heading-title">Notifications</h6>
                                        </div>
                                        <div class="heading-right">
                                            <a class="notification-link" href="/admin-profile-notifications.html">See
                                                all</a>
                                        </div>
                                    </div>
                                    <ul class="notification-list">
                                        <li>
                                            <a class="notification-item">
                                                <div class="img-left">
                                                    <img class="user-photo" alt=""
                                                         src="https://via.placeholder.com/150x150"
                                                         data-demo-src="assets/img/avatars/photos/7.jpg"/>
                                                </div>
                                                <div class="user-content">
                                                    <p class="user-info"><span class="name">Alice C.</span> left a
                                                        comment.</p>
                                                    <p class="time">1 hour ago</p>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="notification-item">
                                                <div class="img-left">
                                                    <img class="user-photo" alt=""
                                                         src="https://via.placeholder.com/150x150"
                                                         data-demo-src="assets/img/avatars/photos/12.jpg"/>
                                                </div>
                                                <div class="user-content">
                                                    <p class="user-info"><span class="name">Joshua S.</span> uploaded a
                                                        file.</p>
                                                    <p class="time">2 hours ago</p>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="notification-item">
                                                <div class="img-left">
                                                    <img class="user-photo" alt=""
                                                         src="https://via.placeholder.com/150x150"
                                                         data-demo-src="assets/img/avatars/photos/13.jpg"/>
                                                </div>
                                                <div class="user-content">
                                                    <p class="user-info"><span class="name">Tara S.</span> sent you a
                                                        message.</p>
                                                    <p class="time">2 hours ago</p>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="notification-item">
                                                <div class="img-left">
                                                    <img class="user-photo" alt=""
                                                         src="https://via.placeholder.com/150x150"
                                                         data-demo-src="assets/img/avatars/photos/25.jpg"/>
                                                </div>
                                                <div class="user-content">
                                                    <p class="user-info"><span class="name">Melany W.</span> left a
                                                        comment.</p>
                                                    <p class="time">3 hours ago</p>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>


                    <a class="toolbar-link right-panel-trigger" data-panel="activity-panel">
                        <i data-feather="grid"></i>
                    </a>
                </div>
            </div>

            <div class="list-view-toolbar">
                <div class="control has-icon">
                    <input class="input custom-text-filter" placeholder="Search..."
                           data-filter-target=".list-view-item">
                    <div class="form-icon">
                        <i data-feather="search"></i>
                    </div>
                </div>

                <div class="list-info">
                    <span>55 records found</span>
                </div>

                <div class="buttons">
                    <button class="button h-button is-primary is-elevated">
                                <span class="icon">
                                        <i class="fas fa-check"></i>
                                    </span>
                        <span>Approve</span>
                    </button>
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

                    @foreach($bookings as $booking)
                        <!--Item-->
                            <div class="list-view-item">
                                <div class="list-view-item-inner">
                                    <div class="h-avatar is-large">
                                        <img class="avatar"
                                             src="https://lh3.googleusercontent.com/proxy/SVEyllRVJDTZQpWrFdvEORhS9VpING4VN4YF2ePjINGHr1i7LgKjKq_RPTFthVlktYF8btHLMO2Rs8KAjMPgPjhIiKkCwrCeDoH1R8zReMuqeH65KCuCxrw"
                                             alt="" data-user-popover="9">
                                    </div>
                                    <div class="meta-left">
                                        <h3 data-filter-match>{{ $booking->client->getFullName() }}</h3>
                                        <span>
                                            <i data-feather="check"></i>
                                            <span data-filter-match>{{ $booking->code }}</span>
                                        </span>
                                    </div>
                                    <div class="meta-right">
                                        <span class="tag is-rounded is-elevated m-r-50" style="background-color: {{ $booking->status->color }};"
                                              data-filter-match>{{ $booking->status->name }}
                                        </span>
                                        <div class="stats">
                                            <div class="stat m-l-20 m-r-20">
                                                <span style="font-size: 14px">{{ $booking->booked_from }}</span>
                                                <span>{{ __('Booked from') }}</span>
                                            </div>
                                            <div class="separator"></div>
                                            <div class="stat m-l-20 m-r-20">
                                                <span style="font-size: 14px" >{{ $booking->booked_to }}</span>
                                                <span>{{ __('Booked to') }}</span>
                                            </div>
                                            <div class="separator"></div>
                                            <div class="stat m-l-20 m-r-20">
                                                <span style="font-size: 14px" >£{{ $booking->deposit_paid }}</span>
                                                <span>{{ __('Deposit paid') }}</span>
                                            </div>
                                            <div class="separator"></div>
                                            <div class="stat m-l-20 m-r-20">
                                                <span style="font-size: 14px">£{{ $booking->price }}</span>
                                                <span>{{ __('Price') }}</span>
                                            </div>
                                        </div>

                                        <!--Dropdown-->
                                        <div class="dropdown is-spaced is-dots is-right dropdown-trigger">
                                            <div class="is-trigger" aria-haspopup="true">
                                                <i data-feather="more-vertical"></i>
                                            </div>
                                            <div class="dropdown-menu" role="menu">
                                                <div class="dropdown-content">
                                                    <a href="#" class="dropdown-item is-media">
                                                        <div class="icon">
                                                            <i class="lnil lnil-user-alt"></i>
                                                        </div>
                                                        <div class="meta">
                                                            <span>Profile</span>
                                                            <span>View profile</span>
                                                        </div>
                                                    </a>
                                                    <a href="#" class="dropdown-item is-media">
                                                        <div class="icon">
                                                            <i class="lnil lnil-bubble"></i>
                                                        </div>
                                                        <div class="meta">
                                                            <span>Message</span>
                                                            <span>Send Message</span>
                                                        </div>
                                                    </a>
                                                    <a href="#" class="dropdown-item is-media">
                                                        <div class="icon">
                                                            <i class="lnil lnil-travel"></i>
                                                        </div>
                                                        <div class="meta">
                                                            <span>Transfer</span>
                                                            <span>Transfer to other list</span>
                                                        </div>
                                                    </a>
                                                    <hr class="dropdown-divider">
                                                    <a href="#" class="dropdown-item is-media">
                                                        <div class="icon">
                                                            <i class="lnil lnil-trash"></i>
                                                        </div>
                                                        <div class="meta">
                                                            <span>Remove</span>
                                                            <span>Remove from list</span>
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
            </div>
        </div>
    </div>
@endsection
