<?php

namespace App\Http\Livewire\Item;

use App\Models\Cart;
use App\Models\Barang;
use App\Models\Diskon;
use App\Models\ulasan;
use Livewire\Component;
use App\Models\PromoUser;
use App\Models\FotoBarang;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class Pagecheckout extends Component
{
    public $itemID;
    public $nameID;
    public $jumlah = 0;
    public $sub_total, $count = 1;
    public $harga;
    public $diskon;
    public $pemilik_id;
    public $itemFoto = null;
    public function mount($itemID, $nameID)
    {
        $this->itemID = $itemID;
        $this->nameID = $nameID;
        $foto = FotoBarang::where('barang_id', $this->itemID)->where('default', 'yes')->first();
        $this->itemFoto = $foto->foto;
    }
    public function gantiFoto($id){
        $barang = Barang::find($this->itemID);
        $fotobarang = FotoBarang::find($id);
        $this->itemFoto = $fotobarang->foto;
        // dd($itemFoto);
    }
    public function render()
    {
        $foto_produk = '';
        $nama_produk = '';

        $deskripsi = '';
        $categories = '';
        $barang = Barang::where('id', '=', $this->itemID)->where('nama_produk', '=', $this->nameID)->get();
        $ulasan = ulasan::where('barang_id', $this->itemID)->orderBy('id', 'desc')->get();

        foreach ($barang as $item) {
            $foto_produk = $item->fotobarang;
            $nama_produk = $item->nama_produk;
            $this->harga = $item->harga;
            $deskripsi = $item->deskripsi;
            $categories = $item->category->kategory;
            $this->diskon = isset($item->diskon->diskon) ? $item->diskon->diskon : 0;
            $this->pemilik_id = $item->user_id;
        }
        $foto = FotoBarang::where('barang_id', $this->itemID)->where('default', 'yes')->first();
        // dd()
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
            'ulasan'=> $ulasan,
        ]);
    }
    public function toCart()
    {
        // pengecekan jumlah Barang
        if (Auth::check()) {
            if ($this->jumlah < 1) {
               Alert::warning('message', 'Maaf Jumlah Barang Mohon Di Isi');
            } else {
                // Cek Apakah Barang Ada Atau Tidak
                $Cek_Cart = Cart::where('user_id', '=', Auth::user()->id)->where('barang_id', '=', $this->itemID)->get();
                // dd($Cek_Cart);
                $user_cek = Barang::where('user_id', '=', Auth::user()->id)->get();

                // cek diskon jika ada
                $diskon  = Diskon::where('barang_id', '=', $this->itemID)->get();
                $diskon_array = [];
                if($diskon->count() >  0){
                    foreach($diskon as $item){
                        $diskon_array[] = $item->diskon;
                    }
                }
                $array_sum_diskon = array_sum($diskon_array);

                // JIka barang adalah milik user yang ada
                if ($user_cek->count() > 0) {
                   Alert::warning('alert', 'Maaf Gagal Respon');
                } else {
                    if ($Cek_Cart->count() > 0) {
                       Alert::warning('message', $Cek_Cart ? 'Maaf Sudah Di Masukkan Ke Keranjang' : 'Barang Belum Di Masukkan Ke Keranjang');
                    } else {
                        $cart = Cart::create([
                            'user_id' => Auth::user()->id,
                            'jumlah_barang' => $this->jumlah,
                            'barang_id' => $this->itemID,
                            'sub_total' => $this->jumlah * $this->harga ,
                            // 'pemilik_id' => $this->pemilik_id,
                            'diskon' => $array_sum_diskon,
                        ]);
                       Alert::info('info', 'Berhasil Di Masukkan Ke Keranjang');
                        return redirect()->route('page.keranjang.create', ['Barang' => $this->itemID, 'id' => Str::random(10)]);
                    }
                }
            }
        } else {
           Alert::error('message', 'Maaf Silahkan Login');
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
        if ($this->cekStock($id)) {
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
    public $email,$ket;
    public function createUlasan(){
        $this->validate([
            'email'=> ['email', 'required'],
            'ket'=> ['required'],
        ]);
        ulasan::create([
            'user_id'=> Auth::user()->id,
            'barang_id'=> $this->itemID,
            'email'=> $this->email,
            'ket'=> $this->ket,
        ]);
        return redirect()->route('Produk-list', ['id' => $this->itemID, 'name' => $this->nameID]);
        $this->email = '';
        $this->ket = '';
    }
}
