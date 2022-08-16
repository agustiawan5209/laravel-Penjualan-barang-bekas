<?php

namespace App\Http\Livewire\Item;

use App\Models\Payment;
use Carbon\Carbon;
use Livewire\Component;
use App\Models\RequestBarang;

class Notifchat extends Component
{
    public function render()
    {
        $carbon = Carbon::now()->format("H");
        // dd($carbon);
        $count_notif = Payment::orderBy('id','desc')->paginate(3);
        return view('livewire.item.notifchat',[
            'notif'=> $count_notif,
        ]);
    }
}
