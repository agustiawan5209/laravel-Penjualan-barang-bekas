<?php

namespace App\Http\Livewire\Admin;

use App\Models\RequestBarang;
use Exception;
use Livewire\Component;

class RequestBarangAdmin extends Component
{
    public $row = 10, $search = '', $alasan, $status;
    public $foto_produk, $updatefoto, $nama_produk, $Alamat, $deskripsi, $categories, $harga, $itemID;
    public $statusItem = false;
    public function render()
    {
        $request = RequestBarang::where('status', '=', '1')->paginate($this->row);
        if($this->search != null){
            $request = RequestBarang::where('nama_produk', 'like', '%'. $this->search .'%')
            ->paginate($this->row);
        }
        return view('livewire.admin.request-barang-admin',[
            'barang'=> $request,
        ]);
    }
    public function konfirModal($id){
        $barang = RequestBarang::find($id);
        $this->itemID = $barang->id;
        $this->nama_produk = $barang->nama_produk;
        $this->foto_produk = $barang->foto_produk;
        $this->deskripsi = $barang->deskripsi;
        $this->harga = $barang->harga;
        $this->Alamat = $barang->Alamat;
        $this->categories = $barang->categories;
        $this->statusItem = true;

    }
    public function konfirmasiStatus($id, $status){
        // dd($status);

            $msg = '';
            if($status == 2){
                $msg = "Berhasil Di konfirmasi";
            }else if($status == 3){
                $msg = "Request Barang Berhasil Di Tolak";
            }
            // $request->
            session()->flash('message', $msg);
            $request = RequestBarang::find($id)->update([
                'status'=> $status,
                'alasan'=> $this->alasan,
            ]);
            $this->statusItem = false;

    }

}
