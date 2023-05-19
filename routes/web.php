<?php

use App\Http\Controllers\BantuanModalHomeController;
use App\Http\Controllers\BantuanModalTransaksiController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MonitoringBantuanModalController;
use App\Http\Controllers\PelayananBantuanModalController;
use App\Http\Controllers\PengajuanBantuanModalController;
use App\Http\Controllers\PengecekanBantuanModalController;
use App\Http\Controllers\PenyaluranBantuanModalController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ReportMonitoringBantuanModalController;
use App\Http\Controllers\TransaksiController;
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
    'controller'=>LoginController::class,
], function(){
    Route::get('/','login')->name('login');
    Route::post('/auth','auth')->name('auth');
    Route::get('/logout','logout')->name('logout');
    Route::get('/captcha-reload','captchaReload')->name('captchaReload');
});

Route::group([
    'middleware'=>'auth'
], function(){
    Route::group([
        'controller'=>HomeController::class,
        'as'=>'home.',
        'prefix'=>'/home',
    ], function(){
        Route::get('/','index')->name('index');
    });
    
    Route::group([
        'prefix'=>'/blt-tunai',
        'middleware'=>'role:Super Admin',
        'as'=>'blt.'
    ],function(){
        Route::group([
            'controller'=>LandingController::class,
            'as'=>'dashboard.',
            'prefix'=>'/dashboard',
        ], function(){
            Route::get('/','index')->name('index');
            Route::get('/detail-data','detail')->name('detail');
        });

        Route::group([
            'controller'=>TransaksiController::class,
            'as'=>'transaksi.',
            'prefix'=>'/transkasi-salur',
        ], function(){
            Route::get('/','index')->name('index');
            Route::post('/find','find')->name('find');
            Route::get('/show/{id}','show')->name('show');
            Route::post('/store','store')->name('store');
            Route::get('/soft-delete/{id}','softDelete')->name('softDelete');
        });
    });

    Route::group([
        'prefix'=>'/bantuan-modal',
        'as'=>'bantuanmodal.',
    ], function(){
        Route::group([
            'controller'=>BantuanModalHomeController::class,
            'as'=>'dashboard.',
            'prefix'=>'/dashboard',
            'middleware'=>'role:Super Admin',
        ], function(){
            Route::get('/','index')->name('index');
            Route::get('detail/{jenis_bantuan}/{kategori}','detail')->name('detail');
        });

        Route::group([
            'controller'=>BantuanModalTransaksiController::class,
            'as'=>'transaksi.',
            'prefix'=>'/transaksi',
            'middleware'=>'role:Super Admin',
        ], function(){
            Route::get('/','index')->name('index');
            Route::post('/find','find')->name('find');
            Route::get('/{id}/create','create')->name('create');
            Route::post('/store','store')->name('store');
            Route::get('/soft-delete/{id}','softDelete')->name('softDelete');
        });

        Route::group([
            'as'=>'monitoring.',
            'prefix'=>'/monitoring',
        ], function(){
            Route::group([
                'controller'=>MonitoringBantuanModalController::class,
                'middleware'=>'role:Surveyor|Super Admin',
            ], function(){
                Route::get('/','index')->name('index');
                Route::get('/create','create')->name('create');
                Route::post('/store','store')->name('store');
                Route::get('/{id}/show','show')->name('show');
                Route::get('/{id}/edit','edit')->name('edit');
                Route::post('/{id}/update','update')->name('update');
                Route::get('/delete/{id}','delete')->name('delete');
                Route::get('/find/{nik}','find')->name('find');
            });

            Route::group([
                'controller'=>ReportMonitoringBantuanModalController::class,
                'as'=>'report.',
                'prefix'=>'/report',
                'middleware'=>'role:Surveyor|Super Admin',
            ], function(){
                Route::get('/','index')->name('index');
            });

        });    
    });

    Route::group([
        'prefix'=>'/pelayanan',
        'as'=>'pelayanan.',
    ], function(){
        Route::group([
            'controller'=>PelayananBantuanModalController::class,
            'as'=>'dashboard.',
            'prefix'=>'/dashboard',
            // 'middleware'=>'role:Super Admin',
        ], function(){
            Route::get('/','index')->name('index');
        });

        Route::group([
            'controller'=>PengajuanBantuanModalController::class,
            'as'=>'pengajuan.',
            'prefix'=>'/pengajuan',
            // 'middleware'=>'role:Super Admin',
        ], function(){
            Route::get('/','index')->name('index');
            Route::get('/create','create')->name('create');
            Route::get('/edit','edit')->name('edit');
            Route::get('/show','show')->name('show');
        });

        Route::group([
            'controller'=>PengecekanBantuanModalController::class,
            'as'=>'pengecekan.',
            'prefix'=>'/pengecekan',
            // 'middleware'=>'role:Super Admin',
        ], function(){
            Route::get('/','index')->name('index');
        });

        Route::group([
            'controller'=>PenyaluranBantuanModalController::class,
            'as'=>'penyaluran.',
            'prefix'=>'/penyaluran',
            // 'middleware'=>'role:Super Admin',
        ], function(){
            Route::get('/','index')->name('index');
        });    
    });
});

