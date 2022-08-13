<?php

namespace App\Http\Livewire\Admin\Promo;

use App\Models\Barang;
use App\Models\Category;
use App\Models\Promo;
use Carbon\Carbon;
use Livewire\Component;

class PromoKadaluarsa extends Component
{

    public $tambahItem = false, $itemID, $hapusItem = false, $editItem = false;

    public $kode_promo, $category_id, $barang_id, $promo, $tgl_mulai, $tgl_kadaluarsa, $max_user, $use_user;
    public function render()
    {
        $carbon = Carbon::now()->format('Y-m-d');
        $promo = Promo::all();
        // foreach($promo as $item){
            $promo = Promo::whereDate('tgl_kadaluarsa', '<' ,$carbon)->get();
        // }
        return view('livewire.admin.promo.promo-kadaluarsa',[
            'dataPromo'=> $promo,
            'category'=> Category::all(),
            'barang'=> Barang::all(),
        ]);
    }
    public function CloseAllModal()
    {
        $this->tambahItem = false;
        $this->hapusItem = false;
        $this->editItem = false;
    }
    public function editModal($id)
    {

        $promo = Promo::find($id);
        // dd($promo);
        $this->itemID = $promo->id;
        $this->kode_promo = $promo->kode_promo;
        $this->category_id = $promo->category_id;
        $this->barang_id = $promo->barang_id;
        $this->max_user = $promo->max_user;
        $this->use_user = $promo->use_user;
        $this->promo = $promo->promo;
        $this->tgl_mulai = $promo->tgl_mulai;
        $this->tgl_kadaluarsa = $promo->tgl_kadaluarsa;
        $this->editItem = true;
    }
    public function edit($id)
    {
        $this->validate([
            'kode_promo' => 'required',
            'promo' => 'required',
            'tgl_mulai' => 'required',
            'tgl_kadaluarsa' => 'required',
            'max_user' => 'required',
        ]);
        $barang = $this->barang_id == "--" ?  $this->barang_id : null;
        // dd([
        //     $this->barang_id,
        //     $this->category_id
        // ]);
        $promo = Promo::where('id', $id)->update([
            'kode_promo' => $this->kode_promo,
            'category_id' => $this->category_id == null ? null : $this->category_id,
            'barang_id' => $this->barang_id == null ? null : $this->barang_id,
            'max_user' => $this->max_user,
            'use_user' => $this->use_user,
            'promo' => $this->promo,
            'tgl_mulai' => $this->tgl_mulai,
            'tgl_kadaluarsa' => $this->tgl_kadaluarsa,
        ]);

        session()->flash('message', $promo ? "Promo Berhasil Di Edit" : "Promo Gagal Di Edit");
        $this->CloseAllModal();
    }
    public function hapusModal($id)
    {
        $promo = Promo::find($id);
        $this->itemID = $promo->id;
        $this->hapusItem = true;
    }
    public function hapus($id)
    {
        $promo = Promo::find($id)->delete();
        session()->flash('message', $promo ? "Promo Berhasil Di Hapus" : "Promo Gagal Di Hapus");
        $this->CloseAllModal();
    }
}
