<?php

namespace App\Http\Livewire\Page;

use App\Models\Cart;
use App\Models\Payment as Pembayaran;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Services\Midtrans\CreateSnapTokenService;

class Payment extends Component
{
    public function render()
    {
        return view('livewire.page.payment');
    }
}
