<?php

namespace App\Http\Livewire\Admin;

use Carbon\Carbon;
use App\Models\Voucher;
use App\Models\Barang;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;

class PageVoucher extends Component
{
    use WithPagination;
    public $row = 10;
    public $search = "";
    // field Tabel Voucher
    public $kode_voucher, $diskon, $deskripsi, $Voucher_persen, $jumlah_pembelian, $jenis_voucher = 0, $use_user, $barang_id;
    //item Modal dan Item ID
    public $tambahItem = false, $itemID, $hapusItem = false, $editItem = false;

    public function CekVoucherKadaluarsa()
    {
        $date = Carbon::now()->add(10, 'day')->format('Y-m-d');
        $day = explode('-', $date);
        return $date;
    }
    public function render()
    {
        // Cek Pengguna Voucher
        $cek_jumlah_pengguna_Voucher = Voucher::whereNull('use_user')->get()->count();
        // cek Voucher Terlaris
        $cek_Voucher_terlaris = Voucher::max('use_user');
        // dd([$cek_jumlah_pengguna_Voucher,$cek_Voucher_terlaris]);
        // Melakukan Pengecekan Voucher Kadaluarsa
        $date_kadaluarsa = Carbon::now()->add(10, 'day')->format('Y-m-d');
        $date_now = Carbon::now()->format('Y-m-d');
        // Mengambil Data dan Pencarian
        $Voucher = Voucher::orderBy('id', 'desc')
            ->paginate($this->row);
        if ($this->search != null) {
            $Voucher = Voucher::whereDate('tgl_kadaluarsa', '>', $date_now)
                ->where('kode_voucher', 'like', '%' . $this->search . '%')
                ->orderBy('id', 'desc')
                ->paginate($this->row);
        }
        // Voucher Yang Pengguna sudah Maksimal

        return view('livewire.admin.page-voucher', [
            'category' => Category::all(),
            'barang' => Barang::all(),
            'DataVoucher' => $Voucher,
            'cek_jumlah_pengguna_Voucher' => $cek_jumlah_pengguna_Voucher,
            'cek_Voucher_terlaris' => $cek_Voucher_terlaris,
            'Voucher_max' => $this->get_max_Voucher(),
        ]);
    }

    /**
     * get_max_Voucher
     *  Ambil Data Max Voucher user
     * @return void
     */
    public function get_max_Voucher()
    {
        $max_user = 0;
        $Voucher = Voucher::all();
        if ($Voucher->count() > 0) {
            foreach ($Voucher as $item) {
                $Voucher_max = Voucher::where('use_user', '=', $item->max_user)->get();
            }
            if ($Voucher_max->count() < 1) {
               $max_user = $Voucher_max = 0;
            }else{
               $max_user = $Voucher_max->count();
            }
        }
        return $max_user;
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
        $this->detailItem = false;
    }
    public function createModal()
    {
        $this->tambahItem = true;
    }
    // Crud
    public function create()
    {
        $this->validate([
            'kode_voucher' => 'required',
            'diskon'=> 'required',
            'jenis_voucher'=> 'required',
        ]);
        $Voucher = Voucher::create([
            'kode_voucher' => $this->kode_voucher,
            'deskripsi' => $this->deskripsi,
            'barang_id'=> $this->barang_id,
            'jenis_voucher' => $this->jenis_voucher,
            'use_user' => '0',
            'diskon' => $this->diskon,
            'jumlah_pembelian'=>  $this->jumlah_pembelian,
        ]);
        session()->flash('message', $Voucher ? 'Data Voucher Berhasil Di Tambah' : 'Data Voucher Gagal Di Tambah');
        $this->CloseAllModal();
    }
    public function editModal($id)
    {

        $Voucher = Voucher::find($id);
        // dd($Voucher);
        $this->itemID = $Voucher->id;
        $this->kode_voucher = $Voucher->kode_voucher;
        $this->diskon = $Voucher->diskon;
        $this->deskripsi = $Voucher->deskripsi;
        $this->jenis_voucher = $Voucher->jenis_voucher;
        $this->barang_id = $Voucher->barang_id;
        $this->jumlah_pembelian = $Voucher->jumlah_pembelian;
        $this->editItem = true;
    }
    public function edit($id)
    {
        $barang = $this->barang_id == "--" ?  $this->barang_id : null;
        // dd([
        //     $this->barang_id,
        //     $this->category_id
        // ]);
        $Voucher = Voucher::where('id', $id)->update([
            'kode_voucher' => $this->kode_voucher,
            'deskripsi' => $this->deskripsi,
            'barang_id'=> $this->barang_id,
            'jenis_voucher' => $this->jenis_voucher,
            'diskon' => $this->diskon,
            'jumlah_pembelian'=>  $this->jumlah_pembelian,
        ]);

        session()->flash('message', $Voucher ? "Voucher Berhasil Di Edit" : "Voucher Gagal Di Edit");
        $this->CloseAllModal();
    }
    public function hapusModal($id)
    {
        $Voucher = Voucher::find($id);
        $this->itemID = $Voucher->id;
        $this->hapusItem = true;
    }
    public function hapus($id)
    {
        $Voucher = Voucher::find($id)->delete();
        session()->flash('message', $Voucher ? "Voucher Berhasil Di Hapus" : "Voucher Gagal Di Hapus");
        $this->CloseAllModal();
    }
    // End Crud

    // Item Page Voucher'
    public $detailItem = false;
    public $Voucher_laris_page = false;
    public $Voucher_kadaluarsa_page = false;
    public function detailModal($id)
    {

        $Voucher = Voucher::find($id);
        // dd($Voucher);
        $this->itemID = $Voucher->id;
        $this->kode_voucher = $Voucher->kode_voucher;
        $this->diskon = $Voucher->diskon;
        $this->deskripsi = $Voucher->deskripsi;
        $this->jenis_voucher = $Voucher->jenis_voucher;
        $this->use_user = $Voucher->use_user;
        $this->barang_id = $Voucher->barang_id != null ? $Voucher->barang->nama_produk : null;
        $this->jumlah_pembelian = $Voucher->jumlah_pembelian;
        $this->detailItem = true;
    }

}
