<?php

use App\Models\Barang;
use App\Models\Diskon;
use App\Models\Category;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Admin\PagePromo;
use App\Http\Livewire\Admin\Penitipan;
use App\Http\Livewire\Admin\Penjualan;
use App\Http\Livewire\Admin\PageBarang;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;
use Illuminate\Database\Eloquent\Builder;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PenitipanController;
use App\Http\Livewire\Admin\UpdateTokoInformation;
use App\Http\Livewire\Page\Payment;

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
    Route::prefix('Admin')->group(function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');

        Route::get('Penitipan/Barang', Penitipan::class)->name('Admin.Penitipan');
        Route::get('Penjualan/Barang', Penjualan::class)->name('Admin.Penjualan');
        Route::get('Pengelolaan/Barang', PageBarang::class)->name('Admin.Barang');
        Route::get('Promo/Barang', PagePromo::class)->name('Admin.Promo');
    });

    Route::get('profile/toko', UpdateTokoInformation::class)->name('profile.toko');
    Route::prefix('user/profile')->group(function () {
        Route::get('Penitipan', [CustomerController::class, 'index'])->name('Customer.Penitipan');
    });
});

// Route List kategori
Route::get('/Category/{Category}', function ($Category, Request $request) {
    // Mendapatkan Data Barang Dan Diskon
    $diskon = Diskon::all();
    $BarangDiskon = Barang::whereHas('category', function (Builder $query) use ($Category) {
        $query->where('kategory', 'like', '%' . $Category . '%');
    })->get();
    return view('welcome', [
        'barang' => $BarangDiskon,
        'kategory' => Category::all(),
    ]);
})->name('Get-Kategory');



// Page Jual Dan Titip Barang
Route::resource('/Jual-Titip', PenitipanController::class);
Route::get('Barang', function () {
    return view('page.penjualan.penjualan');
})->name('page.penjualan');

// Produk Detail Sebelum Cek out
Route::get('/produk-list/{id}/{name}', function ($id, $name) {
    return view('page.produk-view', [
        'produk_id' => $id,
        'produk_name' => $name,
    ]);
})->name('Produk-list');


// Midtrans
Route::post('payments/midtrans-notification', [PaymentController::class, 'receive']);
Route::get('/keranjang/{Barang}', [CartController::class, 'create'])->name('page.keranjang.create');
Route::delete('/keranjang/{id}', [CartController::class, 'delete'])->name('page.keranjang.delete');
Route::post('/transaksi', [CartController::class, 'getDataPayment'])->name('json-data');
Route::get('/transaksi', [CartController::class, 'createSnap'])->name('Lanjutkan-Pembayaran');
Route::get('Keranjang', [CartController::class, 'index'])->name('page.keranjang');
