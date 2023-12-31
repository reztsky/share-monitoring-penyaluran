<header class="app-header fixed-top">
    <div class="app-header-inner">
        <div class="container-fluid py-2">
            <div class="app-header-content">
                <div class="row justify-content-between align-items-center pt-2">
                    <h4 class=>
                        @php
                            $user = Auth::user();
                        @endphp
                        @if ($user->roles->first()->name == 'Kelurahan')
                            @php $user_detail=explode("|",$user->name) @endphp
                            Kel. {{ $user_detail[1] }}, Kec. {{ $user_detail[2] }}
                        @else
                            {{ $user->name }}
                        @endif
                    </h4>
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
                        <a class="nav-link @yield('link-active-home')" href="{{ route('home.index') }}">
                            <span class="nav-icon fs-5 fw-bold">
                                <i class="bi bi-house-door"></i>
                            </span>
                            <span class="nav-link-text">Home</span>
                        </a>
                        <!--//nav-link-->
                    </li>

                    @hasanyrole('Super Admin|Kelurahan|Opd')
                        {{-- Usulan Bantuan Modal DBHCHT --}}
                        <li class="nav-item">
                            <a href="#" class="nav-link @yield('link-active-usulan-bantuan-modal') submenu-toggle" data-bs-toggle="collapse"
                                data-bs-target="#submenu-usulan-bantuan-modal">
                                <span class="nav-icon fs-5 fw-bold">
                                    <i class="bi bi-bookmark-plus"></i>
                                </span>
                                <span>Usulan Bantuan Modal</span>
                                <span class="submenu-arrow">
                                    <i class="bi bi-chevron-down"></i>
                                </span>
                            </a>
                            <div id="submenu-usulan-bantuan-modal" class="submenu collapse submenu-bantuan-modal"
                                data-bs-parent="#menu-accrodion">
                                <ul class="submenu-list list-unstyled">
                                    <li class="submenu-item"><a href="{{ route('usulan_dbhcht.dashboard') }}"
                                            class="submenu-link">Dashboard Usulan</a></li>
                                    @hasanyrole('Super Admin|Opd')
                                        <li class="submenu-item"><a href="{{ route('usulan_dbhcht.dashboardKuota') }}"
                                                class="submenu-link">Dashboard Kuota</a></li>
                                    @endhasanyrole

                                    @hasanyrole('Super Admin|Kelurahan')
                                        <li class="submenu-item"><a href="{{ route('usulan_dbhcht.index') }}"
                                                class="submenu-link">Usulan</a></li>
                                    @endhasanyrole
                                </ul>
                            </div>
                        </li>
                    @endhasanyrole

                    @hasanyrole('Super Admin|Opd|bank-jatim')
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
                                    <li class="submenu-item"><a href="{{ route('blt.dashboard.index') }}"
                                            class="submenu-link">Dashboard</a></li>
                                    @hasrole('Super Admin')
                                        <li class="submenu-item"><a href="{{ route('blt.transaksi.index') }}"
                                                class="submenu-link">Transaksi</a></li>
                                    @endhasrole
                                    {{-- <li class="submenu-item"><a href="{{ route('exportfoto.index','BLT') }}"
                                            class="submenu-link">Export</a></li> --}}
                                </ul>
                            </div>
                        </li>
                    @endhasanyrole

                    @hasanyrole('Super Admin|Opd')
                        {{-- Bantuan Modal --}}
                        <li class="nav-item">
                            <a href="#" class="nav-link @yield('link-active-bantuan-modal') submenu-toggle" data-bs-toggle="collapse"
                                data-bs-target="#submenu-bantuan-modal">
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
                                    <li class="submenu-item"><a href="{{ route('bantuanmodal.dashboard.index') }}"
                                            class="submenu-link">Dashboard</a></li>
                                    @hasrole('Super Admin')
                                        <li class="submenu-item"><a href="{{ route('bantuanmodal.transaksi.index') }}"
                                                class="submenu-link">Transaksi</a></li>
                                    @endhasrole
                                    {{-- <li class="submenu-item"><a href="{{ route('exportfoto.index','Bantuan-Modal') }}"
                                            class="submenu-link">Export</a></li> --}}
                                </ul>
                            </div>
                        </li>
                    @endhasanyrole

                    @hasanyrole('Super Admin|Surveyor|Opd')
                        {{-- Moniotring Bantuan Modal --}}
                        <li class="nav-item">
                            <a href="#" class="nav-link @yield('link-active-monev-modal') submenu-toggle" data-bs-toggle="collapse"
                                data-bs-target="#submenu-monev-modal">
                                <span class="nav-icon fs-5 fw-bold">
                                    <i class="bi bi-graph-up-arrow"></i>
                                </span>
                                <span>Monitoring BanMod</span>
                                <span class="submenu-arrow">
                                    <i class="bi bi-chevron-down"></i>
                                </span>
                            </a>
                            <div id="submenu-monev-modal" class="submenu collapse submenu-monev-modal"
                                data-bs-parent="#menu-accrodion">
                                <ul class="submenu-list list-unstyled">
                                    <li class="submenu-item"><a
                                            href="{{ route('bantuanmodal.monitoring.report.index') }}"
                                            class="submenu-link">Dashboard</a></li>
                                    @hasanyrole('Super Admin|Surveyor')
                                        <li class="submenu-item"><a href="{{ route('bantuanmodal.monitoring.index') }}"
                                                class="submenu-link">Transaksi</a></li>
                                    @endhasanyrole
                                </ul>
                            </div>
                        </li>
                    @endhasanyrole

                    @hasanyrole('Super Admin|Admin Pelayanan|Opd')
                        {{-- Pengajuan Bantuan Modal --}}
                        <li class="nav-item">
                            <a href="#" class="nav-link @yield('link-active-pengajuan-modal') submenu-toggle" data-bs-toggle="collapse"
                                data-bs-target="#submenu-pengajuan-modal">
                                <span class="nav-icon fs-5 fw-bold">
                                    <i class="bi bi-headset"></i>
                                </span>
                                <span>Pelayanan Alat Bantu</span>
                                <span class="submenu-arrow">
                                    <i class="bi bi-chevron-down"></i>
                                </span>
                            </a>
                            <div id="submenu-pengajuan-modal" class="submenu collapse submenu-pengajuan-modal"
                                data-bs-parent="#menu-accrodion">
                                <ul class="submenu-list list-unstyled">
                                    <li class="submenu-item"><a href="{{ route('pelayanan.dashboard.index') }}"
                                            class="submenu-link">Dashboard</a></li>

                                    @hasanyrole('Super Admin|Admin Pelayanan')
                                        <li class="submenu-item"><a href="{{ route('pelayanan.pengajuan.index') }}"
                                                class="submenu-link">Pengajuan & Pengecekan</a></li>
                                        <li class="submenu-item"><a href="{{ route('pelayanan.pemeriksaan.index') }}"
                                                class="submenu-link">Pemeriksaan & Pengukuran</a></li>
                                        <li class="submenu-item"><a href="{{ route('pelayanan.penyaluran.index') }}"
                                                class="submenu-link">Penyaluran</a></li>
                                    @endhasanyrole
                                </ul>
                            </div>
                        </li>
                    @endhasanyrole
                    <li>
                        <hr style="border: 2px solid #7fd6c6;border-radius: 5px;" />

                    <li class="nav-item">
                        <a href="{{ route('logout') }}" class="nav-link @yield('link-active-logout')">
                            <span class="nav-icon fs-5 fw-bold"><i class="bi bi-box-arrow-in-left"></i></span>
                            <span class="nav-link-text">Keluar</span>
                        </a>
                    </li>

                </ul>
            </nav>
        </div>
    </div>
</header>
