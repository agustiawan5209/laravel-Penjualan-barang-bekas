<?php

namespace App\Http\Livewire\Item;

use App\Models\Cart;
use App\Models\Barang;
use Livewire\Component;
use App\Models\PromoUser;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Pagecheckout extends Component
{
    public $itemID;
    public $nameID;
    public $jumlah = 0;
    public $sub_total, $count = 1;
    public $harga;
    public $diskon;
    public function mount($itemID, $nameID)
    {
        $this->itemID = $itemID;
        $this->nameID = $nameID;
    }
    public function render()
    {
        $foto_produk = '';
        $nama_produk = '';

        $deskripsi = '';
        $categories = '';
        $barang = Barang::where('id', '=', $this->itemID)->where('nama_produk', '=', $this->nameID)->get();

        foreach ($barang as $item) {
            $foto_produk = $item->foto_produk;
            $nama_produk = $item->nama_produk;
            $this->harga = $item->harga;
            $deskripsi = $item->deskripsi;
            $categories = $item->category->kategory;
            $this->diskon = isset($item->diskon->diskon) ? $item->diskon->diskon : 0;
        }
        // Hitung Diskon
        $this->diskon = ($this->diskon / 100) *  $this->harga;
        // $data = [;
        return view('livewire.item.pagecheckout', [
            'randomLink' => Str::random(10),
            'itemID' => $this->itemID,
            'foto_produk' => $foto_produk,
            'nama_produk' => $nama_produk,
            'deskripsi' => $deskripsi,
            'categories' => $categories,
        ]);
    }
    public function toCart()
    {
        // pengecekan jumlah Barang
        if (Auth::check()) {
            if ($this->jumlah < 1) {
                session()->flash('message', 'Maaf Jumlah Barang Mohon Di Isi');
            } else {
                // Cek Apakah Barang Ada Atau Tidak
                $Cek_Cart = Cart::where('user_id', '=', Auth::user()->id)->where('barang_id', '=', $this->itemID)->get();
                // dd($Cek_Cart);
                $user_cek = Barang::where('user_id', '=', Auth::user()->id)->get();
                // dd($user_cek);
                $jumlah_promo = [];
                $nama_promo = [];
                $promo = PromoUser::where('user_id', '=', Auth::user()->id)->get();
                if ($promo->count() > 0) {
                    foreach ($promo as $item) {
                        $jumlah_promo[] = $item->promo->promo;
                        $nama_promo[] = $item->promo->kode_promo;
                    }
                    Session::put('promo', $jumlah_promo);
                    Session::put('nam_promo', $nama_promo);
                }
                // dd(session('promo'));
                $promo =  array_sum($jumlah_promo);
                if ($user_cek->count() > 0) {
                    session()->flash('alert', 'Maaf Gagal Respon');
                } else {
                    if ($Cek_Cart->count() > 0) {
                        session()->flash('message', $Cek_Cart ? 'Maaf Sudah Di Masukkan Ke Keranjang' : 'Barang Belum Di Masukkan Ke Keranjang');
                    } else {
                        $cart = Cart::create([
                            'user_id' => Auth::user()->id,
                            'jumlah_barang' => $this->jumlah,
                            'barang_id' => $this->itemID,
                            'sub_total' => isset($promo) ? $this->jumlah * $this->harga - $this->diskon - $promo : $this->jumlah * $this->harga - $this->diskon,
                        ]);
                        session()->flash('message', $cart ? 'Berhasil Di Masukkan Ke Keranjang' : 'Gagal Di Masukkan Ke Keranjang');
                        return redirect()->route('page.keranjang.create', ['Barang' => $this->itemID, 'id' => Str::random(10)]);
                    }
                }
            }
        } else {
            session()->flash('message', 'Maaf Silahkan Login');
        }
    }
    public function Hitung($id)
    {
        if ($this->cekStock($id)) {
            $this->jumlah++;
            $this->sub_total = 'Rp. ' . number_format($this->jumlah * $this->harga - $this->diskon, 0, 2);
        }
    }
    public function kurang($id)
    {
        if ($this->cekStock($id) == false) {
            $this->jumlah--;
            $this->sub_total = 'Rp. ' . number_format($this->jumlah * $this->harga - $this->diskon, 0, 2);
        }
    }
    public function cekStock($id)
    {
        $barang = Barang::find($id);
        if ($barang->stock <= $this->jumlah) {
            return false;
        } else {
            return true;
        }
    }
}
