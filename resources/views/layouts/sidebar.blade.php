<!-- Vertical Nav -->
        <nav class="hk-nav hk-nav-light">
            <a href="javascript:void(0);" id="hk_nav_close" class="hk-nav-close"><span class="feather-icon"><i data-feather="x"></i></span></a>
            <div class="nicescroll-bar">
                <div class="navbar-nav-wrap">
                    <ul class="navbar-nav flex-column">
                        <li class="nav-item {{ Route::currentRouteName() === 'home' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('home') }}">
                                <span class="feather-icon"><i data-feather="home"></i></span>
                                <span class="nav-link-text">Home</span>
                            </a>
                        </li>
                        <li class="nav-item {{ Route::currentRouteName() === 'schools' ? 'active' : '' }}">
                            <a class="nav-link link-with-badge" href="{{ route('schools') }}">
                                <span class="feather-icon"><i data-feather="book-open"></i></span>
                                <span class="nav-link-text">Schools</span>
                                {{-- <span class="badge badge-primary badge-pill">4</span> --}}
                            </a>
                        </li>
                        <li class="nav-item {{ Route::currentRouteName() === 'competitions' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('competitions') }}">
                                <span class="feather-icon"><i data-feather="zap"></i></span>
                                <span class="nav-link-text">Competitions</span>
                            </a>
                        </li>
                        <li class="nav-item {{ Route::currentRouteName() === 'posts' || Route::currentRouteName() == 'post.create' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('posts') }}">
                                <span class="feather-icon"><i data-feather="file-text"></i></span>
                                <span class="nav-link-text">Posts</span>
                            </a>
                        </li>
                        <li class="nav-item {{ Route::currentRouteName() === 'events' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('events') }}">
                                <span class="feather-icon"><i data-feather="file-text"></i></span>
                                <span class="nav-link-text">Events</span>
                            </a>
                        </li>
                        <li class="nav-item {{ Route::currentRouteName() === 'health-emergency' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('health-emergency') }}">
                                <span class="feather-icon"><i data-feather="alert-triangle"></i></span>
                                <span class="nav-link-text">Health Emergency</span>
                            </a>
                        </li>
                        <li class="nav-item {{ Route::currentRouteName() === 'users' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('users') }}">
                                <span class="feather-icon"><i data-feather="users"></i></span>
                                <span class="nav-link-text">Users</span>
                            </a>
                        </li>
                    </ul>
                    <hr class="nav-separator">
                </div>
            </div>
        </nav>
        <div id="hk_nav_backdrop" class="hk-nav-backdrop"></div>
        <!-- /Vertical Nav -->