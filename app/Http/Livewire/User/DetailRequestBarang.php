<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\RequestBarang;

class DetailRequestBarang extends Component
{

    public $itemid;
    public function mount($id){
        $this->itemid = $id;
    }
    public function render()
    {
        $barang = RequestBarang::findOrFail($this->itemid);
        return view('livewire.user.detail-request-barang',[
            'barang'=>$barang,
        ]);
    }
    public function kembali(){
        return back();
    }
}
