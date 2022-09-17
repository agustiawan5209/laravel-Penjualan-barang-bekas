<?php

namespace App\Http\Livewire\Admin;

use App\Models\Payment;
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
        $transaksi = Transaksi::whereMonth('created_at', $arr['month'])->where('status', '=', '0')->get();
        // dd($transaksi);
        // $this->notify();
        $potongan = Transaksi::whereMonth('created_at', $arr['month'])->where('status', '=','0')->sum('potongan');
        $total = Transaksi::whereMonth('created_at', $arr['month'])->where('status', '=','0')->sum('total');
        // $user = User::all();
        $total_penjualan_bulan_ini =  $total - $potongan;

        // Hitung user
        $jumlah_user = User::where('role_id', '!=' , 'SuperAdmin')->count();

        // Penjualan Tahun Ini
        $potongan = Transaksi::whereYear('created_at', $arr['year'])->where('status', '=','0')->sum('potongan');
        $total = Transaksi::whereYear('created_at', $arr['year'])->where('status', '=','0')->sum('total');

        $total_penjualan_tahun_ini = $total - $potongan;
        return view('livewire.admin.dashboard', [
            'total_penjualan_bulan_ini'=> $total_penjualan_bulan_ini,
            'pesan' => PesanChat::latest()->first(),
            'user' => User::latest()->first(),
            'payment' => Payment::latest()->first(),
            'jumlah_user'=> $jumlah_user,
            'total_penjualan_tahun_ini'=> $total_penjualan_bulan_ini,
        ]);
    }
    public function notify($id, $type)
    {
        $user = User::find($id);
        if($type == 1){
            $notification = $user->notifications()->update(['read_at' => now()]);
        }else if($type == 2){
           $payment = Payment::find($id);
           $notification = $payment->notifications()->update(['read_at' => now()]);
       }
        if ($notification) {
            // $notification->markAsRead();
            return redirect()->back();
        }
    }
}
