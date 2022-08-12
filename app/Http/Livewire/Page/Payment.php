<?php

namespace App\Http\Livewire\Page;

use App\Models\Cart;
use App\Models\Payment as Pembayaran;
use App\Models\PromoUser;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Services\Midtrans\CreateSnapTokenService;

class Payment extends Component
{
    public function render()
    {
        return view('livewire.page.payment');
    }

    public function delete($id)
    {
        $cart  = Cart::where('user_id', '=', Auth::user()->id)->where('id', $id)->delete();
        session()->flash('message', 'Berhasil Di Hapus');
    }
}
