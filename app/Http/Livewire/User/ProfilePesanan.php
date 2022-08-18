<?php

namespace App\Http\Livewire\User;

use App\Models\ongkir;
use App\Models\Payment as Pembayaran;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ProfilePesanan extends Component
{
    public $search = "";
    public $row = 7;
    public $min_date , $max_date;
    public $ItemID;
    public $tgl_pengiriman, $harga, $kode_pos,$kabupaten,$detail_alamat,$status,$transaksi_id, $user_name,$item_details;
    public $ongkirItem = false, $itemDetail = false, $konfirmasiItem = false;
    public function mount()
    {
        abort_if(Auth::check() == false, 403);
    }
    public function render()
    {
        $produk =  Pembayaran::where('user_id', '=', Auth::user()->id)->get();
        foreach ($produk as $key => $value) {
            $belum_terkirim = ongkir::where('status', '=', '1')
                ->where('transaksi_id', '=', $value->transaksi_id)
                ->get();
            $terkirim = ongkir::where('status', '=', '2')
                ->where('transaksi_id', '=', $value->transaksi_id)
                ->get();
            $diterima = ongkir::where('status', '=', '3')
                ->where('transaksi_id', '=', $value->transaksi_id)
                ->get();
        }
        $belum_konfirmasi = Pembayaran::where('user_id', '=', Auth::user()->id)
        ->where('payment_status', '=', '2')->orderBy('id', 'desc')
        ->get();

        return view('livewire.user.profile-pesanan', [
            'produk' => $produk,
            'terkirim' => $terkirim,
            'diterima' => $diterima,
            'belum_terkirim' => $belum_terkirim,
            'belum_konfirmasi'=> $belum_konfirmasi,
        ]);
    }
    public function batalkanPemesanan($id){
        $ongkir = Pembayaran::where('id', '=', $id)->get();
        dd($ongkir);
        foreach($ongkir as $item){
            // $payment = Pembayaran::where('transaksi_id', '=', $item->transaksi_id)->update([
            //     'payment_status'=> '1',
            // ]);
        }
        session()->flash('message', 'Pembayaran Di Batalkan');
    }
}
