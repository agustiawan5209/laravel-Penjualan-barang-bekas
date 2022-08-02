<?php

namespace App\Http\Livewire\Admin;

use App\Models\Barang;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class PageBarang extends Component
{
    use WithPagination;
    use WithFileUploads;
    public $search = "";
    public $row = 10;
    // Modal Item
    public $addItem = false, $editItem = false;
    // item field table barang
    public $foto, $nama_produk, $harga_produk, $deskripsi_produk, $kategori_produk;
    public function render()
    {
        $barang = Barang::paginate($this->row);
        if ($this->search != null) {
            $barang = Barang::where('nama_produk', 'like', '%' . $this->search . '%')->paginate($this->row);
        }

        return view('livewire.admin.page-barang', [
            'barang' => $barang,
        ]);
    }

    // fungsi Tutup Modal
    public function closeModal()
    {
        $this->addItem = false;
        $this->editItem = false;
    }
    // Fungsi Modal
    // Tampilkan Modal

    public function saved()
    {
        $this->render();
    }

    public function addingItem()
    {
        $this->addItem = true;
    }

    public function create()
    {
        $valid = $this->validate([
            'foto' => 'image|max:2040',
            // 'nama_produk' => 'required',
            // 'harga_produk' => 'required',
            // 'deskripsi_produk' => 'required',
            // 'kategori_produk' => 'required',
        ]);
        $filename = $this->foto->getClientOriginalName();
        $explod = explode('.', $filename);
        $randomize = md5($filename) . '.' . $explod[1];
        $this->foto->storeAs('upload', $randomize);
        // dd($randomize);
        // melakukan return foto
        $barang = Barang::create([
            'foto_produk' => $randomize,
            'nama_produk' => $this->nama_produk,
            'harga' => $this->harga_produk,
            'deskripsi' => $this->deskripsi_produk,
            'categories' => $this->kategori_produk,
        ]);
        if ($barang) {
            session()->flash('message', 'Berhasil Di Tambahkan');
            $this->addItem = false;
        }
    }

    // Mengedit File
    public function editModal($id)
    {
        $barang = Barang::find($id);
        $this->foto = $barang->foto_produk;
        $this->nama_produk = $barang->nama_produk;
        $this->harga_produk = $barang->harga;
        $this->deskripsi_produk = $barang->deskripsi;
        $this->kategori_produk = $barang->categories;
        $this->editItem = true;
    }
}
