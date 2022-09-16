<?php

namespace App\Http\Livewire\User;

use App\Models\Transaksi;
use Livewire\Component;

class DetailPesanan extends Component
{
    public $item;
    public $search='', $row = 10;
    public $modalItem = false;
    public function mount($item){
        $this->item = $item;
    }

    public function ModalReturn($id){
        $this->modalItem = true;
    }

    public function render()
    {
        $transaksi = Transaksi::where('ID_transaksi', '=', $this->item)->get();
        return view('livewire.user.detail-pesanan', compact('transaksi'));
    }
}
