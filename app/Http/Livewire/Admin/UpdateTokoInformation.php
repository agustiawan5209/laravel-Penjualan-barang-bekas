<?php

namespace App\Http\Livewire\Admin;

use App\Models\Toko;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class UpdateTokoInformation extends Component
{
    public $user_id, $user_name;
    public $nama_toko, $alamat, $no_telpon, $kode_toko = '';
    public $tokoItem = false;
    public function mount()
    {
        $this->user_id = Auth::user()->id;
        $this->user_name = Auth::user()->name;
    }
    public function render()
    {
        $toko = Toko::where('user_id', '=', $this->user_id)->get();
        if ($toko->count() > 0) {
            foreach ($toko as $item) {
                $this->nama_toko = $item->nama_toko;
                $this->alamat = $item->alamat;
                $this->no_telpon = $item->no_telpon;
            }
        }
        return view('livewire.admin.update-toko-information');
    }
    /**
     * cekToko
     *  melakukan pengecekan toko
     *
     * @return void
     */
    public function cekToko()
    {
        $this->tokoItem = true;
    }
    /**
     * UpdateToko
     *  Melakukan Update Informasi Toko User
     * @return void
     */
    public function UpdateToko()
    {
        $this->validate([
            'nama_toko' => 'required',
            'alamat' => 'required',
            'no_telpon' => 'required|max:15',
        ]);
        $toko = Toko::where('user_id', '=', $this->user_id)->get();
        $regex = "/#[a-z]/";
        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVXWYZ';
        $random_kode = substr(str_shuffle($permitted_chars), 0, 4);
        $NamaToko = $this->user_name . "_" . $random_kode;
        // dd()
        if ($toko->count() > 0) {
            $toko = Toko::where('user_id', '=', $this->user_id)->update([
                'nama_toko' => $this->nama_toko,
                'alamat' => $this->alamat,
                'no_telpon' => $this->no_telpon,
            ]);
            session()->flash('message', $toko ? 'Toko Berhasil Di Update' : 'Toko Gagal Di Update');
        } else {
            $toko =  Toko::create([
                'user_id' => $this->user_id,
                'kode_toko' =>  $NamaToko,
                'nama_toko' => $this->nama_toko,
                'alamat' => $this->alamat,
                'no_telpon' => $this->no_telpon,
            ]);
            session()->flash('message', $toko ? 'Toko Berhasil Dibuat' : 'Toko Gagal Di Buat');
        }
    }
}
