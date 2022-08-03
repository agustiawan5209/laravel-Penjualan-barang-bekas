<?php

use App\Models\Barang;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Admin\Penitipan;
use App\Http\Livewire\Admin\Penjualan;
use App\Http\Livewire\Admin\PageBarang;
use App\Http\Controllers\UserController;
use App\Models\Category;

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

Route::get('/', function () {
    $barang = Barang::paginate(10);
    return view('welcome', [
        'barang'=> $barang,
        'kategory' => Category::all(),
    ]);
})->name('home');

Route::get('/Jual-Titip', function(){
    return view('page.jual_titip');
})->name('page.Jual-titip');
Route::get('/keranjang', function(){
    return view('page.keranjang');
})->name('page.keranjang');

Route::get('Barang', function(){
    return view('page.penjualan.penjualan');
})->name('page.penjualan');
Route::get('/cek', [UserController::class, 'authenticate']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function(){
        return view('dashboard');
    })->name('dashboard');

    Route::get('Penitipan/Barang', Penitipan::class)->name('Admin.Penitipan');
    Route::get('Penjualan/Barang', Penjualan::class)->name('Admin.Penjualan');
    Route::get('Pengelolaan/Barang', PageBarang::class)->name('Admin.Barang');
});

