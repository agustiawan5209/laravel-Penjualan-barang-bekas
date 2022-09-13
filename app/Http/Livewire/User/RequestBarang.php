<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\RequestBarang as ModelsRequestBarang;

class RequestBarang extends Component
{
    use WithFileUploads;
    public $foto_produk, $updatefoto, $nama_produk, $Alamat, $deskripsi, $categories, $harga;
    public $addItem = false, $editItem = false, $hapus = false;
    public $itemID;
    public $row = 10;
    public $search = "";
    public $user_id;

    public function mount()
    {
        $this->user_id = Auth::user()->id;
    }
    public function render()
    {
        $barang = ModelsRequestBarang::where('user_id', '=', $this->user_id)->paginate($this->row);
        if ($this->search != null) {
            $barang = ModelsRequestBarang::where('user_id', '=', $this->user_id)
                ->where('nama_produk', 'like', '%' . $this->search . '%')
                ->paginate($this->row);
        }
        return view('livewire.user.request-barang', [
            'barang' => $barang,
        ]);
    }
    public function TambahModal()
    {
        $this->addItem = true;
    }

    public function Tambah()
    {
        $this->validate([
            'foto_produk' => "image|max:2040",
            'nama_produk' => 'required',
            'deskripsi' => 'required',
            'Alamat' => 'required',
            'categories' => 'required',
            'harga' => 'required',
        ]);
        dd($this->Alamat);
        if ($this->foto_produk != null) {
            $nama = $this->foto_produk->getClientOriginalName();
            $explode = explode(".", $nama);
            $randomName = md5($explode[0] . "." . $explode[1]);
            $this->foto_produk->storeAs('upload', $randomName);
        }
        // dd($this->deskripsi);
        ModelsRequestBarang::create([
            'user_id' => $this->user_id,
            'foto_produk' => $randomName,
            'nama_produk' => $this->nama_produk,
            'Alamat' => $this->Alamat,
            'harga' => $this->harga,
            'deskripsi' => $this->deskripsi,
            'categories' => $this->categories,
            'status' => "1",
        ]);
        session()->flash("message", 'Berhasil Di Tambah');
    }
    public function editModal($id)
    {
        $barang = ModelsRequestBarang::find($id);
        $this->itemID = $barang->id;
        $this->nama_produk = $barang->nama_produk;
        $this->foto_produk = $barang->foto_produk;
        $this->deskripsi = $barang->deskripsi;
        $this->harga = $barang->harga;
        $this->Alamat = $barang->Alamat;
        $this->categories = $barang->categories;
        $this->addItem = true;
    }
    public function edit($id)
    {
        $randomize = '';
        $getIDfoto = ModelsRequestBarang::find($id);
        $namaFoto = $getIDfoto->foto_produk;
        $randomize = $namaFoto;
        if ($this->updatefoto != null) {
            // dd($this->updateFoto);
            if (Storage::exists(public_path('upload/' . $namaFoto))) {
                Storage::delete(public_path('upload/' . $namaFoto));
            }
            $filename = $this->updatefoto->getClientOriginalName();
            $explod = explode('.', $filename);
            $randomize = md5($filename) . '.' . $explod[1];
            $this->updatefoto->storeAs('upload', $randomize);
        }

        $this->validate([
            // 'foto_produk'=> "image|max:2040",
            'nama_produk' => 'required',
            'deskripsi' => 'required',
            'Alamat' => 'required',
            'categories' => 'required',
            'harga' => 'required|integer',
        ]);

        $barang = ModelsRequestBarang::where('id', $id)->update([
            'foto_produk' => $randomize,
            'nama_produk' => $this->nama_produk,
            'harga' => $this->harga,
            'deskripsi' => $this->deskripsi,
            'categories' => $this->categories,
            'Alamat' => $this->Alamat,
        ]);
        session()->flash('message', $barang ? 'Berhasil Di Update' : 'Gagal Di Update');
        $this->addItem = false;
    }
    public function deleteModal($id)
    {
        $barang = ModelsRequestBarang::find($id);
        $this->itemID = $barang->id;
        $this->hapus = true;
    }
    public function delete($id)
    {
        $barang = ModelsRequestBarang::find($id)->delete();
        session()->flash('message', $barang ? 'Berhasil Di Hapus' : 'Gagal Di Hapus');
        $this->hapus = false;
    }
}
