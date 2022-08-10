<?php

namespace App\Http\Livewire\User;

use App\Models\Payment as Pembayaran;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ProfilePesanan extends Component
{
    public function mount(){
        abort_if(Auth::check() == false, 403);
    }
    public function render()
    {
       $produk =  Pembayaran::where('user_id', '=', Auth::user()->id)->get();
        return view('livewire.user.profile-pesanan',[
            'produk'=> $produk,
        ]);
    }
}
