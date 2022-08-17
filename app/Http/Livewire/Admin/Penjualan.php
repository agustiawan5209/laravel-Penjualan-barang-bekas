<?php

namespace App\Http\Livewire\Admin;

use App\Models\Payment;
use Livewire\Component;

class Penjualan extends Component
{
    public $search = "";
    public $row = 7;
    public $ItemID;
    public $tgl_pengiriman, $harga, $kode_pos,$kabupaten,$detail_alamat,$status;
    public $ongkirItem = false;
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

        return view('livewire.admin.penjualan', compact('transaksi', 'COD'),[
            'transaksi_terbaru' => Payment::orderByDesc('id')->paginate(5),
            'transaksi_tertunda' => Payment::where('payment_status', 'like', '%pending%')->paginate(5),
        ]);
    }
    public function createOngkir($id){
        $payment = Payment::where('id', '=', $id)->get();
        // dd($payment);
        foreach($payment as $item){
            $this->item = $item->item_details;
            $this->kode_pos = $item->kode_pos;
            $this->kabupaten = $item->kabupaten;
            $this->detail_alamat = $item->detail_alamat;
        }
        $this->ongkirItem = true;
    }
}
