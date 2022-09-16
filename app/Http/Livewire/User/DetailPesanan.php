<?php

namespace App\Http\Livewire\User;

use App\Models\Pengembalian;
use App\Models\Transaksi;
use Livewire\Component;
use Livewire\WithFileUploads;
use RealRashid\SweetAlert\Facades\Alert;

class DetailPesanan extends Component
{
    use WithFileUploads;
    public $item;
    public $search = '',
        $row = 10;
    public $modalItem = false;
    public $alasan, $updatefoto, $itemID, $status, $kondisi, $kondisi_lain, $transaksi_id;

    protected $rules = [
        'image' => 'Maaf Tolong Masukkan Dalam Bentuk Foto',
    ];
    public function mount($item)
    {
        $this->item = $item;
    }

    public function ModalReturn($id)
    {
        $tr = Transaksi::find($id);
        $this->itemID = $id;
        $this->transaksi_id = $tr->ID_transaksi;
        $this->modalItem = true;
        // dd($this->transaksi_id);
    }

    public function create()
    {
        $this->validate([
            'updatefoto' => ['required', 'image', 'max:2040'],
            'alasan' => ['required', 'string'],
            'kondisi' => ['required'],
            // 'status'=> ['required'],
        ]);

        $nama = $this->updatefoto->getClientOriginalName();
        $ext = $this->updatefoto->getClientOriginalExtension();
        $randomName = 'P-' . $nama;
        $this->updatefoto->storeAs('upload', $randomName);
        Pengembalian::create([
            'transaksi_id' => $this->itemID,
            'gambar' => $randomName,
            'alasan' => $this->alasan,
            'kondisi' => $this->kondisi,
            'kondisi_lain' => $this->kondisi_lain,
            'status' => '1',
        ]);
        Alert::info('Dalam Proses', 'Harap Menunggu Konfirmasi Dari Pemilik');
        $this->modalItem = false;
    }
    public function render()
    {
        $transaksi = Transaksi::where('status', '=', '0')
            ->where('ID_transaksi', '=', $this->item)
            ->get();
        return view('livewire.user.detail-pesanan', compact('transaksi'));
    }
}
