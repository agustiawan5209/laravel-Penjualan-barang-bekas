<?php

namespace App\Http\Livewire\User;

use App\Models\Cart;
use App\Models\Toko;
use App\Models\Barang;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class JualTitip extends Component
{
    use WithFileUploads;
    public $TambahBarangItem = false;
    public $foto;
    public $nama_produk;
    public $harga_produk;
    public $deskripsi_produk;
    public $kategori_produk;
    public $jumlah_stock;
    public $updateFoto;
    public $addItem = false, $editItem = false, $hapusItem = false, $itemID, $kategoriItem = false;
    public function render()
    {
        $toko = Toko::where('user_id', '=', Auth::user()->id)->get();
        $keranjang_cek = Cart::where('user_id', '=', Auth::user()->id)->get();
        return view('livewire.user.jual-titip', [
            'kategory' => Category::all(),
            'barang' => Barang::where('user_id', '=', Auth::user()->id)->get(),
            'cek_toko' => $toko,
            'jumlah_keranjang' => $keranjang_cek->count(),
        ]);
    }
    public function TambahModal()
    {
        $this->TambahBarangItem = true;
    }
    public function TambahBarang()
    {
         $this->validate([
            'foto' => 'image|max:2040',
            'nama_produk' => 'required',
            'harga_produk' => 'required',
            'deskripsi_produk' => 'required',
            'kategori_produk' => 'required',
            'jumlah_stock' => 'required',
        ]);
        $filename = $this->foto->getClientOriginalName();
        $explode = explode('.', $filename);
        $randomize = md5($filename) . '.' . $explode[1];
        // dd($randomize);
        $this->foto->storeAs('upload', $randomize);
        $penitipan = Barang::create([
            'user_id' => Auth::user()->id,
            'foto_produk' => $randomize,
            'nama_produk' => $this->nama_produk,
            'harga' => $this->harga_produk,
            'stock' => $this->jumlah_stock,
            'deskripsi' => $this->deskripsi_produk,
            'categories' => $this->kategori_produk,
        ]);
        session()->flash('message', $penitipan ? 'Berhasil Di Tambah' : 'Gagal Di Tambah');
        $this->TambahBarangItem = false;
    }
    public function editModal($id)
    {
        $barang = Barang::find($id);
        $this->itemID = $barang->id;
        $this->foto = $barang->foto_produk;
        $this->nama_produk = $barang->nama_produk;
        $this->harga_produk = $barang->harga;
        $this->deskripsi_produk = $barang->deskripsi;
        $this->kategori_produk = $barang->categories;
        $this->jumlah_stock = $barang->stock;
        $this->editItem = true;
    }

    public function EditBarang($id)
    {
        $randomize = '';
        $getIDfoto = Barang::find($id);
        $namaFoto = $getIDfoto->foto_produk;
        $randomize = $namaFoto;
        if ($this->updateFoto != null) {
            // dd($this->updateFoto);
            if (Storage::exists(public_path('upload/' . $namaFoto))) {
                Storage::delete(public_path('upload/' . $namaFoto));
            }
            $filename = $this->updateFoto->getClientOriginalName();
            $explod = explode('.', $filename);
            $randomize = md5($filename) . '.' . $explod[1];
            $this->updateFoto->storeAs('upload', $randomize);
        }

        $this->validate([
            // 'foto' => 'image|max:2040',
            'nama_produk' => 'required',
            'harga_produk' => 'required',
            'deskripsi_produk' => 'required',
            'kategori_produk' => 'required',
        ]);

        // dd($randomize);
        // melakukan return foto
        $barang = Barang::where('id', $id)->update([
            'foto_produk' => $randomize,
            'nama_produk' => $this->nama_produk,
            'harga' => $this->harga_produk,
            'stock' => $this->jumlah_stock,
            'deskripsi' => $this->deskripsi_produk,
            'categories' => $this->kategori_produk,
        ]);
        session()->flash('message', $barang ? 'Berhasil Di Update' : 'Gagal Di Update');
        $this->editItem = false;
        $this->alert = true;
    }

    public function hapusModal($id)
    {
        $this->hapusItem = true;
        $this->itemID = Barang::find($id)->id;
    }
    public function HapusBarang($id)
    {
        $barang = Barang::find($id);
        $hapus = $barang->delete();
        session()->flash('message', $hapus ? 'Data Berhasil Di Hapus' : 'Data Barang Gagal Di Hapus');
        $this->hapusItem = false;
        $this->itemID = null;
        $this->alert = true;
    }
}
