@extends('layout')
@section('link-active-home','active')
    
@section('content')
<h1 class="app-page-title">Home</h1>
<div class="app-card alert alert-dismissible shadow-sm mb-4 border-left-decoration" role="alert">
    <div class="inner">
        <div class="app-card-body p-3 p-lg-4">
            <h3 class="mb-3">Selamat Datang,</h3>
            <div class="row gx-5 gy-3">
                <div class="col-12 col-lg-9">
                    <p align="justify" class="my-0 py-0">Aplikasi ini digunakan untuk keperluan monitoring penyaluran
                        bantuan sosial
                        Dana Bagi Hasil Cukai Rokok dan Tembakau (DBHCT) di Kota Surabaya. Bantuan yang
                        diberikan terdapat 2 jenis yaitu Bantuan Lansung Tunai (BLT) dan Bantuan Modal
                        Usaha</p>
                </div>
            </div>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</div>
@endsection