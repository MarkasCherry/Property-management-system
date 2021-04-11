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
                                            <a class="notification-link" href="/admin-profile-notifications.html">See all</a>
                                        </div>
                                    </div>
                                    <ul class="notification-list">
                                        <li>
                                            <a class="notification-item">
                                                <div class="img-left">
                                                    <img class="user-photo" alt="" src="https://via.placeholder.com/150x150" data-demo-src="assets/img/avatars/photos/7.jpg" />
                                                </div>
                                                <div class="user-content">
                                                    <p class="user-info"><span class="name">Alice C.</span> left a comment.</p>
                                                    <p class="time">1 hour ago</p>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="notification-item">
                                                <div class="img-left">
                                                    <img class="user-photo" alt="" src="https://via.placeholder.com/150x150" data-demo-src="assets/img/avatars/photos/12.jpg" />
                                                </div>
                                                <div class="user-content">
                                                    <p class="user-info"><span class="name">Joshua S.</span> uploaded a file.</p>
                                                    <p class="time">2 hours ago</p>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="notification-item">
                                                <div class="img-left">
                                                    <img class="user-photo" alt="" src="https://via.placeholder.com/150x150" data-demo-src="assets/img/avatars/photos/13.jpg" />
                                                </div>
                                                <div class="user-content">
                                                    <p class="user-info"><span class="name">Tara S.</span> sent you a message.</p>
                                                    <p class="time">2 hours ago</p>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="notification-item">
                                                <div class="img-left">
                                                    <img class="user-photo" alt="" src="https://via.placeholder.com/150x150" data-demo-src="assets/img/avatars/photos/25.jpg" />
                                                </div>
                                                <div class="user-content">
                                                    <p class="user-info"><span class="name">Melany W.</span> left a comment.</p>
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
                    <input class="input custom-text-filter" placeholder="Search..." data-filter-target=".list-view-item">
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
                            <img class="light-image" src="assets/img/illustrations/placeholders/search-1.svg" alt="" />
                            <img class="dark-image" src="assets/img/illustrations/placeholders/search-1.svg" alt="" />
                            <h3>We couldn't find any matching results.</h3>
                            <p class="is-larger">Too bad. Looks like we couldn't find any matching results for the
                                search terms you've entered. Please try different search terms or criteria.</p>
                        </div>
                    </div>

                    <div class="list-view-inner">
                        <!--Item-->
                        <div class="list-view-item">
                            <div class="list-view-item-inner">
                                <div class="h-avatar is-large">
                                    <img class="avatar" src="https://via.placeholder.com/150x150" data-demo-src="assets/img/avatars/photos/5.jpg" alt="" data-user-popover="9">
                                    <img class="badge" src="assets/img/icons/flags/united-states-of-america.svg" alt="">
                                </div>
                                <div class="meta-left">
                                    <h3 data-filter-match>Mary Lebowski</h3>
                                    <span>
                                                <i data-feather="map-pin"></i>
                                                <span data-filter-match>San Diego, CA</span>
                                            </span>
                                </div>
                                <div class="meta-right">

                                    <div class="tags">
                                                <span class="tag is-rounded is-primary is-elevated" data-filter-match>Project
                                                    Manager</span>
                                    </div>

                                    <div class="stats">
                                        <div class="stat">
                                            <span>24</span>
                                            <span>Projects</span>
                                        </div>
                                        <div class="separator"></div>
                                        <div class="stat">
                                            <span>167</span>
                                            <span>Replies</span>
                                        </div>
                                        <div class="separator"></div>
                                        <div class="stat">
                                            <span>72</span>
                                            <span>Posts</span>
                                        </div>
                                    </div>

                                    <div class="network">
                                        <div class="avatar-stack">
                                            <div class="h-avatar is-small">
                                                <img class="avatar" src="https://via.placeholder.com/150x150" data-demo-src="assets/img/avatars/photos/9.jpg" alt="" data-user-popover="1">
                                            </div>
                                            <div class="h-avatar is-small">
                                                <img class="avatar" src="https://via.placeholder.com/150x150" data-demo-src="assets/img/avatars/photos/8.jpg" alt="" data-user-popover="3">
                                            </div>
                                        </div>
                                        <span>in Team</span>
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

                        <!--Item-->
                        <div class="list-view-item">
                            <div class="list-view-item-inner">
                                <div class="h-avatar is-large">
                                    <img class="avatar" src="https://via.placeholder.com/150x150" data-demo-src="assets/img/avatars/photos/34.jpg" alt="" data-user-popover="12">
                                    <img class="badge" src="assets/img/icons/flags/canada.svg" alt="">
                                </div>
                                <div class="meta-left">
                                    <h3 data-filter-match>Daniel Redbird</h3>
                                    <span>
                                                <i data-feather="map-pin"></i>
                                                <span data-filter-match>Toronto, Canada</span>
                                            </span>
                                </div>
                                <div class="meta-right">

                                    <div class="tags">
                                                <span class="tag is-rounded is-orange is-elevated" data-filter-match>Web
                                                    Developer</span>
                                    </div>

                                    <div class="stats">
                                        <div class="stat">
                                            <span>45</span>
                                            <span>Projects</span>
                                        </div>
                                        <div class="separator"></div>
                                        <div class="stat">
                                            <span>12</span>
                                            <span>Replies</span>
                                        </div>
                                        <div class="separator"></div>
                                        <div class="stat">
                                            <span>5</span>
                                            <span>Posts</span>
                                        </div>
                                    </div>

                                    <div class="network">
                                        <div class="avatar-stack">
                                            <div class="h-avatar is-small">
                                                <img class="avatar" src="https://via.placeholder.com/150x150" data-demo-src="assets/img/avatars/photos/12.jpg" alt="" data-user-popover="2">
                                            </div>
                                            <div class="h-avatar is-small">
                                                <img class="avatar" src="https://via.placeholder.com/150x150" data-demo-src="assets/img/avatars/photos/22.jpg" alt="" data-user-popover="5">
                                            </div>
                                            <div class="h-avatar is-small">
                                                <img class="avatar" src="https://via.placeholder.com/150x150" data-demo-src="assets/img/avatars/photos/40.jpg" alt="" data-user-popover="11">
                                            </div>
                                            <div class="h-avatar is-small">
                                                        <span class="avatar is-more">
                                                            <span class="inner">
                                                                <span>+5</span>
                                                        </span>
                                                        </span>
                                            </div>
                                        </div>
                                        <span>in Team</span>
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

                        <!--Item-->
                        <div class="list-view-item">
                            <div class="list-view-item-inner">
                                <div class="h-avatar is-large">
                                    <img class="avatar" src="https://via.placeholder.com/150x150" data-demo-src="assets/img/avatars/photos/8.jpg" alt="" data-user-popover="3">
                                    <img class="badge" src="assets/img/icons/flags/united-states-of-america.svg" alt="">
                                </div>
                                <div class="meta-left">
                                    <h3 data-filter-match>Erik Kovalsky</h3>
                                    <span>
                                                <i data-feather="map-pin"></i>
                                                <span data-filter-match>New York, NY</span>
                                            </span>
                                </div>
                                <div class="meta-right">

                                    <div class="tags">
                                                <span class="tag is-rounded is-secondary is-elevated" data-filter-match>Product
                                                    Manager</span>
                                    </div>

                                    <div class="stats">
                                        <div class="stat">
                                            <span>14</span>
                                            <span>Projects</span>
                                        </div>
                                        <div class="separator"></div>
                                        <div class="stat">
                                            <span>97</span>
                                            <span>Replies</span>
                                        </div>
                                        <div class="separator"></div>
                                        <div class="stat">
                                            <span>16</span>
                                            <span>Posts</span>
                                        </div>
                                    </div>

                                    <div class="network">
                                        <div class="avatar-stack">
                                            <div class="h-avatar is-small">
                                                <img class="avatar" src="https://via.placeholder.com/150x150" data-demo-src="assets/img/avatars/photos/7.jpg" alt="" data-user-popover="0">
                                            </div>
                                            <div class="h-avatar is-small">
                                                <img class="avatar" src="https://via.placeholder.com/150x150" data-demo-src="assets/img/avatars/photos/23.jpg" alt="" data-user-popover="21">
                                            </div>
                                        </div>
                                        <span>in Team</span>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
