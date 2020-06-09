<nav class="page-sidebar" id="sidebar">
    <div id="sidebar-collapse">
        <div class="admin-block d-flex align-items-center">
            <div>
                <img src="{{asset('/images/main/'.$dashboard_composer->logo)}}" class="rounded" width="45px" />
            </div>
            <div class="admin-info">
                <div class="font-strong">{{ Auth::user()->name }}</div>
            </div>
        </div>
        <?php
            $user = Auth::user();
            $role = $user->roles;
            $user_access = explode(',', $user->access_level);
        ?>
        <ul class="side-menu metismenu">
            <li class="heading">Menu</li>
            <li class="{{ Request::is('admin/dashboard') ? 'active': '' }}">
                <a href="{{route('dashboard')}}"><i class="sidebar-item-icon fa fa-globe"></i>
                    <span class="nav-label">Dashboard</span></a>
            </li>
            @if($role == 'admin' || ($role == 'staff' && in_array('settings', $user_access)) )
            <li class="{{ Request::is('admin/settings') ? 'active': '' }}">
                <a href="{{route('settings')}}"><i class="sidebar-item-icon fa fa-globe"></i>
                    <span class="nav-label">Site Setting</span></a>
            </li>
            @endif

            @if($role == 'admin' || ($role == 'staff' && in_array('designation', $user_access)) )
            {{-- Designation --}}
            <li>
                <a href="javascript:;">
                    <i class="sidebar-item-icon fa fa-sitemap"></i>
                    <span class="nav-label">विभाग व्यवस्थापन</span>
                    <i class="fa fa-angle-left arrow"></i>
                </a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="{{ route('designation.create') }}">
                            <span class="fa fa-plus mr-2"></span>
                            नयाँ थाप
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('designation.index') }}">
                            <span class="fa fa-plus mr-2"></span>
                            सूची
                        </a>
                    </li>

                </ul>
            </li>
            @endif

            @if($role == 'admin' || ($role == 'staff' && in_array('fiscalyear', $user_access)) )
            {{-- Fiscal year --}}
            <li>
                <a href="javascript:;">
                    <i class="sidebar-item-icon fa fa-sitemap"></i>
                    <span class="nav-label">आर्थिक वर्ष व्यवस्थापन</span>
                    <i class="fa fa-angle-left arrow"></i>
                </a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="{{ route('fiscalyear.create') }}">
                            <span class="fa fa-plus mr-2"></span>
                            नयाँ थाप
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('fiscalyear.index') }}">
                            <span class="fa fa-plus mr-2"></span>
                            सूची
                        </a>
                    </li>

                </ul>
            </li>
            @endif

            @if($role == 'admin' || ($role == 'staff' && in_array('fiscalyear', $user_access)) )
            {{-- Service type --}}
            <li>
                <a href="javascript:;">
                    <i class="sidebar-item-icon fa fa-sitemap"></i>
                    <span class="nav-label">सेवा प्रकार व्यवस्थापन</span>
                    <i class="fa fa-angle-left arrow"></i>
                </a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="{{ route('service.create') }}">
                            <span class="fa fa-plus mr-2"></span>
                            नयाँ थाप
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('service.index') }}">
                            <span class="fa fa-plus mr-2"></span>
                            सूची
                        </a>
                    </li>

                </ul>
            </li>
            @endif

            @if($role == 'admin' || ($role == 'staff' && in_array('users', $user_access)) )
            {{-- Users --}}
            <li>
                <a href="javascript:;">
                    <i class="sidebar-item-icon fa fa-sitemap"></i>
                    <span class="nav-label">प्रयोगकर्ता व्यवस्थापन</span>
                    <i class="fa fa-angle-left arrow"></i>
                </a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="{{ route('users.create') }}">
                            <span class="fa fa-plus mr-2"></span>
                            नयाँ थाप
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('users.index') }}">
                            <span class="fa fa-plus mr-2"></span>
                            सूची
                        </a>
                    </li>

                </ul>
            </li>
            @endif

        </ul>
    </div>
</nav>