<?php

use App\Http\Controllers\BantuanModalHomeController;
use App\Http\Controllers\BantuanModalTransaksiController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MonitoringBantuanModalController;
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
        'prefix'=>'/home'
    ], function(){
        Route::get('/','index')->name('index');
    });
    
    Route::prefix('/blt-tunai')->group(function(){
        Route::group([
            'controller'=>LandingController::class,
            'as'=>'blt.dashboard.',
            'prefix'=>'/dashboard',
        ], function(){
            Route::get('/','index')->name('index');
            Route::get('/detail-data','detail')->name('detail');
        });

        Route::group([
            'controller'=>TransaksiController::class,
            'as'=>'blt.transaksi.',
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
        'prefix'=>'bantuan-modal',
        'as'=>'bantuanmodal.',
    ], function(){
        Route::group([
            'controller'=>BantuanModalHomeController::class,
            'as'=>'dashboard.',
            'prefix'=>'/dashboard',
        ], function(){
            Route::get('/','index')->name('index');
            Route::get('detail/{jenis_bantuan}/{kategori}','detail')->name('detail');
        });

        Route::group([
            'controller'=>BantuanModalTransaksiController::class,
            'as'=>'transaksi.',
            'prefix'=>'/transaksi',
        ], function(){
            Route::get('/','index')->name('index');
            Route::post('/find','find')->name('find');
            Route::get('/{id}/create','create')->name('create');
            Route::post('/store','store')->name('store');
            Route::get('/soft-delete/{id}','softDelete')->name('softDelete');
        });

        Route::group([
            'controller'=>MonitoringBantuanModalController::class,
            'as'=>'monitoring.',
            'prefix'=>'monitoring'
        ], function(){
            Route::get('/','index')->name('index');
            Route::get('/create','create')->name('create');
            Route::post('/store','store')->name('store');
            Route::get('/{id}/edit','edit')->name('edit');
            Route::post('/{id}/update','update')->name('update');
            Route::get('/{id}','delete')->name('delete');
            Route::get('/find/{nik}','find')->name('find');
        });
    });
});

