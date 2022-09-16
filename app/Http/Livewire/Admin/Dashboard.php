<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use App\Models\PesanChat;
use App\Models\Transaksi;
use App\Notifications\InvoicePaid;
use Auth;
use Carbon\Carbon;

class Dashboard extends Component
{
    public function render()
    {
        $total_penjualan_bulan_ini = 0;
        $carbon = Carbon::now()->parse();
        $arr = $carbon->toArray();
        $transaksi = Transaksi::whereMonth('created_at', $arr['month'])->get();
        // dd($transaksi);
        // $this->notify();
        $potongan = Transaksi::whereMonth('created_at', '09')->where('status', '=','0')->sum('potongan');
        $total = Transaksi::whereMonth('created_at', '09')->where('status', '=','0')->sum('total');
        $total_penjualan_bulan_ini = $potongan + $total;
        return view('livewire.admin.dashboard', [
            'total_penjualan_bulan_ini'=> $total_penjualan_bulan_ini,
            'pesan' => PesanChat::latest()->first(),
            'user' => User::latest()->first(),
        ]);
    }
}
