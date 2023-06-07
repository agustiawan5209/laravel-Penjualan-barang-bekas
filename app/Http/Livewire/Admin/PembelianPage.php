<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Pembelian;
use Livewire\WithPagination;
use App\Models\RequestBarang;
use RealRashid\SweetAlert\Facades\Alert;

class PembelianPage extends Component
{
    use WithPagination;
    public $hapusItem = false;
    public $row = 10;
    public $search = null;
    public $itemId;
    public function render()
    {
        $data = [];
        if (auth()->user()->role_id == "SuperAdmin") {
            $data['request'] = RequestBarang::where('status', '=', '1')->count();
        }
        return view('livewire.admin.pembelian-page', [
            'pembelian' => Pembelian::orderBy('id', 'desc')
                ->when($this->search ?? null, function ($query, $search) {
                    $query->where('kode_transaksi', 'like', "%". $search ."%")
                    ->orWhere('subtotal', 'like', "%". $search ."%")
                    ->orWhere('jumlah', 'like', "%". $search ."%");
                })
                ->paginate($this->row),
                'data'=> $data,
        ]);
    }
     // Modal Hapus
     public function hapusModal($id){
         $this->itemId = $id;
         $this->hapusItem = true;
     }

     public function Hapus($id){
        $pembelian = Pembelian::find($id);
        if($pembelian->barang->id != null){
            $pembelian->barang->delete();
        }
        Alert::info("success","Berhasil");
        $this->itemId = null;
        $this->hapusItem = false;
     }

}
