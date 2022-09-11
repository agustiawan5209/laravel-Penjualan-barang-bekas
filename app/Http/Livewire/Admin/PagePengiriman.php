<?php

namespace App\Http\Livewire\Admin;

use App\Models\ongkir;
use App\Models\Payment;
use Carbon\Carbon;
use Livewire\Component;

class PagePengiriman extends Component
{
    public $row = 10, $search = "";
    public $itemDetail = false;
    public $ongkirItem = false;
    public $hapusItem = false;
    public $statusItem = false;
    public $ItemID;
    public $tgl_pengiriman, $harga, $kode_pos, $kabupaten, $detail_alamat, $status, $transaksi_id, $item_details;
    public $user;

    public function mount()
    {
        $this->tglPengiriman();
    }
    public function tglPengiriman()
    {
        $carbon = Carbon::now()->format('Y-m-d');
        $ongkir = ongkir::all();
        foreach ($ongkir as $item) {
            ongkir::where('tgl_pengiriman', '=', $carbon)->update([
                'status' => '2',
            ]);
        }
    }
    public function render()
    {
        $belum_terkirim = ongkir::where('status', '=', '1')->paginate($this->row);
        if ($this->search != null) {
            $belum_terkirim =  ongkir::where('transaksi_id', 'like', '%' . $this->search . '%')
                ->where('status', '=', '1')->paginate($this->row);
        }
        $terkirim = ongkir::where('status', '=', '2')->paginate($this->row);
        if ($this->search != null) {
            $terkirim =  ongkir::where('transaksi_id', 'like', '%' . $this->search . '%')
                ->where('status', '=', '2')->paginate($this->row);
        }
        $diterima = ongkir::where('status', '=', '3')->paginate($this->row);
        if ($this->search != null) {
            $diterima =  ongkir::where('transaksi_id', 'like', '%' . $this->search . '%')
                ->where('status', '=', '3')->paginate($this->row);
        }
        return view('livewire.admin.page-pengiriman', [
            'terkirim' => $terkirim,
            'belum_terkirim' => $belum_terkirim,
            'diterima' => $diterima,
        ]);
    }

    public function detailOngkir($transaksi_id)
    {
        $ongkir = ongkir::where('id', '=', $transaksi_id)->get();

        foreach ($ongkir  as $item) {
            $this->kode_pos = $item->kode_pos;
            $this->kabupaten = $item->kabupaten;
            $this->detail_alamat = $item->detail_alamat;
            $this->transaksi_id = $item->transaksi_id;
            $this->tgl_pengiriman = $item->tgl_pengiriman;
            $this->harga = $item->harga;
            $this->status = $item->status;
            $payment = Payment::where('transaksi_id', '=', $item->transaksi_id)->get();
            foreach ($payment as $item) {
                $this->item_details = $item->item_details;
            }
        }
        $this->itemDetail = true;
    }
    public function editModal($id)
    {
        $ongkir = ongkir::where('id', '=', $id)->get();

        foreach ($ongkir  as $item) {
            $this->ItemID = $item->id;
            $this->kode_pos = $item->kode_pos;
            $this->kabupaten = $item->kabupaten;
            $this->detail_alamat = $item->detail_alamat;
            $this->transaksi_id = $item->transaksi_id;
            $this->tgl_pengiriman = $item->tgl_pengiriman;
            $this->harga = $item->harga;
            $this->status = $item->status;
            $payment = Payment::where('transaksi_id', '=', $item->transaksi_id)->get();
            foreach ($payment as $item) {
                $this->item_details = $item->item_details;
            }
        }
        $this->ongkirItem = true;
    }

    public function  edit($id)
    {
        $this->validate([
            'tgl_pengiriman' => 'required|date',
            'harga' => "required",
            'status' => "required",
        ]);
        $ongkir = ongkir::where('id', '=', $id)->update([
            'tgl_pengiriman' => $this->tgl_pengiriman,
            'harga' => $this->harga,
            'status' => $this->status,
        ]);
        session()->flash('message', $ongkir ? 'Berhasil Di Update' : 'Gagal Di Update');
        $this->ongkirItem = false;
    }
    public function deleteModal($id)
    {
        $ongkir = ongkir::where('id', '=', $id)->get();

        foreach ($ongkir  as $item) {
            $this->user = $item->payment->user->name;
            $this->ItemID = $item->id;
            $this->transaksi_id = $item->transaksi_id;
        }
        $this->hapusItem = true;
    }
    public function delete($id)
    {
        $ongkir = ongkir::where('id', '=', $id)->delete();
        session()->flash("message", 'Berhasil DIhapus');
        $this->hapusItem = false;
    }

    public function gantiStatus($id)
    {
        $ongkir = ongkir::where('id', '=', $id)->first();
        // foreach ($ongkir as $item) {
            $this->ItemID = $ongkir->id;
            $this->status = $ongkir->status;
        // }
        $this->statusItem = true;
    }
    public function status($id)
    {
        $ongkir = ongkir::where('id', '=', $id)->update([
            'status' => $this->status,
        ]);
        session()->flash('message', $ongkir ? 'Berhasil Di Update' : 'Gagal Di Update');
        $this->statusItem = false;
    }
}
