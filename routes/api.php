<?php

use App\Http\Controllers\APIController;
use App\Http\Controllers\UserController;
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
// Midtrans Payment
Route::prefix('payment')->group(function(){
    Route::get('Cart/{Payment}', [PaymentController::class, 'receive'])->name('Payment');
});

Route::controller(APIController::class)->group(function(){
    Route::get('kota', 'kota')->name('API-kota');
    Route::get('getKota/{id}', 'getKota')->name('API-get-kota');
    Route::get('kecamatan/{id}', 'kecamatan')->name('API-kecamatan');
    Route::get('detailcamata/{id}', 'detail_kecamatan')->name('API-detailcamat');
    Route::get('desa/{id}', 'desa')->name('API-detailcamat');
});
Route::get('Data-Penjualan', [APIController::class, 'DataPenjualan'])->name('API-Data-Penjualan');

