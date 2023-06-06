<?php

namespace App\Http\Livewire\Laporan;

use Livewire\Component;
use App\Models\Transaksi;

class LaporanTitipPage extends Component
{
    public $date = false;
    public $tgl_awal, $tgl_akhir;
    public function render()
    {
        $transaksi = Transaksi::where('jenis_request', "Titip")->get();
        if($this->tgl_awal != null && $this->tgl_akhir != null){
            $transaksi = Transaksi::whereBetween('tgl_transaksi' ,[$this->tgl_awal, $this->tgl_akhir])
            ->where('jenis_request', "Titip")->get();
        }
        return view('livewire.laporan.laporan-titip-page', [
            'transaksi'=> $transaksi,
        ]);
    }
}
