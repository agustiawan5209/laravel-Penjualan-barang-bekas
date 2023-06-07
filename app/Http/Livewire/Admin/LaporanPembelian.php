<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Pembelian;

class LaporanPembelian extends Component
{
    public $date;
    public $tgl_awal, $tgl_akhir;
    public function render()
    {
        $pembelian = Pembelian::orderBy('id', 'asc')
            ->get();
        if ($this->tgl_awal != null && $this->tgl_akhir != null) {
            $pembelian = Pembelian::orderBy('id', 'asc')
                ->whereBetween('created_at', [$this->tgl_awal, $this->tgl_akhir])
                ->get();
        }
        return view('livewire.admin.laporan-pembelian', [
            'pembelian' => $pembelian
        ]);
    }
}
