<?php

namespace App\Http\Livewire\Admin;

use App\Models\ongkir;
use App\Models\Payment;
use Livewire\Component;

class Penjualan extends Component
{
    public $search = "";
    public $row = 7;
    public $ItemID;
    public $tgl_pengiriman, $harga, $kode_pos,$kabupaten,$detail_alamat,$status,$transaksi_id, $item_details;
    public $ongkirItem = false, $itemDetail = false;
    public function render()
    {
        $transaksi = Payment::where('payment_type', 'BANK')->paginate($this->row);
        if ($this->search != null) {
            $transaksi = Payment::where('payment_type', 'BANK')->where('number', 'like', '%' . $this->search . '%')->paginate($this->row);
        }
        $COD = Payment::where('payment_type', 'COD')->paginate($this->row);
        if ($this->search != null) {
            $COD = Payment::where('payment_type', 'COD')->where('number', 'like', '%' . $this->search . '%')->paginate($this->row);
        }
        // Cek Status Ongkir

        return view('livewire.admin.penjualan', compact('transaksi', 'COD'),[
            'transaksi_terbaru' => Payment::orderByDesc('id')->paginate(5),
            'transaksi_tertunda' => Payment::where('payment_status', 'like', '%pending%')->paginate(5),
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
            $this->status = '1';
        }
        $ongkir = ongkir::where('transaksi_id', '=', $this->transaksi_id)->update([
            'tgl_pengiriman'=> $this->tgl_pengiriman,
            'harga'=> $this->harga,
            'status'=> $this->status,
        ]);
        $this->ongkirItem = false;
        $this->detailOngkir($this->transaksi_id);
        $this->clearItem();
        session()->flash('message', $ongkir ? 'Data Pengiriman Berhasil Di Lakukan' : 'Pengiriman Gagal Di Tambah');
    }
    public function detailOngkir($transaksi_id){
        $ongkir = ongkir::where('id', '=', $transaksi_id)->get();

        foreach($ongkir  as $item){
            $this->kode_pos = $item->kode_pos;
            $this->kabupaten = $item->kabupaten;
            $this->detail_alamat = $item->detail_alamat;
            $this->transaksi_id = $item->transaksi_id;
            $this->tgl_pengiriman = $item->tgl_pengiriman;
            $this->harga = $item->harga;
            $this->status = $item->status;
            $payment = Payment::where('transaksi_id', '=', $item->transaksi_id)->get();
            foreach($payment as $item){
                $this->item_details = $item->item_details;
            }
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

}
