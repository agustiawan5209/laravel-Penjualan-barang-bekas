<?php

namespace App\Http\Livewire\Item;

use App\Models\Cart;
use App\Models\Barang;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class Pagecheckout extends Component
{
    public $itemID;
    public $nameID;
    public $jumlah = 0;
    public $sub_total, $count = 1;
    public $harga;
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
        }
        // $data = [;
        return view('livewire.item.pagecheckout', [
            'randomLink' => Str::random(10),
            'itemID' => $this->itemID,
            'foto_produk' => $foto_produk,
            'nama_produk' => $nama_produk,
            'deskripsi' => $deskripsi,
            'categories' => $categories
        ]);
    }
    public function toCart()
    {
        // pengecekan jumlah Barang
        if ($this->jumlah < 1) {
            session()->flash('message', 'Maaf Jumlah Barang Mohon Di Isi');
        }else{
            // Cek Apakah Barang Ada Atau Tidak
            $Cek_Cart = Cart::where('user_id', '=', Auth::user()->id)->where('barang_id', '=', $this->itemID)->get();
            // dd($Cek_Cart);
            if ($Cek_Cart->count() > 0) {
                session()->flash('message', $Cek_Cart ? 'Maaf Sudah Di Masukkan Ke Keranjang' : 'Barang Belum Di Masukkan Ke Keranjang');
            } else {
                $cart = Cart::create([
                    'user_id' => Auth::user()->id,
                    'jumlah_barang' => $this->jumlah,
                    'barang_id' => $this->itemID,
                    'sub_total' => $this->jumlah * $this->harga,
                ]);
                session()->flash('message', $cart ? 'Berhasil Di Masukkan Ke Keranjang' : 'Gagal Di Masukkan Ke Keranjang');
            }
            return redirect()->route('page.keranjang.create', ['Barang' => $this->itemID, 'id' => Str::random(10)]);
        }
    }
    public function Hitung()
    {
        $this->jumlah++;
        $this->sub_total = 'Rp. ' . number_format($this->jumlah * $this->harga, 0, 2);
    }
    public function kurang()
    {
        $this->jumlah--;
        $this->sub_total = 'Rp. ' . number_format($this->jumlah * $this->harga, 0, 2);
    }
}
