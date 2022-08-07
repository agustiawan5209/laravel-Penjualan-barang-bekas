<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\PaymentController;
use App\Models\Barang;
use App\Models\Diskon;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Admin\Penitipan;
use App\Http\Livewire\Admin\Penjualan;
use App\Http\Livewire\Admin\PageBarang;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\UserController;
use App\Http\Livewire\Admin\PagePromo;

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


Route::get('/cek', [UserController::class, 'authenticate']);
Route::get('/', function () {
    // Mendapatkan Data Barang Dan Diskon
    $diskon = Diskon::all();
    $BarangDiskon = Barang::all();
    // dd($BarangDiskon->id);
    return view('welcome', [
        'barang' => $BarangDiskon,
        'kategory' => Category::all(),
    ]);
})->name('home');

Route::get('/Jual-Titip', function () {
    return view('page.jual_titip');
})->name('page.Jual-titip');

Route::get('/keranjang', [CartController::class , 'index'])->name('page.keranjang');
Route::get('/keranjang/{Barang}', [CartController::class , 'create'])->name('page.keranjang.create');
Route::delete('/keranjang/{Cart}', [CartController::class , 'destroy'])->name('page.keranjang.delete');

Route::get('Barang', function () {
    return view('page.penjualan.penjualan');
})->name('page.penjualan');
Route::get('/produk-list/{id}/{name}', function ($id, $name) {
    return view('page.produk-view', [
        'produk_id' => $id,
        'produk_name' => $name,
    ]);
})->name('Produk-list');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::prefix('Admin')->group(function(){
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');

        Route::get('Penitipan/Barang', Penitipan::class)->name('Admin.Penitipan');
        Route::get('Penjualan/Barang', Penjualan::class)->name('Admin.Penjualan');
        Route::get('Pengelolaan/Barang', PageBarang::class)->name('Admin.Barang');
        Route::get('Promo/Barang', PagePromo::class)->name('Admin.Promo');
    });
});


// Midtrans
Route::post('payments/midtrans-notification', [PaymentController::class, 'receive']);
