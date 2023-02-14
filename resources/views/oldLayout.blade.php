<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/js/app.js'])
    @stack('style')
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">DBHCHT</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link @yield('link-active-home')" aria-current="page" href="{{route('landing.index')}}">Home</a>
                    </li>
                    @if (Auth::user()->id!=3)
                    <li class="nav-item">
                        <a class="nav-link @yield('link-active-transaksi')" href="{{route('transaksi.index')}}">BLT Tunai</a>
                    </li>    
                    <li class="nav-item dropdown">
                        <a class="nav-link @yield('link-active-bantuan-modal') dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                          Bantuan Modal
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <li><a class="dropdown-item @yield('link-active-bantuan-modal-dashboard')" href="{{route('bantuanmodal.dashboard.index')}}">Dashboard</a></li>
                          <li><a class="dropdown-item @yield('link-active-bantuan-modal-transaksi')" href="{{route('bantuanmodal.transaksi.index')}}">Transaksi</a></li>
                          <li><hr class="dropdown-divider"></li>
                          
                        </ul>
                      </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('logout')}}">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row">
            @yield('content')
        </div>
    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@stack('script')
</html>