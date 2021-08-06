<div class="app-sidebar sidebar-shadow">
    <div class="scrollbar-sidebar">
        <div class="app-sidebar__inner">
            <ul class="vertical-nav-menu">
                <li class="app-sidebar__heading">Dashboards</li>
                <li>
                    <a href="{{ route('admin.dashboard') }}" class="{{ Route::is('admin.dashboard') ? 'mm-active' : '' }}">
                        <i class="metismenu-icon pe-7s-rocket"></i>
                        Dashboard
                    </a>
                </li>

                <li class="app-sidebar__heading">Category</li>

                <li>
                    <a href="{{ route('admin.category.index') }}" class="{{ Route::is('admin.category.index') ? 'mm-active' : '' }}">
                        <i class="metismenu-icon pe-7s-diamond"></i>
                        Category
                    </a>
                </li>

                <li class="app-sidebar__heading">Property</li>

                <li>
                    <a href="{{ route('admin.property.index') }}" class="{{ Route::is('admin.property.index') ? 'mm-active' : '' }}">
                        <i class="metismenu-icon pe-7s-diamond"></i>
                        Properties
                    </a>
                </li>

                <li class="app-sidebar__heading">Settings</li>

                <li>
                    <a href="{{ route('admin.setting') }}" class="{{ Route::is('admin.setting') ? 'mm-active' : '' }}">
                        <i class="metismenu-icon pe-7s-diamond"></i>
                        Setting
                    </a>
                </li>
                
            </ul>
        </div>
    </div>
</div>