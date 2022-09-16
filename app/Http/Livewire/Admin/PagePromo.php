<?php

namespace App\Http\Livewire\Admin;

use Carbon\Carbon;
use App\Models\Promo;
use App\Models\Barang;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use RealRashid\SweetAlert\Facades\Alert;
// use Alert;

class PagePromo extends Component
{
    use WithPagination;
    use WithFileUploads;
    public $row = 10;
    public $search = "";
    // field Tabel promo
    public $kode_promo, $category_id, $promo_nominal, $promo_persen, $tgl_mulai, $tgl_kadaluarsa, $max_user, $use_user, $image;
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
        $date_kadaluarsa = Carbon::now()->add(10, 'day')->format('Y-m-d');
        $date_now = Carbon::now()->format('Y-m-d');
        $promo_kadaluarsa = Promo::whereBetween('tgl_kadaluarsa', [$date_now, $date_kadaluarsa])
            ->orderBy('id', 'desc')
            ->paginate(7);
        // Mengambil Data dan Pencarian
        $promo = Promo::whereDate('tgl_kadaluarsa', '>', $date_now)
            ->orderBy('id', 'desc')
            ->paginate($this->row);
        if ($this->search != null) {
            $promo = Promo::whereDate('tgl_kadaluarsa', '>', $date_now)
                ->where('kode_promo', 'like', '%' . $this->search . '%')
                ->orderBy('id', 'desc')
                ->paginate($this->row);
        }
        // Promo Yang Pengguna sudah Maksimal

        return view('livewire.admin.page-promo', [
            'category' => Category::all(),
            'barang' => Barang::all(),
            'Datapromo' => $promo,
            'Promo_hampir_kadaluarsa' => $promo_kadaluarsa,
            'cek_jumlah_pengguna_promo' => $cek_jumlah_pengguna_promo,
            'cek_promo_terlaris' => $cek_promo_terlaris,
            'promo_max' => $this->get_max_promo(),
        ]);
    }

    /**
     * get_max_promo
     *  Ambil Data Max PROMO user
     * @return void
     */
    public function get_max_promo()
    {
        $promo = Promo::all();
        foreach ($promo as $item) {
            $Promo_max = Promo::where('use_user', '=', $item->max_user)->get();
        }
        return $Promo_max->count();
    }
    /**
     * CloseAllModal
     * Close Modal
     * @return void
     */
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
    // Crud
    public function create()
    {
        $this->validate([
            'image'=> ['required' ,'image|max:2040'],
            'kode_promo' => 'required',
            'tgl_mulai' => 'required',
            'tgl_kadaluarsa' => 'required',
        ]);
        $nama = $this->image->getClientOriginalName();
        $ext = $this->image->getClientOriginalExtension();
        $namaImage = "Promo-".$nama;
        $this->image->storeAs('upload', $namaImage);

        $promo = Promo::create([
            'gambar'=> $namaImage,
            'kode_promo' => $this->kode_promo,
            'category_id' => $this->category_id,
            'max_user' => $this->max_user,
            'use_user' => $this->use_user,
            'promo_nominal'=> $this->promo_nominal,
            'promo_persen' => $this->promo_persen  == null ? null : $this->promo_persen,
            'tgl_mulai' => $this->tgl_mulai,
            'tgl_kadaluarsa' => $this->tgl_kadaluarsa,
        ]);
        Alert::info('Info', 'Berhasil');
        $this->CloseAllModal();
    }
    public function editModal($id)
    {

        $promo = Promo::find($id);
        // dd($promo);
        $this->itemID = $promo->id;
        $this->kode_promo = $promo->kode_promo;
        $this->category_id = $promo->category_id;
        $this->promo_nominal = $promo->promo_nominal;
        $this->max_user = $promo->max_user;
        $this->use_user = $promo->use_user;
        $this->promo_persen = $promo->promo_persen;
        $this->tgl_mulai = $promo->tgl_mulai;
        $this->tgl_kadaluarsa = $promo->tgl_kadaluarsa;
        $this->editItem = true;
    }
    public function edit($id)
    {
        $this->validate([
            'kode_promo' => 'required',
            // 'promo' => 'required',
            'tgl_mulai' => 'required',
            'tgl_kadaluarsa' => 'required',
            'max_user' => 'required',
        ]);
        // dd($this->promo_persen);

        $promo = Promo::where('id', $id)->update([
            'kode_promo' => $this->kode_promo,
            'category_id' => $this->category_id,
            'max_user' => $this->max_user,
            'use_user' => $this->use_user,
            'promo_nominal'=> $this->promo_nominal  == "" ? null : $this->promo_nominal,
            'promo_persen' => $this->promo_persen  == "" ? null : $this->promo_persen,
            'tgl_mulai' => $this->tgl_mulai,
            'tgl_kadaluarsa' => $this->tgl_kadaluarsa,
        ]);

        Alert::info('Info', 'Berhasil');
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
        Alert::info('Info', 'Berhasil');
        $this->CloseAllModal();
    }
    // End Crud

    // Item Page Promo'
    public $promo_max_page = false;
    public $promo_laris_page = false;
    public $promo_kadaluarsa_page = false;
    public function Promo_max_page()
    {

        $this->promo_max_page = true;
    }
    public function Promo_laris_page()
    {
        $this->promo_max_page = true;
    }
    public function Promo_kadaluarsa_page()
    {
        // dd("1");
        return redirect()->route('Promo-Kadaluarsa');
    }
}
