<?php

namespace App\Http\Livewire\Admin;

use App\Models\Barang;
use App\Models\FotoBarang;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;

class PageTambahFoto extends Component
{
    use WithFileUploads;
    public $barang_id;
    public $foto_barang;
    public $itemAdd= false;
    public $default_foto ;
    public function mount($id){
        $this->barang_id = $id;
    }
    public function render()
    {
        $barang = Barang::find($this->barang_id);
        $fotoBarang = FotoBarang::where('barang_id', $barang->id)->where('jenis', '1')->get();
        // $this->foto_barang = $fotoBarang->foto;
        return view('livewire.admin.page-tambah-foto', [
            'barang'=> $barang,
            'fotoBarang'=> $fotoBarang,
        ]);
    }
    public function count(){
        $this->itemAdd = true;
    }
    public function tambahFoto()
    {
        $barang = Barang::find($this->barang_id);

        // dd($this->foto_barang, $this->default_foto);
        $randomize = $barang->nama_produk .'-'. $this->foto_barang->getClientOriginalName();
        FotoBarang::create([
            'barang_id'=> $this->barang_id,
            'foto'=> $randomize,
            'default'=> 'no',
            'jenis'=> '1',
        ]);

        $this->foto_barang->storeAs('upload', $randomize);
        $this->itemAdd = false;
        $this->foto_barang = null;

    }
    public function hapusFoto($id)
    {
        FotoBarang::find($id)->delete();
    }
    public function default_foto($id){
        FotoBarang::find($id)->update(['default'=> 'yes']);
        FotoBarang::whereNot('id', [$id])->where('jenis', '1')->update(['default'=> 'no']);
    }
}
