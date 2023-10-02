<?php

use App\Http\Controllers\Api\ApiAlatBantuController;
use App\Http\Controllers\Api\ApiBantuanModalController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'as'=>'apiBantuanModal.',
    'prefix'=>'bantuan-modal/',
    'controller'=>ApiBantuanModalController::class,
], function(){
    Route::get('/','index')->name('index');
});

Route::group([
    'as'=>'apiAlatBantu.',
    'prefix'=>'alat-bantu/',
    'controller'=>ApiAlatBantuController::class
], function(){
    Route::post('/','index')->name('index');
    Route::post('/all','all')->name('all');
    Route::post('detail/penyaluran/{jenis_bantuan}/','detailPenyaluran')->name('detailPenyaluran');
    Route::post('detail/pengajuan/{jenis_bantuan}/','detailPengajuan')->name('detailPengajuan');
});
