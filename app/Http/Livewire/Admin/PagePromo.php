<?php

namespace App\Http\Livewire\Admin;

use App\Models\Promo;
use App\Models\Barang;
use Livewire\Component;
use App\Models\Category;
use Carbon\Carbon;
use Livewire\WithPagination;

class PagePromo extends Component
{
    use WithPagination;
    public $row = 10;
    public $search = "";
    // field Tabel promo
    public $kode_promo, $category_id, $barang_id, $promo, $tgl_mulai, $tgl_kadaluarsa, $max_user, $use_user;
    //item Modal dan Item ID
    public $tambahItem = false, $itemID, $hapusItem = false, $editItem = false;

    public function CekPromoKadaluarsa()
    {
        $date = Carbon::now()->add(10, 'day')->format('Y-m-d');
        $day = explode('-', $date);
        return $date;
    }
    public function render()
    {
        // Cek Pengguna Promo
        $cek_jumlah_pengguna_promo = Promo::whereNull('use_user')->get()->count();

        // cek Promo Terlaris
        $cek_promo_terlaris = Promo::max('use_user');
        // dd([$cek_jumlah_pengguna_promo,$cek_promo_terlaris]);
        // Melakukan Pengecekan Promo Kadaluarsa
        $date_kadaluarsa = Carbon::now()->add(30, 'day')->format('Y-m-d');
        $date_now = Carbon::now()->format('Y-m-d');
        $promo_kadaluarsa = Promo::whereBetween('tgl_kadaluarsa', [$date_now, $date_kadaluarsa])
            ->orderBy('id', 'desc')
            ->paginate(7);
        // Mengambil Data dan Pencarian
        $promo = Promo::orderBy('id', 'desc')->paginate($this->row);
        if ($this->search != null) {
            $promo = Promo::where('kode_promo', 'like', '%' . $this->search . '%')->orderBy('id', 'desc')->paginate($this->row);
        }
        return view('livewire.admin.page-promo', [
            'category' => Category::all(),
            'barang' => Barang::all(),
            'Datapromo' => $promo,
            'Promo_hampir_kadaluarsa' => $promo_kadaluarsa,
            'cek_jumlah_pengguna_promo'=> $cek_jumlah_pengguna_promo,
            'cek_promo_terlaris'=> $cek_promo_terlaris,
        ]);
    }
    public function CloseAllModal()
    {
        $this->tambahItem = false;
        $this->hapusItem = false;
        $this->editItem = false;
    }
    public function createModal()
    {
        $this->tambahItem = true;
    }
    public function create()
    {
        $this->validate([
            'kode_promo' => 'required',
            'promo' => 'required',
            'tgl_mulai' => 'required',
            'tgl_kadaluarsa' => 'required',
        ]);
        if ($this->category_id == null) {
            $promo = Promo::create([
                'kode_promo' => $this->kode_promo,
                'barang_id' => $this->barang_id,
                'max_user' => $this->max_user,
                'use_user' => $this->use_user,
                'promo' => $this->promo,
                'tgl_mulai' => $this->tgl_mulai,
                'tgl_kadaluarsa' => $this->tgl_kadaluarsa,
            ]);
        } else if ($this->barang_id == null) {
            $promo = Promo::create([
                'kode_promo' => $this->kode_promo,
                'category_id' => $this->category_id,
                'max_user' => $this->max_user,
                'use_user' => $this->use_user,
                'promo' => $this->promo,
                'tgl_mulai' => $this->tgl_mulai,
                'tgl_kadaluarsa' => $this->tgl_kadaluarsa,
            ]);
        }
        session()->flash('message', $promo ? 'Data Promo Berhasil Di Tambah' : 'Data Promo Gagal Di Tambah');
        $this->CloseAllModal();
    }
    public function editModal($id)
    {

        $promo = Promo::find($id);
        // dd($promo);
        $this->itemID = $promo->id;
        $this->kode_promo = $promo->kode_promo;
        $this->category_id = $promo->category_id;
        $this->barang_id = $promo->barang_id;
        $this->max_user = $promo->max_user;
        $this->use_user = $promo->use_user;
        $this->promo = $promo->promo;
        $this->tgl_mulai = $promo->tgl_mulai;
        $this->tgl_kadaluarsa = $promo->tgl_kadaluarsa;
        $this->editItem = true;
    }
    public function edit($id)
    {
        $this->validate([
            'kode_promo' => 'required',
            'promo' => 'required',
            'tgl_mulai' => 'required',
            'tgl_kadaluarsa' => 'required',
        ]);
        if ($this->category_id == null) {
            $promo = Promo::where('id', $id)->update([
                'kode_promo' => $this->kode_promo,
                'barang_id' => $this->barang_id,
                'max_user' => $this->max_user,
                'use_user' => $this->use_user,
                'promo' => $this->promo,
                'tgl_mulai' => $this->tgl_mulai,
                'tgl_kadaluarsa' => $this->tgl_kadaluarsa,
            ]);
        } else {
            $promo = Promo::where('id', $id)->update([
                'kode_promo' => $this->kode_promo,
                'category_id' => $this->category_id,
                'use_user' => $this->use_user,
                'max_user' => $this->max_user,
                'promo' => $this->promo,
                'tgl_mulai' => $this->tgl_mulai,
                'tgl_kadaluarsa' => $this->tgl_kadaluarsa,
            ]);
        }
        session()->flash('message', $promo ? "Promo Berhasil Di Edit" : "Promo Gagal Di Edit");
        $this->CloseAllModal();
    }
    public function hapusModal($id)
    {
        $promo = Promo::find($id);
        $this->itemID = $promo->id;
        $this->hapusItem = true;
    }
    public function hapus($id)
    {
        $promo = Promo::find($id)->delete();
        session()->flash('message', $promo ? "Promo Berhasil Di Hapus" : "Promo Gagal Di Hapus");
        $this->CloseAllModal();
    }
}
