<?php

namespace App\Http\Livewire\Item;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Payment;
use Livewire\Component;
use App\Models\PesanChat;
use App\Models\Transaksi;
use App\Models\Notifikasi;
use App\Models\RequestBarang;

class Notifchat extends Component
{
    public function render()
    {
        $carbon = Carbon::now()->format("H");
        // dd($carbon);
        $count_notif = Notifikasi::whereNull('read_at')->get();
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
        $payment = Payment::all();
        $countNotif = [];
        foreach($payment as $pay){
            foreach ($pay->unreadNotifications as $key => $value) {
                $countNotif = $value->id;
            }
        }
        $user = User::all();
        foreach($user as $pay){
            foreach ($pay->unreadNotifications as $key => $value) {
                $countNotif = $value->id;
            }
        }
        return view('livewire.item.notifchat',[
            'notif'=> $count_notif,
            'chat'=> PesanChat::latest()->first(),
            'total_penjualan_bulan_ini'=> $total_penjualan_bulan_ini,
            'pesan' => PesanChat::all(),
            'user' => User::all(),
            'payment' => Payment::all(),
            'jumlah_user'=> $jumlah_user,
            'total_penjualan_tahun_ini'=> $total_penjualan_bulan_ini,
            'countNotif'=>count($countNotif),
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
