<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <title>DBHCHT</title>
    @vite(['resources/js/app.js'])
    @stack('style')
</head>

<body class="app">
    @include('template.header')
    <div class="app-wrapper">
        <div class="app-content pt-3 p-md-3 p-lg-4">
            {{-- <div class="container-xl"> --}}
                @yield('content')
                @include('template.Notifikasi')
            {{-- </div> --}}
            @include('template/footer')
        </div>
        <!--//container-fluid-->
    </div>
    <!--//app-content-->
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function () {
    $('#tabs').DataTable();
});
</script>
@stack('script')
</html>