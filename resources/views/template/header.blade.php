<header class="app-header fixed-top">
    <div class="app-header-inner">
        <div class="container-fluid py-2">
            <div class="app-header-content">
                <div class="row justify-content-between align-items-center">

                    <div class="col-auto">
                        <a id="sidepanel-toggler" class="sidepanel-toggler d-inline-block d-xl-none" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30"
                                role="img">
                                <title>Menu</title>
                                <path stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10"
                                    stroke-width="2" d="M4 7h22M4 15h22M4 23h22"></path>
                            </svg>
                        </a>
                    </div>

                    <div class="app-utilities col-auto">

                        <div class="app-utility-item app-user-dropdown dropdown">
                            <a class="dropdown-toggle" id="user-dropdown-toggle" data-bs-toggle="dropdown" href="#"
                                role="button" aria-expanded="false">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-gear icon"
                                    fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M8.837 1.626c-.246-.835-1.428-.835-1.674 0l-.094.319A1.873 1.873 0 0 1 4.377 3.06l-.292-.16c-.764-.415-1.6.42-1.184 1.185l.159.292a1.873 1.873 0 0 1-1.115 2.692l-.319.094c-.835.246-.835 1.428 0 1.674l.319.094a1.873 1.873 0 0 1 1.115 2.693l-.16.291c-.415.764.42 1.6 1.185 1.184l.292-.159a1.873 1.873 0 0 1 2.692 1.116l.094.318c.246.835 1.428.835 1.674 0l.094-.319a1.873 1.873 0 0 1 2.693-1.115l.291.16c.764.415 1.6-.42 1.184-1.185l-.159-.291a1.873 1.873 0 0 1 1.116-2.693l.318-.094c.835-.246.835-1.428 0-1.674l-.319-.094a1.873 1.873 0 0 1-1.115-2.692l.16-.292c.415-.764-.42-1.6-1.185-1.184l-.291.159A1.873 1.873 0 0 1 8.93 1.945l-.094-.319zm-2.633-.283c.527-1.79 3.065-1.79 3.592 0l.094.319a.873.873 0 0 0 1.255.52l.292-.16c1.64-.892 3.434.901 2.54 2.541l-.159.292a.873.873 0 0 0 .52 1.255l.319.094c1.79.527 1.79 3.065 0 3.592l-.319.094a.873.873 0 0 0-.52 1.255l.16.292c.893 1.64-.902 3.434-2.541 2.54l-.292-.159a.873.873 0 0 0-1.255.52l-.094.319c-.527 1.79-3.065 1.79-3.592 0l-.094-.319a.873.873 0 0 0-1.255-.52l-.292.16c-1.64.893-3.433-.902-2.54-2.541l.159-.292a.873.873 0 0 0-.52-1.255l-.319-.094c-1.79-.527-1.79-3.065 0-3.592l.319-.094a.873.873 0 0 0 .52-1.255l-.16-.292c-.892-1.64.902-3.433 2.541-2.54l.292.159a.873.873 0 0 0 1.255-.52l.094-.319z" />
                                    <path fill-rule="evenodd"
                                        d="M8 5.754a2.246 2.246 0 1 0 0 4.492 2.246 2.246 0 0 0 0-4.492zM4.754 8a3.246 3.246 0 1 1 6.492 0 3.246 3.246 0 0 1-6.492 0z" />
                                </svg>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="user-dropdown-toggle">
                                <li><a class="dropdown-item" href="account.html">Account</a></li>
                                <li><a class="dropdown-item" href="settings.html">Settings</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="{{route('logout')}}">Log Out</a></li>
                            </ul>
                        </div>
                        <!--//app-user-dropdown-->
                    </div>
                    <!--//app-utilities-->
                </div>
                <!--//row-->
            </div>
            <!--//app-header-content-->
        </div>
        <!--//container-fluid-->
    </div>
    <!--//app-header-inner-->
    <div id="app-sidepanel" class="app-sidepanel">
        <div id="sidepanel-drop" class="sidepanel-drop"></div>
        <div class="sidepanel-inner d-flex flex-column">
            <a href="#" id="sidepanel-close" class="sidepanel-close d-xl-none">&times;</a>
            <div class="app-branding">
                <a class="app-logo" href="index.html"><span class="logo-text">DBHCHT Surabaya</span></a>

            </div>
            <!--//app-branding-->

            <nav id="app-nav-main" class="app-nav app-nav-main flex-grow-1">
                <ul class="app-menu list-unstyled accordion" id="menu-accordion">
                    <li class="nav-item">
                        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                        <a class="nav-link @yield('link-active-home')" href="{{route('home.index')}}">
                            <span class="nav-icon fs-5 fw-bold">
                                <i class="bi bi-house-door"></i>
                            </span>
                            <span class="nav-link-text">Home</span>
                        </a>
                        <!--//nav-link-->
                    </li>
                    {{-- BLT --}}
                    <li class="nav-item">
                        <a href="#" class="nav-link  @yield('link-active-blt') submenu-toggle" data-bs-toggle="collapse"
                            data-bs-target="#submenu-blt">
                            <span class="nav-icon fs-5 fw-bold">
                                <i class="bi bi-cash-coin"></i>
                            </span>
                            <span>BLT</span>
                            <span class="submenu-arrow">
                                <i class="bi bi-chevron-down"></i>
                            </span>
                        </a>
                        <div id="submenu-blt" class="submenu collapse submenu-blt" data-bs-parent="#menu-accrodion">
                            <ul class="submenu-list list-unstyled">
                                <li class="submenu-item"><a href="{{route('blt.dashboard.index')}}"
                                        class="submenu-link">Dashboard</a></li>
                                <li class="submenu-item"><a href="{{route('blt.transaksi.index')}}"
                                        class="submenu-link">Transaksi</a></li>
                            </ul>
                        </div>
                    </li>

                    {{-- Bantuan Modal --}}
                    <li class="nav-item">
                        <a href="#" class="nav-link @yield('link-active-bantuan-modal') submenu-toggle"
                            data-bs-toggle="collapse" data-bs-target="#submenu-bantuan-modal">
                            <span class="nav-icon fs-5 fw-bold">
                                <i class="bi bi-columns-gap"></i>
                            </span>
                            <span>Bantuan Modal</span>
                            <span class="submenu-arrow">
                                <i class="bi bi-chevron-down"></i>
                            </span>
                        </a>
                        <div id="submenu-bantuan-modal" class="submenu collapse submenu-bantuan-modal"
                            data-bs-parent="#menu-accrodion">
                            <ul class="submenu-list list-unstyled">
                                <li class="submenu-item"><a href="{{route('bantuanmodal.dashboard.index')}}"
                                        class="submenu-link">Dashboard</a></li>
                                <li class="submenu-item"><a href="{{route('bantuanmodal.transaksi.index')}}"
                                        class="submenu-link">Transaksi</a></li>
                            </ul>
                        </div>
                    </li>

                    {{-- Moniotring Bantuan Modal --}}
                    <li class="nav-item">
                        <a href="{{route('bantuanmodal.monitoring.index')}}" class="nav-link @yield('link-active-monitoring')">
                            <span class="nav-icon fs-5 fw-bold"><i class="bi bi-graph-up-arrow"></i></span>
                            <span class="nav-link-text">Monitoring Bantuan Modal</span>
                        </a>
                    </li>

                </ul>
                <!--//app-menu-->
            </nav>
            <!--//app-nav-->
            <div class="app-sidepanel-footer">
                <nav class="app-nav app-nav-footer">
                    {{-- <ul class="app-menu footer-menu list-unstyled"></ul> --}}
                    <!--//footer-menu-->
                </nav>
            </div>
            <!--//app-sidepanel-footer-->

        </div>
        <!--//sidepanel-inner-->
    </div>
    <!--//app-sidepanel-->
</header>
<!--//app-header-->