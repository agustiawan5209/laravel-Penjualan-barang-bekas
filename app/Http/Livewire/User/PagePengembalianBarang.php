<?php

namespace App\Http\Livewire\User;

use App\Models\Payment;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class PagePengembalianBarang extends Component
{
    public function render()
    {
        $payment = Payment::where('user_id', Auth::user()->id)->get();
        return view('livewire.user.page-pengembalian-barang');
    }
}
