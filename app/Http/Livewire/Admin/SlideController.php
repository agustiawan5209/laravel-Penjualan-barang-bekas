<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\SlidePage;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class SlideController extends Component
{
    use WithFileUploads;
    use WithPagination;

    public $slide, $deskripsi, $thumbnail, $addItem = false, $hapusitem = false, $editItem = false;
    // item Foto
    public $updateFoto;
    public function render()
    {
        return view('livewire.admin.slide-controller');
    }
    public function clear()
    {
        $this->thumbnail = "";
        $this->slide = "";
        $this->deskripsi = "";
    }
    public function create()
    {
        $this->validate([
            'slide' => 'required',
            'deskripsi' => 'required',
            'thumbnail' => 'image|max:2040',
        ]);

        $filename = $this->thumbnail->getClientOriginalName();
        $explode = explode(".", $filename);
        $randomName = md5($explode[0]) . '.' . $explode[1];
        $this->thumbnail->storeAs('upload', "slide_".$randomName);
        $slideModel = SlidePage::create([
            'slide' => $this->slide,
            'deskripsi' => $this->deskripsi,
            'thumbnail' => $randomName,
        ]);
        $this->clear();
        session()->flash('message', $slideModel ? 'Slide Berhasil Di Tambah' : 'Slide Gagal Di Tambah');
    }

    public function editModal($id)
    {
        $slideModel = SlidePage::find($id);
        $this->itemID = $slideModel->id;
        $this->slide = $slideModel->slide;
        $this->deskripsi = $slideModel->deskripsi;
        $this->thumbnail = $slideModel->thumbnail;
        $this->editItem = true;
    }
    public function edit($id)
    {
        $slideModel = SlidePage::find($id);
        $namaFoto = $slideModel->thumbnail;
        $randomize = $namaFoto;
        if ($this->updateFoto != null) {
            // dd($this->updateFoto);
            if (Storage::exists(public_path('upload/' . $namaFoto))) {
                Storage::delete(public_path('upload/' . $namaFoto));
            }
            $filename = $this->thumbnail->getClientOriginalName();
            $explod = explode('.', $filename);
            $randomize = md5($filename) . '.' . $explod[1];
            $this->updateFoto->storeAs('upload', $randomize);
        }
        $slideModel = SlidePage::where('id', $id)->update([
            'slide'=> $this->slide,
            'deskripsi'=> $this->deskripsi,
            'thumbnail' => $randomize,
        ]);
        $this->clear();
        session()->flash('message', $slideModel ? 'Slide Berhasil Di Edit' : 'Slide Gagal Di Edit');
    }

    public function hapus($id){
        $this->clear();
        $slideModel = SlidePage::find($id)->delete();
        session()->flash('message', $slideModel ? 'Slide Berhasil Di Hapus' : 'Slide Gagal Di Hapus');
    }
}
