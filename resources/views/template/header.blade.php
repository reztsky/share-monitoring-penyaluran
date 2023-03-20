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
                                <i class="bi bi-basket"></i>
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
                                <li class="submenu-item"><a href="{{route('bantuanmodal.report.index')}}"
                                        class="submenu-link">Transaksi</a></li>
                            </ul>
                        </div>
                    </li>

                    {{-- Moniotring Bantuan Modal --}}
                    <li class="nav-item">
                        <a href="#" class="nav-link @yield('link-active-monev-modal') submenu-toggle"
                            data-bs-toggle="collapse" data-bs-target="#submenu-monev-modal">
                            <span class="nav-icon fs-5 fw-bold">
                                <i class="bi bi-graph-up-arrow"></i>
                            </span>
                            <span>Monitoring Bantuan Modal</span>
                            <span class="submenu-arrow">
                                <i class="bi bi-chevron-down"></i>
                            </span>
                        </a>
                        <div id="submenu-monev-modal" class="submenu collapse submenu-monev-modal"
                            data-bs-parent="#menu-accrodion">
                            <ul class="submenu-list list-unstyled">
                                <li class="submenu-item"><a href="{{route('bantuanmodal.monitoring.index')}}"
                                        class="submenu-link">Transaksi</a></li>
                                <li class="submenu-item"><a href="{{route('bantuanmodal.report.index')}}"
                                        class="submenu-link">Dashboard</a></li>
                            </ul>
                        </div>
                    </li>
                    <li><hr style="border: 2px solid #7fd6c6;border-radius: 5px;"/>

                    <li class="nav-item">
                        <a href="{{route('logout')}}" class="nav-link @yield('link-active-logout')">
                            <span class="nav-icon fs-5 fw-bold"><i class="bi bi-box-arrow-in-left"></i></span>
                            <span class="nav-link-text">Keluar</span>
                        </a>
                    </li>

                </ul>
            </nav>
        </div>
    </div>
</header>
