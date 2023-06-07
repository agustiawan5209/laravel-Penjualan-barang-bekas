<?php

namespace App\Http\Livewire\Admin;

use App\Models\Barang;
use Livewire\Component;
use App\Models\Category;
use App\Models\Pembelian;
use App\Models\FotoBarang;
use App\Models\RequestBarang;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PembelianForm extends Component
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
            $this->nama_produk = $reqBarang->nama_produk;
            $this->harga_produk = $reqBarang->harga;
            $this->deskripsi_produk = $reqBarang->deskripsi;
        }
    }
    public function render()
    {
        return view('livewire.admin.pembelian-form', [
            'kategory' => Category::all()
        ]);
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


       return redirect()->route('Pembelian-Index')->with('success', 'Berhasil');
    }
}
