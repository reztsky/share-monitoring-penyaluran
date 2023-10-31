<?php

use App\Http\Controllers\AlatDisabilitas\DashboardBantuanController;
use App\Http\Controllers\AlatDisabilitas\PemeriksaanBantuanModalController;
use App\Http\Controllers\AlatDisabilitas\PengajuanBantuanModalController;
use App\Http\Controllers\AlatDisabilitas\PenyaluranBantuanModalController;
use App\Http\Controllers\BltBantuanModal\BantuanModalHomeController;
use App\Http\Controllers\BltBantuanModal\BantuanModalTransaksiController;
use App\Http\Controllers\BltTunai\LandingController;
use App\Http\Controllers\BltTunai\TransaksiController;
use App\Http\Controllers\ExportFotoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MonitoringBanmod\MonitoringBantuanModalController;
use App\Http\Controllers\MonitoringBanmod\ReportMonitoringBantuanModalController;
use App\Http\Controllers\UsulanBanmod\UsulanDbhchtController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::group([
    'controller' => LoginController::class,
], function () {
    Route::get('/', 'login')->name('login');
    Route::post('/auth', 'auth')->name('auth');
    Route::get('/logout', 'logout')->name('logout');
    Route::get('/captcha-reload', 'captchaReload')->name('captchaReload');
});

