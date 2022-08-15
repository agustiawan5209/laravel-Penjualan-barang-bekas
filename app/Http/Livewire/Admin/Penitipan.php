<?php

namespace App\Http\Livewire\Admin;

use App\Models\Barang;
use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
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
    public $user_name, $user_email, $foto, $nama_produk, $harga_produk, $deskripsi_produk, $kategori_produk, $updateFoto;
    public $categoryAll;

    public function render()
    {
        $barang = Barang::where('user_id', '!=', 1)->paginate($this->row);
        if ($this->search != null) {
            $barang = Barang::where('user_id', '!=', 1)->where('nama_produk', 'like', '%' . $this->search . '%')->paginate($this->row);
        }
        $this->categoryAll = Category::all();
        return view('livewire.admin.penitipan', [
            'barang' => $barang,
            'kategory' => Category::all(),
        ]);
    }
}
