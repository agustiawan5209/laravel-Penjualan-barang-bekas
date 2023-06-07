<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\MetodePembayaran as ModelsMetodePembayaran;

class MetodePembayaran extends Component
{
    public $bank, $no_rekening, $pemilik, $itemID;
    // Item Modal
    public $addItem = false, $editItem = false, $hapusItem = false;
    public function render()
    {
        $metodeBayar = ModelsMetodePembayaran::all();

        return view('livewire.metode-pembayaran',[
            'metodeBayar'=> $metodeBayar
        ]);
    }

    public function addModal()
    {
        if ($this->addItem == true) {
            $this->addItem = false;
        } elseif ($this->addItem == false) {
            $this->addItem = true;
        }
    }
    public function AddBank()
    {
        $this->validate([
            'bank' => 'required|max:20',
            'no_rekening' => 'required',
            'pemilik' => 'required',
        ]);

        $bank = ModelsMetodePembayaran::insert([
            'user_id' => Auth::user()->id,
            'bank' => $this->bank,
            'no_rekening' => $this->no_rekening,
            'pemilik' => $this->pemilik,
        ]);
        Alert::info("info", 'Berhasil');
        $this->addItem = false;
        $this->bank = null;
        $this->no_rekening = null;
        $this->pemilik = null;


    }

    public function EditModal($id)
    {
        $bank = ModelsMetodePembayaran::find($id);
        if ($bank->count() > 0) {
            $this->itemID = $bank->id;
            $this->bank = $bank->bank;
            $this->pemilik = $bank->pemilik;
            $this->no_rekening = $bank->no_rekening;
        }
        $this->editItem = true;

    }
    public function edit($id)
    {
        if ($id != null) {
            $bank = ModelsMetodePembayaran::where('id', $id)->update([
                'bank' => $this->bank,
                'no_rekening' => $this->no_rekening,
                'pemilik' => $this->pemilik,
            ]);
        }
        $this->editItem = false;
        $this->bank = null;
        $this->no_rekening = null;
        $this->pemilik = null;
        Alert::info("info", 'Berhasil');

    }

    public function HapusModal($id)
    {
        $bank = ModelsMetodePembayaran::find($id);
        if ($bank->count() > 0) {
            $this->itemID = $bank->id;
            $this->bank = $bank->bank;
            $this->pemilik = $bank->pemilik;
            $this->no_rekening = $bank->no_rekening;
        }
        $this->hapusItem = true;
    }
    public function hapus($id)
    {
        $bank = ModelsMetodePembayaran::find($id);
        Alert::info("info", 'Berhasil');
        $this->bank = null;
        $this->no_rekening = null;
        $this->pemilik = null;
        $this->hapusItem = false;

    }
}
