<?php

namespace App\Http\Livewire\Laporan;

use App\Models\Transaksi;
use Livewire\Component;

class Penjualan extends Component
{
    public $date = false;
    public $tgl_awal, $tgl_akhir;
    public function render()
    {
        $transaksi = Transaksi::whereNull('jenis_request')->get();
        if ($this->tgl_awal != null && $this->tgl_akhir != null) {
            $transaksi = Transaksi::whereBetween('tgl_transaksi', [$this->tgl_awal, $this->tgl_akhir])
                ->whereNull('jenis_request')
                ->get();
        }
        return view('livewire.laporan.penjualan', [
            'transaksi' => $transaksi
        ]);
    }
}
