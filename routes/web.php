<?php

use App\Models\Barang;
use App\Models\Diskon;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Livewire\Admin\PageChat;
use App\Http\Livewire\PageChatSingle;
use App\Http\Livewire\User\JualTitip;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Admin\PagePromo;
use App\Http\Livewire\Admin\Penitipan;
use App\Http\Livewire\Admin\Penjualan;
use App\Http\Livewire\Admin\PageBarang;
use App\Http\Livewire\MetodePembayaran;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;
use App\Http\Livewire\Admin\PageVoucher;
use App\Http\Controllers\PromoController;
use App\Http\Livewire\Page\PagePromoHome;
use App\Http\Livewire\User\DetailPesanan;
use App\Http\Livewire\User\RequestBarang;
use Illuminate\Database\Eloquent\Builder;
use App\Http\Livewire\User\ProfilePesanan;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PaymentController;
use App\Http\Livewire\Admin\PagePengiriman;
use App\Http\Livewire\Admin\PageTambahFoto;
use App\Http\Controllers\CustomerController;
use App\Http\Livewire\Admin\SlideController;
use App\Http\Controllers\PenitipanController;
use App\Http\Livewire\Admin\Promo\PromoLaris;
use App\Http\Livewire\Admin\RequestBarangAdmin;
use App\Http\Livewire\User\DetailRequestBarang;
use App\Http\Livewire\Admin\PagePengembalianAdmin;
use App\Http\Livewire\Admin\Promo\PromoKadaluarsa;
use App\Http\Livewire\Admin\UpdateTokoInformation;
use App\Http\Livewire\Admin\Promo\PromoTidakTerpakai;
use App\Http\Livewire\Laporan\LaporanTitipPage;
use App\Http\Livewire\Laporan\Penjualan as LaporanPenjualan;
use App\Http\Livewire\User\LaporanRequest;

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
    $BarangDiskon = Barang::orderBy('stock', 'desc')->get();
    $barang_terabru = Barang::orderBy('id','desc')->paginate(5);
    // dd($BarangDiskon->id);
    return view('welcome', [
        'barang' => $BarangDiskon,
        'kategory' => Category::all(),
        'barang_terbaru'=>  $barang_terabru,
    ]);
})->name('home');


// Cek User
Route::get('/cek', [UserController::class, 'authenticate']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('Pengembalian-Barang', PagePengembalianAdmin::class)->name('Admin.Pengembalian-barang');

    //Akses Admin
    Route::middleware(['middleware' =>  'role:Admin'])->group(function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');
        Route::get('Penitipan/Barang', RequestBarang::class)->name('Admin.Penitipan');
        Route::get('Penjualan/Barang', Penjualan::class)->name('Admin.Penjualan');
        Route::get('Pengelolaan/Barang', PageBarang::class)->name('Admin.Barang');
        Route::get('Pengelolaan/Foto-Barang/{id}', PageTambahFoto::class)->name('Admin.Barang-Foto');
        Route::get('Promo/Barang', PagePromo::class)->name('Admin.Promo');
        Route::get('Voucher/Barang', PageVoucher::class)->name('Admin.Voucher');
        Route::get('Slide/Setting', SlideController::class)->name('Admin.Slide');


        // Halaman Tambahan Promo
        Route::get('Promo-Kadaluarsa', PromoKadaluarsa::class)->name('Promo-Kadaluarsa');
        Route::get('Promo-TidakTerpakai', PromoTidakTerpakai::class)->name('Promo-TidakTerpakai');
        Route::get('Promo-Terlaris', PromoLaris::class)->name('Promo-Terlaris');

        // Halaman Pengiriman Barang
        Route::get('Pengiriman Barang', PagePengiriman::class)->name('Admin.Pengiriman-Barang');

        // Halaman Chat Admin
        Route::get('Chat', PageChat::class)->name('chat');
        Route::get('Chat/{id_chat}', PageChatSingle::class)->name('chat-single');


        // Tampilkan Request Barang Admin
        Route::get("Request/Barang-Admin", RequestBarangAdmin::class)->name('Request-Barang-Admin');

        // Tampilan Pengembalian Barang

        // Laporan Penjualan
        Route::get('Laporan/Penjualan', LaporanPenjualan::class)->name('laporan-Penjualan');
        Route::get('Laporan/Titip/Barang', LaporanTitipPage::class)->name('Laporan.titipbarang');
        Route::get('PDF/Laporan/Penjualan', [LaporanController::class, 'laporanPenjualan'])->name('PDF-Laporan-Penjualan');
        Route::get('PDF/Laporan/Titip', [LaporanController::class, 'laporanTitip'])->name('PDF-Laporan-Titip');
    });
    // Metode Pembayaran
    Route::get('Metode-Pembayaran', MetodePembayaran::class)->name('Metode_pembayaran');
    // Akses User
    Route::middleware(['middleware' => 'role:Customer'])->group(function () {
        Route::get('Request/Barang', RequestBarang::class)->name('User.Request');
        Route::get('request/barang/{id}', DetailRequestBarang::class)->name('User.DetailRequest');
        // Detail Pesanan
        Route::get('Pesanan', ProfilePesanan::class)->name('User.pesanan');
        Route::get('Detail-Pesanan/{item}', DetailPesanan::class)->name('User.Detail-Pesanan');

        // Akses User

        Route::post('payments/midtrans-notification', [PaymentController::class, 'receive']);
        Route::get('/keranjang/{Barang}', [CartController::class, 'create'])->name('page.keranjang.create');
        Route::delete('/keranjang/{id}', [CartController::class, 'delete'])->name('page.keranjang.delete');
        Route::get('Keranjang', [CartController::class, 'index'])->name('page.keranjang');
        Route::get('Bayar-Sekarang', [CartController::class, 'Kirim'])->name('Kirim-Pembayaran');
        Route::post('Pembayaran', [PaymentController::class, 'receive'])->name('receive');
        // Route::resource('/Jual-Titip', PenitipanController::class);
        // Page Jual Dan Titip Barang

        Route::get('LaporanPenjualan', LaporanRequest::class)->name('User.LaporanRequest');
        Route::get('Barang', function () {
            return view('page.penjualan.penjualan');
        })->name('page.penjualan');
    });
});

Route::get('Promo', PagePromoHome::class)->name('promo-index');
Route::post('Kode/Promo', [PromoController::class, 'CekPromoUser'])->name('masukan-kode-promo');
// Route List kategori
Route::get('/Category/{Category}/{id}', function ($Category, $id, Request $request) {
    // Mendapatkan Data Barang Dan Diskon
    $diskon = Diskon::all();
    // $BarangDiskon = Barang::whereHas('category', function (Builder $query) use ($Category) {
    //     $query->where('kategory', 'like', '%' . $Category . '%');
    // })->get();
    $barang_terabru = Barang::orderBy('id','desc')->paginate(5);
    $BarangDiskon = Barang::where('categories', '=', $id)->get();
    return view('welcome', [
        'barang' => $BarangDiskon,
        'kategory' => Category::all(),
        'barang_terbaru'=>  $barang_terabru,

    ]);
})->name('Get-Kategory');



// Produk Detail Sebelum Cek out
Route::get('/produk-list/{id}/{name}', function ($id, $name) {
    $barang_terabru = Barang::orderBy('id','desc')->paginate(5);
    return view('page.produk-view', [
        'produk_id' => $id,
        'produk_name' => $name,
        'barang_terbaru'=>  $barang_terabru,
    ]);
})->name('Produk-list');


// Midtrans
