        <div class="app-header header-shadow">
            <div class="app-header__logo">
                <div class="logo-src">
                    <a href="{{ route('admin.dashboard') }}">
                        <img src="{{ Storage::url(setting('site_logo')) }}" width="150px" height="35px" alt="Sohan IT Logo">
                    </a>
                </div>
                <div class="header__pane ml-auto">
                    <div>
                        <button type="button" class="hamburger close-sidebar-btn hamburger--elastic"
                            data-class="closed-sidebar">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="app-header__mobile-menu">
                <div>
                    <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
            </div>
            <div class="app-header__menu">
                <span>
                    <button type="button"
                        class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                        <span class="btn-icon-wrapper">
                            <i class="fa fa-ellipsis-v fa-w-6"></i>
                        </span>
                    </button>
                </span>
            </div>
            <div class="app-header__content">
                <div class="app-header-left">
                    <div class="search-wrapper">
                        <div class="input-holder">
                            <input type="text" class="search-input" placeholder="Type to search">
                            <button class="search-icon"><span></span></button>
                        </div>
                        <button class="close"></button>
                    </div>
                    
                </div>
                <div class="app-header-right">
                    <div class="header-btn-lg pr-0">
                        <div class="widget-content p-0">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left">
                                    <div class="btn-group">
                                        <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                            class="p-0 btn">
                                            <b>{{ auth()->guard('admin')->user()->name }}</b>
                                            {{-- <b>sohan</b> --}}
                                            <i class="fa fa-angle-down ml-2 opacity-8"></i>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right" tabindex="-1" role="menu" aria-hidden="true" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" tabindex="0" href="{{ route('admin.logout') }}"
                                            onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>

                                            <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>

                                            <a class="dropdown-item" tabindex="0" href="{{ route('admin.profile') }}">
                                                {{ __('Profile') }}
                                            </a>
                                            <a class="dropdown-item" tabindex="0" href="{{ route('admin.password') }}">
                                                {{ __('Password Update') }}
                                            </a>

                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="widget-content-left  ml-3 header-user-info">
                                    <div class="widget-heading">
                                       {{ auth()->user()->name }}
                                    </div>
                                    <div class="widget-subheading">
                                        VP People Manager
                                    </div>
                                </div> --}}
                                <div class="widget-content-right header-user-info ml-3">
                                    <button type="button"
                                        class="btn-shadow p-1 btn btn-primary btn-sm show-toastr-example">
                                        <i class="fa text-white fa-calendar pr-1 pl-1"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>