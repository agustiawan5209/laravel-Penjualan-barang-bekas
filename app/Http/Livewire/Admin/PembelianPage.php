<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Pembelian;
use Livewire\WithPagination;

class PembelianPage extends Component
{
    use WithPagination;
    public $hapusItem = false;
    public $row = 10;
    public $search = null;
    public function render()
    {
        return view('livewire.admin.pembelian-page', [
            'pembelian' => Pembelian::orderBy('id', 'desc')
                ->when($this->search ?? null, function ($query, $search) {
                    $query->where('kode_transaksi', 'like', "%". $search ."%")
                    ->orWhere('subtotal', 'like', "%". $search ."%")
                    ->orWhere('jumlah', 'like', "%". $search ."%");
                })
                ->paginate($this->row),
        ]);
    }
}