Route::group([
    'middleware' => ['auth']
], function () {

    Route::group([
        'controller' => HomeController::class,
        'as' => 'home.',
        'prefix' => '/home',
    ], function () {
        Route::get('/', 'index')->name('index');
    });

    Route::group([
        'controller'=>UsulanDbhchtController::class,
        'as'=>'usulan_dbhcht.',
        'prefix'=>'usulan/',
    ], function(){
        Route::group([
            'middleware' =>'role:Super Admin|Kelurahan'
        ], function(){
            Route::get('/','index')->name('index');
            Route::get('/create','create')->name('create');
            Route::post('/store','store')->name('store');
            Route::post('/delete/{id}','delete')->name('delete');
            Route::get('/cekgakin/{nik}','cekGakin')->name('cekGakin');
            Route::get('/cekKuota','cekKuota')->name('cekKuota');
            Route::get('/edit/{id}','edit')->middleware('cekInsertedByOnUsulan')->name('edit');
            Route::post('/update/{id}','update')->name('update');
        });

        Route::get('/detail','detail')->name('detail')->middleware('role:Super Admin|Kelurahan|Opd');
        Route::get('/dashboard','dashboard')->name('dashboard')->middleware('role:Super Admin|Kelurahan|Opd');
        Route::get('/dashboard-kuota','dashboardKuota')->name('dashboardKuota')->middleware('role:Super Admin|Opd');
       
    });

    Route::group([
        'controller' => ExportFotoController::class,
        'as' => 'exportfoto.',
        'prefix' => '/export-foto',
    ], function () {
        Route::get('/{kategori}', 'index')->name('index');
        Route::post('/export', 'export')->name('export');
    });

    Route::group([
        'prefix' => '/blt-tunai',
        'as' => 'blt.'
    ], function () {
        Route::group([
            'controller' => LandingController::class,
            'as' => 'dashboard.',
            'prefix' => '/dashboard',
            'middleware' => 'role:Super Admin|Opd|bank-jatim',
        ], function () {
            Route::get('/', 'index')->name('index');
            Route::get('/detail-data', 'detail')->name('detail');
        });

        Route::group([
            'controller' => TransaksiController::class,
            'as' => 'transaksi.',
            'prefix' => '/transkasi-salur',
            'middleware' => 'role:Super Admin',
        ], function () {
            Route::get('/', 'index')->name('index');
            Route::post('/find', 'find')->name('find');
            Route::get('/show/{tahun}/{tahap}/{key}', 'show')->name('show');
            Route::post('/store', 'store')->name('store');
            Route::get('/soft-delete/{id}', 'softDelete')->name('softDelete');
        });
    });

    Route::group([
        'prefix' => '/bantuan-modal',
        'as' => 'bantuanmodal.',
    ], function () {
        Route::group([
            'controller' => BantuanModalHomeController::class,
            'as' => 'dashboard.',
            'prefix' => '/dashboard',
            'middleware' => 'role:Super Admin|Opd',
        ], function () {
            Route::get('/', 'index')->name('index');
            Route::get('detail/{tahun}/{jenis_bantuan}/{kategori}/{sumber_dana}', 'detail')->name('detail');
        });

        Route::group([
            'controller' => BantuanModalTransaksiController::class,
            'as' => 'transaksi.',
            'prefix' => '/transaksi',
            'middleware' => 'role:Super Admin',
        ], function () {
            Route::get('/', 'index')->name('index');
            Route::post('/find', 'find')->name('find');
            Route::get('/{tahun}/{tahap}/{key}/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/soft-delete/{id}', 'softDelete')->name('softDelete');
        });

        Route::group([
            'as' => 'monitoring.',
            'prefix' => '/monitoring',
        ], function () {
            Route::group([
                'controller' => MonitoringBantuanModalController::class,
                'middleware' => 'role:Surveyor|Super Admin',
            ], function () {
                Route::get('/', 'index')->name('index');
                Route::get('/create', 'create')->name('create');
                Route::post('/store', 'store')->name('store');
                Route::get('/{id}/show', 'show')->name('show');
                Route::get('/{id}/edit', 'edit')->name('edit');
                Route::post('/{id}/update', 'update')->name('update');
                Route::get('/delete/{id}', 'delete')->name('delete');
                Route::get('/find/{nik}', 'find')->name('find');
            });

            Route::group([
                'controller' => ReportMonitoringBantuanModalController::class,
                'as' => 'report.',
                'prefix' => '/report',
                'middleware' => 'role:Surveyor|Super Admin|Opd',
            ], function () {
                Route::get('/', 'index')->name('index');
            });
        });
    });

    Route::group([
        'prefix' => '/pelayanan',
        'as' => 'pelayanan.',
    ], function () {
        Route::group([
            'controller' => DashboardBantuanController::class,
            'as' => 'dashboard.',
            'prefix' => '/dashboard',
            'middleware' => 'role:Admin Pelayanan|Super Admin|Opd',
        ], function () {
            Route::get('/', 'index')->name('index');
            Route::get('detail/{jenis_bantuan}/{kategori}/{sumber_dana)', 'detail')->name('detail');
        });

        Route::group([
            'controller' => PengajuanBantuanModalController::class,
            'as' => 'pengajuan.',
            'prefix' => '/pengajuan',
            'middleware' => 'role:Admin Pelayanan|Super Admin',
        ], function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/edit/{id}', 'edit')->name('edit');
            Route::post('/update/{id}', 'update')->name('update');
            Route::get('/show/{id}', 'show')->name('show');
            Route::get('/delete/{id}', 'destroy')->name('delete');
            Route::get('/kelurahan/find/{id_kecamatan}', 'findKecamatan')->name('findKecamatan');
            Route::get('/cek-pengajuan/{nik}', 'cekPengajuan')->name('cekPengajuan');
            Route::post('/verifikasi/{id}', 'verifikasi')->name('verifikasi');
        });

        Route::group([
            'controller' => PemeriksaanBantuanModalController::class,
            'as' => 'pemeriksaan.',
            'prefix' => '/pemeriksaan',
            'middleware' => 'role:Admin Pelayanan|Super Admin',
        ], function () {
            Route::get('/', 'index')->name('index');
            Route::get('/show', 'show')->name('show');
            Route::get('/edit/{id}', 'edit')->name('edit');
            Route::post('/update/{id}', 'update')->name('update');
        });

        Route::group([
            'controller' => PenyaluranBantuanModalController::class,
            'as' => 'penyaluran.',
            'prefix' => '/penyaluran',
            'middleware' => 'role:Admin Pelayanan|Super Admin',
        ], function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create/{id}', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/show/{id}', 'show')->name('show');
        });
    });
});
