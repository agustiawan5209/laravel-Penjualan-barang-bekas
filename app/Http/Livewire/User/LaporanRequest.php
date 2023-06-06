<?php

namespace App\Http\Livewire\User;

use Auth;
use App\Models\Barang;
use Livewire\Component;
use App\Models\Transaksi;
use App\Models\RequestBarang;

class LaporanRequest extends Component
{
    public function render()
    {
        $transaksi = Transaksi::all();
        $req = RequestBarang::where('user_id', Auth::user()->id)->get();

        $BarangReq = Barang::whereHas('requestbarang', function($query){
            $query->where('user_id', Auth::user()->id);
        })->get();
        $data = [];
        foreach($BarangReq as $key=> $value){
            $data[] = $value->id;
        }
        $transaksi = Transaksi::with(['barang'])->whereIn('barang_id', $data)->get();
        // dd($transaksi);
        return view('livewire.user.laporan-request',[
            'transaksi'=>$transaksi
        ]);
    }
}
