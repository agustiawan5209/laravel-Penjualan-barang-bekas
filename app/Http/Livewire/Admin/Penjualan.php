<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class Penjualan extends Component
{
    public $page = 'Penitipan';
    public function mount(){
        $this->page;
    }
    public function render()
    {
        return view('livewire.admin.penjualan');
    }
}
