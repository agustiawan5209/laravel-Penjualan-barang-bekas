<?php

namespace App\Http\Livewire\Admin;

use App\Models\ongkir;
use App\Models\Payment;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Penjualan extends Component
{
    public $search = "";
    public $row = 7;
    public $min_date , $max_date;
    public $ItemID;
    public $tgl_pengiriman, $harga, $kode_pos,$kabupaten,$detail_alamat,$status,$transaksi_id, $user_name,$item_details;
    public $ongkirItem = false, $itemDetail = false, $konfirmasiItem = false;
    public function render()
    {
        $transaksi = Payment::where('payment_status', '=', '3')
        ->where('payment_type', 'BANK')->paginate($this->row);
        if ($this->search != null) {
            $transaksi = Payment::where('payment_status', '=', '3')
            ->where('payment_type', 'BANK')->where('number', 'like', '%' . $this->search . '%')->paginate($this->row);
        }
        if($this->min_date != null && $this->max_date != null){
            $transaksi = Payment::where('payment_status', '=', '3')
            ->where('payment_type', 'BANK')
            ->whereBetween('tgl_transaksi', [$this->min_date , $this->max_date])
            ->paginate($this->row);
        }
        // COD
        $COD = Payment::where('payment_type', 'COD')->paginate($this->row);
        if ($this->search != null) {
            $COD = Payment::where('payment_type', 'COD')->where('number', 'like', '%' . $this->search . '%')->paginate($this->row);
        }
        // Cek Status Ongkir
        $belum_konfirmasi = Payment::where('payment_status', '=', '2')->orderBy('id', 'desc')->get();
        return view('livewire.admin.penjualan', compact('transaksi', 'COD'),[
            'transaksi_terbaru' => Payment::orderByDesc('id')->paginate(5),
            'transaksi_tertunda' => Payment::where('payment_status', 'like', '%pending%')->paginate(5),
            'belum_konfirmasi'=> $belum_konfirmasi,
        ]);
    }
    public function createOngkir($id){
        $payment = Payment::where('id', '=', $id)->get();
        // dd($payment);
        foreach($payment as $item){
            $this->item_details = $item->item_details;
            $this->transaksi_id = $item->transaksi_id;
        }
        $ongkir = ongkir::where('transaksi_id', '=', $this->transaksi_id)->get();
        foreach ($ongkir as $item) {
            $this->kode_pos = $item->kode_pos;
            $this->kabupaten = $item->kabupaten;
            $this->detail_alamat = $item->detail_alamat;
        }
        $this->ongkirItem = true;
    }
    public function create(){
        $this->validate([
            'tgl_pengiriman'=> 'required',
            'harga'=> 'required',
            'status'=> 'required'
        ]);
        if($this->status == null){
            $this->status = '2';
        }
        $ongkir = ongkir::where('transaksi_id', '=', $this->transaksi_id)->update([
            'tgl_pengiriman'=> $this->tgl_pengiriman,
            'harga'=> $this->harga,
            'status'=> $this->status,
        ]);
        $this->ongkirItem = false;
        $this->detailOngkir($this->transaksi_id);
        // $this->clearItem();
        session()->flash('message', $ongkir ? 'Data Pengiriman Berhasil Di Lakukan' : 'Pengiriman Gagal Di Tambah');
    }
    public function detailOngkir($transaksi_id){
        $ongkir = ongkir::find($transaksi_id);

            $this->kode_pos = $ongkir->kode_pos;
            $this->kabupaten = $ongkir->kabupaten;
            $this->detail_alamat = $ongkir->detail_alamat;
            $this->transaksi_id = $ongkir->transaksi_id;
            $this->tgl_pengiriman = $ongkir->tgl_pengiriman;
            $this->harga = $ongkir->harga;
            $this->status = $ongkir->status;
            $payment = Payment::where('transaksi_id', '=', $ongkir->transaksi_id)->get();
            foreach($payment as $item){
                $this->item_details = $item->item_details;
            }
        $this->itemDetail = true;
    }
    public function clearItem(){
        $this->item_details = "";
        $this->kode_pos = "";
        $this->kabupaten = '';
        $this->detail_alamat = '';
        $this->transaksi_id = '';
        $this->tgl_pengiriman = '';
        $this->harga = '';
        $this->status = '';
    }
    public function konfirmasi_pesanan($id){
        $payment = Payment::find($id);
        $this->ItemID = $payment->id;
        $this->transaksi_id = $payment->transaksi_id;
        $this->user_name = $payment->user->name;
        $this->item_details = $payment->item_details;
        $this->konfirmasiItem = true;
    }
    public function konfirmasi($id){
        $payment = Payment::where("id", $id)->update([
            'payment_status'=> '3',
        ]);
        session()->flash('message', 'Berhasil Di Konfirmasi');
        $this->konfirmasiItem = false;
        $this->ItemID = '';
        $this->transaksi_id = '';
        $this->user_name = '';
        $this->item_details = '';
    }

}
