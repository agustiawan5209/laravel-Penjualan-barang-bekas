<?php

use App\Models\Barang;
use App\Models\Diskon;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Admin\PagePromo;
use App\Http\Livewire\Admin\Penitipan;
use App\Http\Livewire\Admin\Penjualan;
use App\Http\Livewire\Admin\PageBarang;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;
use Illuminate\Database\Eloquent\Builder;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PenitipanController;
use App\Http\Controllers\PromoController;
use App\Http\Livewire\Admin\SlideController;
use App\Http\Livewire\Admin\UpdateTokoInformation;
use App\Http\Livewire\MetodePembayaran;
use App\Http\Livewire\User\JualTitip;
use App\Http\Livewire\User\ProfilePesanan;

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
    // Mendapatkan Data Barang Dan Diskon
    $diskon = Diskon::all();
    $BarangDiskon = Barang::all();
    // dd($BarangDiskon->id);
    return view('welcome', [
        'barang' => $BarangDiskon,
        'kategory' => Category::all(),
    ]);
})->name('home');


// Cek User
Route::get('/cek', [UserController::class, 'authenticate']);


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    //Akses Admin
    Route::middleware(['middleware' =>  'role:Admin'])->group(function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');
        Route::get('Penitipan/Barang', Penitipan::class)->name('Admin.Penitipan');
        Route::get('Penjualan/Barang', Penjualan::class)->name('Admin.Penjualan');
        Route::get('Pengelolaan/Barang', PageBarang::class)->name('Admin.Barang');
        Route::get('Promo/Barang', PagePromo::class)->name('Admin.Promo');
        Route::get('Slide/Setting', SlideController::class)->name('Admin.Slide');
    });
    // Metode Pembayaran
    Route::get('Metode-Pembayaran', MetodePembayaran::class)->name('Metode_pembayaran');
    // Akses User
    Route::middleware(['middleware' => 'role:Customer'])->group(function () {
        Route::get('profile/toko', UpdateTokoInformation::class)->name('profile.toko');
        Route::get('Penitipan', Penitipan::class)->name('User.Penitipan');
        // Detail Pesanan
        Route::get('Pesanan', ProfilePesanan::class)->name('User.pesanan');
        // Jual TITIP Barang
        Route::get('Jual-titip', JualTitip::class)->name('User.Jual-Titip');

        // Akses User

        Route::post('payments/midtrans-notification', [PaymentController::class, 'receive']);
        Route::get('/keranjang/{Barang}', [CartController::class, 'create'])->name('page.keranjang.create');
        Route::delete('/keranjang/{id}', [CartController::class, 'delete'])->name('page.keranjang.delete');
        Route::get('Keranjang', [CartController::class, 'index'])->name('page.keranjang');
        Route::get('Bayar-Sekarang', [CartController::class, 'Kirim'])->name('Kirim-Pembayaran');
        Route::post('Pembayaran', [PaymentController::class, 'receive'])->name('receive');
        // Route::resource('/Jual-Titip', PenitipanController::class);


        // Page Jual Dan Titip Barang
        Route::get('Barang', function () {
            return view('page.penjualan.penjualan');
        })->name('page.penjualan');
    });
});
Route::post('Kode/Promo', [PromoController::class, 'CekPromoUser'])->name('masukan-kode-promo');
// Route List kategori
Route::get('/Category/{Category}/{id}', function ($Category, $id, Request $request) {
    // Mendapatkan Data Barang Dan Diskon
    $diskon = Diskon::all();
    // $BarangDiskon = Barang::whereHas('category', function (Builder $query) use ($Category) {
    //     $query->where('kategory', 'like', '%' . $Category . '%');
    // })->get();
    $BarangDiskon = Barang::where('categories', '=', $id)->get();
    return view('welcome', [
        'barang' => $BarangDiskon,
        'kategory' => Category::all(),
    ]);
})->name('Get-Kategory');



// Produk Detail Sebelum Cek out
Route::get('/produk-list/{id}/{name}', function ($id, $name) {
    return view('page.produk-view', [
        'produk_id' => $id,
        'produk_name' => $name,
    ]);
})->name('Produk-list');


// Midtrans
