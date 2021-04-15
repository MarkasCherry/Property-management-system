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
                <img class="light-image" src="{{ asset('assets/img/logo.svg') }}" alt="{{ env('APP_NAME') }}"/>
                <img class="dark-image" src="{{ asset('assets/img/logo.svg') }}" alt="{{ env('APP_NAME') }}"/>
            </a>
            <div class="brand-end">
                <div class="navbar-item has-dropdown is-notification is-hidden-tablet is-hidden-desktop">
                    <a class="navbar-link is-arrowless" href="javascript:void(0);">
                        <i data-feather="bell"></i>
                        <span class="new-indicator pulsate"></span>
                    </a>
                    <div class="navbar-dropdown is-boxed is-right">
                        <div class="heading">
                            <div class="heading-left">
                                <h6 class="heading-title">Notifications</h6>
                            </div>
                            <div class="heading-right">
                                <a class="notification-link" href="#">See all</a>
                            </div>
                        </div>
                        <div class="inner has-slimscroll">

                            <ul class="notification-list">
                                <li>
                                    <a class="notification-item">
                                        <div class="img-left">
                                            <img class="user-photo" alt="" src="https://via.placeholder.com/150x150"
                                                 data-demo-src="assets/img/avatars/photos/7.jpg"/>
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
                                            <img class="user-photo" alt="" src="https://via.placeholder.com/150x150"
                                                 data-demo-src="assets/img/avatars/photos/12.jpg"/>
                                        </div>
                                        <div class="user-content">
                                            <p class="user-info"><span class="name">Joshua S.</span> uploaded a file.
                                            </p>
                                            <p class="time">2 hours ago</p>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a class="notification-item">
                                        <div class="img-left">
                                            <img class="user-photo" alt="" src="https://via.placeholder.com/150x150"
                                                 data-demo-src="assets/img/avatars/photos/13.jpg"/>
                                        </div>
                                        <div class="user-content">
                                            <p class="user-info"><span class="name">Tara S.</span> sent you a message.
                                            </p>
                                            <p class="time">2 hours ago</p>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a class="notification-item">
                                        <div class="img-left">
                                            <img class="user-photo" alt="" src="https://via.placeholder.com/150x150"
                                                 data-demo-src="assets/img/avatars/photos/25.jpg"/>
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
                <img class="light-image" src="{{ asset('assets/img/logo.svg') }}" alt="{{ env('APP_NAME') }}"/>
                <img class="dark-image" src="{{ asset('assets/img/logo.svg') }}" alt="{{ env('APP_NAME') }}"/>
            </a>
            <div class="separator"></div>
            @include('layouts.header.quick-menu')
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
                <a id="dashboards-navbar-menu"
                   class="centered-link centered-link-toggle" data-menu-id="dashboards-webapp-menu">
                    <i data-feather="activity"></i>
                    <span>{{ __('Menu') }}</span>
                </a>
                <a id="dashboards-navbar-settings"
                   class="centered-link centered-link-toggle" data-menu-id="dashboards-webapp-settings">
                    <i data-feather="settings"></i>
                    <span>{{ __('Settings') }}</span>
                </a>
            </div>
        </div>
        <div class="right">
            @include('layouts.header.notifications')
            @include('layouts.header.profile')
        </div>
    </div>
</div>

