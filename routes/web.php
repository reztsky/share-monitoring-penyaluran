<?php

use App\Http\Controllers\LandingController;
use App\Http\Controllers\LoginController;
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
        'controller'=>LandingController::class,
        'as'=>'landing.',
        'prefix'=>'/home',
    ], function(){
        Route::get('/','index')->name('index');
        Route::get('/detail-data','detail')->name('detail');
    });
    
    Route::prefix('/blt')->group(function(){
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
});

