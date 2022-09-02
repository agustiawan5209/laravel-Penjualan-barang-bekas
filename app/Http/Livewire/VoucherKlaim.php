<?php

namespace App\Http\Livewire;

use App\Models\Voucher;
use Livewire\Component;

class VoucherKlaim extends Component
{
    public function render()
    {
        $voucher = Voucher::all();
        return view('livewire.voucher-klaim', [
            'voucher'=> $voucher,
        ]);
    }
}
