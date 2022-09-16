<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Pengembalian;
use Illuminate\Support\Facades\Auth;

class PagePengembalianAdmin extends Component
{
    public $row = 10, $search = "";
    public $user_id;
    public $StatusItem = false, $detailItem = false;
    public $itemID;
    public $status, $ket ,$admin_ket, $transaksi_id,$gambar, $alasan, $kondisi, $kondisi_lain;
    public function render()
    {
        $pengembalian = Pengembalian::orderBy('id', 'desc')->get();
        return view('livewire.admin.page-pengembalian-admin',[
            'pengembalian'=> $pengembalian,
        ]);
    }
    public function StatusModal($id){
        $this->itemID = $id;
        $this->StatusItem = true;
    }
    public function gantiStatus($id){
        $pengembalian = Pengembalian::find($id);
        $pengembalian->update([
            'status'=> $this->status,
            'admin_ket'=> $this->ket,
        ]);
        $this->StatusItem = false;
    }
    public function detail($id){
        $pengembalian = Pengembalian::find($id);
        $this->gambar = $pengembalian->gambar;
        $this->alasan = $pengembalian->alasan;
        $this->kondisi = $pengembalian->kondisi;
        $this->kondisi_lain = $pengembalian->kondisi_lain;
        $this->status = $pengembalian->status;
        $this->ket = $pengembalian->admin_ket;
        $this->detailItem = true;
    }
}
