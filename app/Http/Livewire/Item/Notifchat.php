<?php

namespace App\Http\Livewire\Item;

use App\Models\Notifikasi;
use App\Models\Payment;
use App\Models\PesanChat;
use Carbon\Carbon;
use Livewire\Component;
use App\Models\RequestBarang;

class Notifchat extends Component
{
    public function render()
    {
        $carbon = Carbon::now()->format("H");
        // dd($carbon);
        $count_notif = Notifikasi::whereNull('read_at')->get();
        return view('livewire.item.notifchat',[
            'notif'=> $count_notif,
            'chat'=> PesanChat::latest()->first(),
        ]);
    }
}
