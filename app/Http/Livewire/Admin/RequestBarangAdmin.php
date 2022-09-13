<?php

namespace App\Http\Livewire\Admin;

use App\Models\RequestBarang;
use Exception;
use Livewire\Component;

class RequestBarangAdmin extends Component
{
    public $row = 10, $search = '', $alasan, $status = 0;
    public function render()
    {
        $request = RequestBarang::paginate($this->row);
        if($this->search != null){
            $request = RequestBarang::where('nama_produk', 'like', '%'. $this->search .'%')
            ->paginate($this->row);
        }
        return view('livewire.admin.request-barang-admin',[
            'barang'=> $request,
        ]);
    }
    public function konfirmasiStatus($id){
        $request = RequestBarang::find($id);
        try{
            if($this->status == 2){
                $msg = "Berhasil Di konfirmasi";
            }else if($this->status == 3){
                $msg = "Request Barang Di Tolak";
            }
            $request->update([
                'status'=> $this->status,
                'alasan'=> $this->alasan,
            ]);
            session()->flash('message', 'Berhasil Di Konfirmasi');
        }catch(Exception $e){
            session()->flash('message', "Error = ". $e->getMessage());
        }
    }

}
