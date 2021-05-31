<nav class="navbar mobile-navbar no-shadow is-hidden-desktop is-hidden-tablet" aria-label="main navigation">
    <div class="container">
        <!-- Brand -->
        <div class="navbar-brand">
            <!-- Mobile menu toggler icon -->
            <div class="brand-start">
                <div class="navbar-burger">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>

            <a class="navbar-item is-brand" href="{{ route('dashboard') }}">
                <img class="light-image" src="{{ asset('assets/img/logo.png') }}" alt="{{ env('APP_NAME') }}"/>
                <img class="dark-image" src="{{ asset('assets/img/logo.png') }}" alt="{{ env('APP_NAME') }}"/>
            </a>
            <div class="brand-end">

                <div class="dropdown is-right is-spaced dropdown-trigger user-dropdown">
                    <div class="is-trigger" aria-haspopup="true">
                        <div class="profile-avatar">
                            <img class="avatar" src="https://via.placeholder.com/150x150"
                                 data-demo-src="assets/img/avatars/photos/8.jpg" alt="">
                        </div>
                    </div>
                    <div class="dropdown-menu" role="menu">
                        <div class="dropdown-content">
                            <div class="dropdown-head">
                                <div class="h-avatar is-large">
                                    <img class="avatar" src="https://via.placeholder.com/150x150"
                                         data-demo-src="assets/img/avatars/photos/8.jpg" alt="">
                                </div>
                                <div class="meta">
                                    <span>{{ auth()->user()->getFullName() }}</span>
                                    <span>{{ auth()->user()->getPosition() }}</span>
                                </div>
                            </div>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item is-media">
                                <div class="icon">
                                    <i class="lnil lnil-cog"></i>
                                </div>
                                <div class="meta">
                                    <span>My profile</span>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <div class="dropdown-item is-button">
                                <form action="{{ route('logout') }}" method="post">
                                    @csrf
                                    <button class="button h-button is-primary is-raised is-fullwidth logout-button">
                                    <span class="icon is-small">
                                        <i data-feather="log-out"></i>
                                    </span>
                                        <span>Logout</span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>

<div class="webapp-navbar">
    <div class="webapp-navbar-inner">
        <div class="left">
            <a href="{{ route('dashboard') }}" class="brand">
                <img class="light-image" src="{{ asset('assets/img/logo.png') }}" alt="{{ env('APP_NAME') }}"/>
                <img class="dark-image" src="{{ asset('assets/img/logo.png') }}" alt="{{ env('APP_NAME') }}"/>
            </a>
            <div class="separator"></div>
            <h1 id="webapp-page-title" class="title is-6">
                @yield('title')
            </h1>
        </div>
        <div class="center">
            <div id="webapp-navbar-menu" class="centered-links">
                <a href="{{ route('properties.index') }}" id="dashboards-navbar-menu"
                   class="centered-link">
                    <i data-feather="home"></i>
                    <span>{{ __('Properties') }}</span>
                </a>
                <a href="{{ route('bookings.index') }}" id="dashboards-navbar-menu"
                   class="centered-link">
                    <i data-feather="book"></i>
                    <span>{{ __('Bookings') }}</span>
                </a>
                <a href="{{ route('clients.index') }}" id="dashboards-navbar-menu"
                   class="centered-link">
                    <i data-feather="users"></i>
                    <span>{{ __('Clients') }}</span>
                </a>
                <a id="dashboards-navbar-settings"
                   class="centered-link centered-link-toggle" data-menu-id="dashboards-webapp-settings">
                    <i data-feather="settings"></i>
                    <span>{{ __('Settings') }}</span>
                </a>
            </div>
        </div>
        <div class="right">
            <div class="toolbar ml-auto">
                @include('layouts.header.mode-switch')
            </div>
            @include('layouts.header.profile')
        </div>
    </div>
</div>

<div class="webapp-subnavbar">
    <div id="dashboards-webapp-settings" class="webapp-subnavbar-inner tabs-wrapper">
        <div class="tabs-inner">
            <div class="tabs is-centered is-3">
                <ul>
                    <li data-tab="dashboard-pages-settings" class="is-active"><a>Settings</a></li>
                </ul>
            </div>
        </div>

        <div class="container">
            <div id="dashboard-pages-settings" class="tab-content is-active">
                <div class="tab-content-inner">
                    <div class="center has-slimscroll">
                        <div class="columns">
                            <div class="column is-3">
                                <h4 class="column-heading">{{ __('Users settings') }}</h4>
                                <ul>
                                    <li>
                                        <a href="{{ route('users.index') }}">
                                            <span>{{ __('User management') }}</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('roles.index') }}">
                                            <span>{{ __('Roles and permissions') }}</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="column is-3">
                                <h4 class="column-heading">{{ __('System settings') }}</h4>
                                <ul>
                                    <li>
                                        <a href="{{ route('amenities.index') }}">
                                            <span>{{ __('Amenities') }}</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
