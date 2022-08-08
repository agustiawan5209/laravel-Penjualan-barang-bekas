<?php

namespace App\Http\Livewire\Admin;

use App\Models\Barang;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class Penitipan extends Component
{
    use WithPagination;
    use WithFileUploads;
    public $search = "";
    public $row = 10;
    public $alert = false;
    // Modal Item
    public $detailItem = false, $itemID;
    // item field table barang
    public $user_name,$user_email,$foto, $nama_produk, $harga_produk, $deskripsi_produk, $kategori_produk, $updateFoto;
    public $categoryAll;

    public function render()
    {
        $barang = Barang::paginate($this->row);
        if ($this->search != null) {
            $barang = Barang::where('nama_produk', 'like', '%' . $this->search . '%')->paginate($this->row);
        }
        $this->categoryAll = Category::all();
        return view('livewire.admin.penitipan', [
            'barang' => $barang,
            'kategory' => Category::all(),
        ]);
    }
    public function DetailModal($id)
    {
        $barang = Barang::find($id);
        $this->itemID = $barang->id;
        $this->user_name = $barang->user->name;
        $this->user_email = $barang->user->email;
        $this->foto = $barang->foto_produk;
        $this->nama_produk = $barang->nama_produk;
        $this->harga_produk = $barang->harga;
        $this->deskripsi_produk = $barang->deskripsi;
        $this->kategori_produk = $barang->category->kategory;
        $this->detailItem = true;
    }

}
