<div class="dropdown profile-dropdown dropdown-trigger is-spaced is-right">
    <img src="https://via.placeholder.com/150x150" data-demo-src="assets/img/avatars/photos/8.jpg" alt="">
    <span class="status-indicator"></span>

    <div class="dropdown-menu" role="menu">
        <div class="dropdown-content">
            <div class="dropdown-head">
                <div class="h-avatar is-large">
                    <img class="avatar" src="https://via.placeholder.com/150x150" data-demo-src="assets/img/avatars/photos/8.jpg" alt="">
                </div>
                <div class="meta">
                    <span>{{ auth()->user()->getFullName() }}</span>
                    <span>{{ auth()->user()->getPosition() }}</span>
                </div>
            </div>
            <hr class="dropdown-divider">
            <a href="{{ route('profile.show') }}" class="dropdown-item is-media">
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
