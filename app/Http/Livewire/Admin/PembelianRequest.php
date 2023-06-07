<?php

namespace App\Http\Livewire\Admin;

use App\Models\Barang;
use Livewire\Component;
use App\Models\Category;
use App\Models\Pembelian;
use App\Models\FotoBarang;
use App\Models\RequestBarang;
use Livewire\WithFileUploads;
use App\Models\MetodePembayaran;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Console\View\Components\Alert;

class PembelianRequest extends Component
{
    use WithFileUploads;
    public $itemId, $requestVar = false;
    public $bukti_transaksi, $kode_transaksi, $sub_total, $status, $foto, $user_id;
    public $nama_produk, $harga_produk, $deskripsi_produk, $kategori_produk, $updateFoto, $stok,$jumlah = 1;

    public function mount()
    {
        if (Request::exists('slug')) {
            $this->itemId = Request::input('slug');
            $this->requestVar = true;
            $reqBarang = RequestBarang::find($this->itemId);
            $this->foto = $reqBarang->foto_produk;
            $this->nama_produk = $reqBarang->nama_produk;
            $this->harga_produk = $reqBarang->harga;
            $this->deskripsi_produk = $reqBarang->deskripsi;
            $this->stok = $reqBarang->stok;
            $this->user_id = $reqBarang->user_id;
        }
    }
    public function render()
    {

        return view('livewire.admin.pembelian-request',[
            'kategory'=> Category::all(),
            'metodebayar'=> MetodePembayaran::where('user_id', $this->user_id)->get(),
        ]);
    }

    public function hitungTotal(){
        if($this->jumlah >= $this->stok){
            $this->jumlah = $this->stok;
        }
        $this->sub_total = intval($this->harga_produk) * intval($this->jumlah);
    }
    public function transaksi_id(){
        $permitted_chars = '01234567891011223344556677889900_abcdefghijklmnopqrstuvwxyz_ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        do {
            $transaksi_id = substr(str_shuffle($permitted_chars), 0, 8);
        } while (Pembelian::where('kode_transaksi', '=', $transaksi_id)->first());
        return $transaksi_id;
    }
    public function create()
    {
        $valid = $this->validate([
            // 'foto' => 'image|max:2040',
            'nama_produk' => 'required',
            'harga_produk' => 'required',
            'deskripsi_produk' => 'required',
            'kategori_produk' => 'required',
            'stok' => 'required',
            'bukti_transaksi'=> 'image|max:2040',
            'jumlah'=> 'required|numeric',
            'sub_total'=> 'required|numeric',
        ]);
        $randomize = null;
        if ($this->requestVar) {
            $randomize = $this->foto;
        }


        // melakukan return foto
        $barang = Barang::create([
            'user_id' => Auth::user()->id,
            'foto_produk' => $randomize,
            'nama_produk' => $this->nama_produk,
            'harga' => $this->harga_produk,
            'deskripsi' => $this->deskripsi_produk,
            'categories' => $this->kategori_produk,
            'stock' => $this->jumlah,
        ]);

        $name = md5($this->bukti_transaksi->getClientOriginalName());
        $this->bukti_transaksi->storeAs('upload', $name);

        $pembelian = Pembelian::create([
            'bukti_transaksi'=> $name,
            'barang_id'=> $barang->id,
            'request_id'=> $this->itemId,
            'kode_transaksi'=> $this->transaksi_id(),
            'subtotal'=> $this->sub_total,
            'jumlah'=> $this->jumlah,
            'status'=> '1',
        ]);
        FotoBarang::create([
            'barang_id' => $barang->id,
            'foto' => $randomize,
            'default' => 'yes',
            'jenis' => '1',
        ]);
        $reqBarang = RequestBarang::find($this->itemId);
        $reqBarang->update(['status', '3']);


       return redirect()->route('Pembelian-Index')->with('success', 'Berhasil');
    }



}