<div class="webapp-subnavbar">
    <div id="dashboards-webapp-menu" class="webapp-subnavbar-inner tabs-wrapper">
        <div class="tabs-inner">
            <div class="tabs is-centered is-3">
                <ul>
                    <li data-tab="dashboard-pages-tab" class="is-active"><a>Dashboards</a></li>
                    <li data-tab="templates-pages-tab"><a>Templates</a></li>
                </ul>
            </div>
        </div>

        <div class="container">
            <div id="dashboard-pages-tab" class="tab-content is-active">
                <div class="tab-content-inner">
                    <div class="center has-slimscroll">
                        <div class="columns">
                            <div class="column is-3">
                                <h4 class="column-heading">Personal</h4>
                                <ul>
                                    <li>
                                        <a href="/webapp-dashboards-personal-1.html">
                                            <i class="lnil lnil-analytics-alt-1"></i>
                                            <span>Personal V1</span>
                                            <i data-feather="circle"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/webapp-dashboards-personal-2.html">
                                            <i class="lnil lnil-pie-chart"></i>
                                            <span>Personal V2</span>
                                            <i data-feather="circle"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/webapp-dashboards-personal-3.html">
                                            <i class="lnil lnil-stats-up"></i>
                                            <span>Personal V3</span>
                                            <i data-feather="circle"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/webapp-dashboards-lifestyle-1.html">
                                            <i class="lnil lnil-cardiology"></i>
                                            <span>Influencer</span>
                                            <i data-feather="circle"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/webapp-dashboards-lifestyle-2.html">
                                            <i class="lnil lnil-cloud-sun"></i>
                                            <span>Hobbies</span>
                                            <i data-feather="circle"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/webapp-dashboards-lifestyle-3.html">
                                            <i class="lnil lnil-hospital-alt-3"></i>
                                            <span>Health</span>
                                            <i data-feather="circle"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/webapp-dashboards-lifestyle-4.html">
                                            <i class="lnil lnil-books"></i>
                                            <span>Writer</span>
                                            <i data-feather="circle"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="column is-3">
                                <h4 class="column-heading">Finance</h4>
                                <ul>
                                    <li>
                                        <a href="/webapp-dashboards-finance-1.html">
                                            <i class="lnil lnil-analytics-alt-1"></i>
                                            <span>Analytics</span>
                                            <i data-feather="circle"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/webapp-dashboards-finance-2.html">
                                            <i class="lnil lnil-stats-up"></i>
                                            <span>Stocks</span>
                                            <i data-feather="circle"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/webapp-dashboards-finance-3.html">
                                            <i class="lnil lnil-credit-card"></i>
                                            <span>Sales</span>
                                            <i data-feather="circle"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/webapp-dashboards-banking-1.html">
                                            <i class="lnil lnil-bank"></i>
                                            <span>Banking V1</span>
                                            <i data-feather="circle"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/webapp-dashboards-banking-2.html">
                                            <i class="lnil lnil-bank"></i>
                                            <span>Banking V2</span>
                                            <i data-feather="circle"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/webapp-dashboards-banking-3.html">
                                            <i class="lnil lnil-bank"></i>
                                            <span>Banking V3</span>
                                            <i data-feather="circle"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="column is-3">
                                <h4 class="column-heading">Business</h4>
                                <ul>
                                    <li>
                                        <a href="/webapp-dashboards-business-1.html">
                                            <i class="lnil lnil-plane-alt"></i>
                                            <span>Flights Booking</span>
                                            <i data-feather="circle"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/webapp-dashboards-business-2.html">
                                            <i class="lnil lnil-apartment"></i>
                                            <span>Company Board</span>
                                            <i data-feather="circle"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/webapp-dashboards-business-3.html">
                                            <i class="lnil lnil-users-alt"></i>
                                            <span>HR Board</span>
                                            <i data-feather="circle"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/webapp-dashboards-ecommerce-1.html">
                                            <i class="lnil lnil-cart"></i>
                                            <span>Ecommerce V1</span>
                                            <i data-feather="circle"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="column is-3">
                                <h4 class="column-heading">Apps</h4>
                                <ul>
                                    <li>
                                        <a href="/webapp-dashboards-apps-1.html">
                                            <i class="lnil lnil-pizza"></i>
                                            <span>Food Delivery</span>
                                            <i data-feather="circle"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/webapp-dashboards-apps-2.html">
                                            <i class="lnil lnil-envelope"></i>
                                            <span>Inbox</span>
                                            <i data-feather="circle"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/admin-messaging-chat.html">
                                            <i class="lnil lnil-bubble"></i>
                                            <span>Messaging V1</span>
                                            <i data-feather="circle"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/webapp-messaging-chat.html">
                                            <i class="lnil lnil-bubble"></i>
                                            <span>Messaging V2</span>
                                            <i data-feather="circle"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="templates-pages-tab" class="tab-content">
                <div class="tab-content-inner">
                    <div class="center has-slimscroll">
                        <div class="columns">
                            <div class="column is-3">
                                <h4 class="column-heading">Sidebars</h4>
                                <ul>
                                    <li>
                                        <a href="admin-blank-page-1.html">
                                            <i class="lnil lnil-layout"></i>
                                            <span>Regular Sidebar</span>
                                            <i data-feather="circle"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="admin-blank-page-2.html">
                                            <i class="lnil lnil-layout"></i>
                                            <span>Curved Sidebar</span>
                                            <i data-feather="circle"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="admin-blank-page-3.html">
                                            <i class="lnil lnil-layout"></i>
                                            <span>Colored Sidebar</span>
                                            <i data-feather="circle"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="admin-blank-page-4.html">
                                            <i class="lnil lnil-layout"></i>
                                            <span>Curved Colored</span>
                                            <i data-feather="circle"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="column is-3">
                                <h4 class="column-heading">Navbars</h4>
                                <ul>
                                    <li>
                                        <a href="webapp-blank-page-1.html">
                                            <i class="lnil lnil-layout"></i>
                                            <span>Regular Navbar</span>
                                            <i data-feather="circle"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="webapp-blank-page-2.html">
                                            <i class="lnil lnil-layout"></i>
                                            <span>Fading Navbar</span>
                                            <i data-feather="circle"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="webapp-blank-page-3.html">
                                            <i class="lnil lnil-layout"></i>
                                            <span>Colored Navbar</span>
                                            <i data-feather="circle"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="webapp-blank-page-4.html">
                                            <i class="lnil lnil-layout"></i>
                                            <span>Drop Navbar</span>
                                            <i data-feather="circle"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="webapp-blank-page-5.html">
                                            <i class="lnil lnil-layout"></i>
                                            <span>Colored Drop</span>
                                            <i data-feather="circle"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="column is-3">
                                <h4 class="column-heading">Widgets</h4>
                                <ul>
                                    <li>
                                        <a href="/webapp-dashboards-charts-apex.html">
                                            <i class="lnil lnil-pie-chart-alt"></i>
                                            <span>Apex Charts</span>
                                            <i data-feather="circle"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/webapp-dashboards-charts-billboardjs.html">
                                            <i class="lnil lnil-bar-chart"></i>
                                            <span>Billboard JS</span>
                                            <i data-feather="circle"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/webapp-dashboards-widgets-ui.html">
                                            <i class="lnil lnil-layout-alt-1"></i>
                                            <span>UI Widgets</span>
                                            <i data-feather="circle"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/webapp-dashboards-widgets-creative.html">
                                            <i class="lnil lnil-layout-alt-2"></i>
                                            <span>Creative Widgets</span>
                                            <i data-feather="circle"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/webapp-dashboards-widgets-list.html">
                                            <i class="lnil lnil-layout-alt-1"></i>
                                            <span>List Widgets</span>
                                            <i data-feather="circle"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/webapp-dashboards-widgets-stats.html">
                                            <i class="lnil lnil-layout-alt-1"></i>
                                            <span>Stat Widgets</span>
                                            <i data-feather="circle"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="column is-3">
                                <h4 class="column-heading">Wizard</h4>
                                <ul>
                                    <li>
                                        <a href="/wizard-v1.html">
                                            <span>Wizard V1</span>
                                            <i data-feather="circle"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="/webapp-form-layouts-1.html">
                                            <span>Form V1</span>
                                            <i data-feather="circle"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="/webapp-form-layouts-2.html">
                                            <span>Form V2</span>
                                            <i data-feather="circle"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="/webapp-form-layouts-3.html">
                                            <span>Form V3</span>
                                            <i data-feather="circle"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="/webapp-form-layouts-4.html">
                                            <span>Form V4</span>
                                            <i data-feather="circle"></i>
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
                                <h4 class="column-heading">Users settings</h4>
                                <ul>
                                    <li>
                                        <a href="{{ route('users.index') }}">
                                            <span>User management</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('roles.index') }}">
                                            <span>Roles and permissions</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="column is-3">
                                <h4 class="column-heading">Personal</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="mobile-main-sidebar">
    <div class="inner">
        <ul class="icon-side-menu">
            <li>
                <a href="#" id="home-sidebar-menu-mobile">
                    <i data-feather="activity"></i>
                </a>
            </li>
        </ul>

        <ul class="bottom-icon-side-menu">
            <li>
                <a href="#">
                    <i data-feather="settings"></i>
                </a>
            </li>
        </ul>
    </div>
</div>

<div class="mobile-subsidebar">
    <div class="inner">
        <div class="sidebar-title">
            <h3>Layouts</h3>
        </div>

        <ul class="submenu">
            <li class="has-children">
                <div class="collapse-wrap">
                    <a href="javascript:void(0);" class="parent-link">Lists <i data-feather="chevron-right"></i></a>
                </div>
                <ul>
                    <li>
                        <a class="is-submenu" href="/admin-list-view-1.html">
                            <i class="lnil lnil-list-alt"></i>
                            <span>List View V1</span>
                        </a>
                    </li>
                    <li>
                        <a class="is-submenu" href="/admin-list-view-2.html">
                            <i class="lnil lnil-list-alt"></i>
                            <span>List View V2</span>
                        </a>
                    </li>
                    <li>
                        <a class="is-submenu" href="/admin-list-view-3.html">
                            <i class="lnil lnil-list-alt"></i>
                            <span>List View V3</span>
                        </a>
                    </li>
                    <li>
                        <a class="is-submenu" href="/admin-list-view-4.html">
                            <i class="lnil lnil-list-alt"></i>
                            <span>List View V4</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="divider"></li>
        </ul>

    </div>
</div>
