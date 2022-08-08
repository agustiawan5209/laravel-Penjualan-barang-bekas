<?php

namespace App\Http\Livewire\Page;

use App\Models\Cart;
use App\Models\Payment as Pembayaran;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Services\Midtrans\CreateSnapTokenService;

class Payment extends Component
{
    public $snapItem = false;
    public $snapToken = '';
    public $payment = '';
    public $produk;
    public function render()
    {

        $keranjang = Cart::where('user_id', '=', Auth::user()->id)->get();
        $keranjang = Cart::where('user_id', '=', Auth::user()->id)->get();
        $user_ID = Cart::select('user_id')->where('user_id', '=', Auth::user()->id)->first();
        $this->produk = Cart::where('user_id', '=', Auth::user()->id)->get();
        if ($keranjang->count() > 0) {

            $this->payment = Pembayaran::latest()->first();
            $this->snapToken = $this->payment->snap_token;

            if (empty($this->snapToken)) {
                // Jika snap token masih NULL, buat token snap dan simpan ke database
                $midtrans = new CreateSnapTokenService($this->payment, $user_ID->user_id, $keranjang);
                $this->snapToken = $midtrans->getSnapToken();
                $this->payment->snap_token = $this->snapToken;
                $this->payment->save();
            }
        }
        // dd($snapToken);'
        $sub_total = Cart::where('user_id', '=', Auth::user()->id)->sum('sub_total');
        return view('livewire.page.payment', [
            'keranjang' => $keranjang,
            'sub_total' => $sub_total
        ]);
    }

    public function delete($id)
    {
        $cart  = Cart::where('user_id', '=', Auth::user()->id)->where('id', $id)->delete();
        session()->flash('message', 'Berhasil Di Hapus');
    }
}
