<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class LaporanPembelian extends Component
{
    public $date;
    public $tgl_awal, $tgl_akhir;
    public function render()
    {

        return view('livewire.admin.laporan-pembelian');
    }
}
