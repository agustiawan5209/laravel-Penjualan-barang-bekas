<?php

namespace App\Http\Livewire;

use App\Models\UserVoucher;
use App\Models\Voucher;
use Auth;
use Livewire\Component;

class VoucherKlaim extends Component
{
    public $item;
    public function mount($item){
        $this->item = $item;
    }
    public function render()
    {
        // dd($this->item);
        $voucher = [];
        for ($i=0; $i < count($this->item); $i++) {
            $voucher[]= Voucher::where('barang_id', $this->item[$i])->first();
        }
        // dd($voucher);
        return view('livewire.voucher-klaim', [
            'voucher'=> $voucher,
        ]);
    }
    public function KlaimVoucher($id){
        $voucher = Voucher::where('id', $id)->first();
        UserVoucher::create([
            'user_id'=> Auth::user()->id,
            'voucher_id'=>$voucher->barang_id,
        ]);
        return redirect()->route('Kirim-Pembayaran')->with('message', 'Voucher Berhasil Digunakan');;
    }
}
