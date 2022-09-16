<?php

namespace App\Http\Livewire\User;

use App\Models\ongkir;
use Livewire\Component;
use App\Models\StatusOngkir;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use App\Models\Payment as Pembayaran;

class ProfilePesanan extends Component
{
    use WithFileUploads;
    public $search = "";
    public $row = 7;
    public $min_date , $max_date;
    public $ItemID;
    public $tgl_pengiriman, $harga, $kode_pos,$kabupaten,$detail_alamat,$status,$transaksi_id, $user_name,$item_details, $Ongkir_id;
    public $ongkirItem = false, $itemDetail = false, $konfirmasiItem = false;
    public function mount()
    {
        abort_if(Auth::check() == false, 403);
    }
    public function render()
    {
        $terkirim = '';
        $diterima = '';
        $belum_konfirmasi = '';
        $belum_terkirim = '';
        $produk =  Pembayaran::where('user_id', '=', Auth::user()->id)->get();
        if($produk->count() > 0){
            foreach ($produk as $key => $value) {
                $belum_terkirim = ongkir::where('status', '=', '1')
                    ->where('transaksi_id', '=', $value->transaksi_id)
                    ->orderBy('id', 'desc')
                    ->get();

                $terkirim = ongkir::where('status', '=', '2')->orWhere('status' ,'=', '3')
                    ->where('transaksi_id', '=', $value->transaksi_id)
                    ->orderBy('id', 'desc')
                    ->get();
                $diterima = ongkir::where('status', '=', '4')
                    ->where('transaksi_id', '=', $value->transaksi_id)
                    ->orderBy('id', 'desc')
                    ->get();
            }
        }
        // if($terkirim == null){
        //     $terkirim = "";
        // }
        // dd($terkirim);
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
        // dd($ongkir);
        foreach($ongkir as $item){
            // $payment = Pembayaran::where('transaksi_id', '=', $item->transaksi_id)->update([
            //     'payment_status'=> '1',
            // ]);
        }
        session()->flash('message', 'Pembayaran Di Batalkan');
    }
    public function konfirmasi($id){
        $payment = ongkir::where("id", $id)->first();
        $payment->update([
            'status'=> '4',
        ]);
        StatusOngkir::create([
            'ongkir_id' => $payment->id,
            'ket' => "Pesanan Diterima User",
        ]);
        session()->flash('message', 'Berhasil Di Konfirmasi');
    }
    public $statusItem = false;
    public $post;
    public function statusongkir($id){
        $payment = Pembayaran::find($id);
        // dd($payment);
        $ongkir = ongkir::where('transaksi_id','=', $payment->transaksi_id)->first();
        $this->post =   StatusOngkir::where('ongkir_id', '=', $ongkir->id)->get();
        $this->statusItem = true;
    }
}
