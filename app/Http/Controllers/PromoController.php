<?php

namespace App\Http\Controllers;

use App\Models\Promo;
use App\Models\PromoUser;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PromoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->cekKadaluarsaPromo();
    }
    public function CekPromoUser(Request $request)
    {
        $this->cekKadaluarsaPromo();
        $cek_pengguna = false;
        // Mengecek Jumlah Maksimal user Pada Promo
        $max_user = Promo::where('kode_promo', '=', $request->kode_promo)->get();
        // dd($max_user);
        // Cek Max Pengguna User
        if ($max_user->count() > 0) {
            foreach ($max_user as $item) {
                $cek_pengguna_promo = PromoUser::where('promo_id', '=', $item->id)->get();
                if ($cek_pengguna_promo->count() == $item->max_user) {
                    // Jika Pengguna Promo Sama Dengan Besar
                    $cek_pengguna = false;
                    return redirect()->back()->with('message', 'Maaf Pengguna Promo Sudah Maksimal');
                } else if ($cek_pengguna_promo->count() < $item->max_user) {
                    // Jika Pengguna User Lebh Kecil
                    $cek_pengguna = true;
                }
            }
        }
        // Cek Promo
        if ($cek_pengguna == true) {
            $promo = Promo::where('kode_promo', '=', $request->kode_promo)->first();
            if ($promo->count() > 0) {
                // Mencocokan Kode Promo
                $promo_user = PromoUser::where('user_id', '=', Auth::user()->id)->where('status', '=', '2')->get();
                // Jika Gagal
                if ($promo_user->count() > 0) {
                    return redirect()->back()->with('message', 'Maaf Promo Sudah Terpakai');
                } else {
                    // Jika Kode Promo Cocok Maka Menambahkan Ke promo User
                    $promo_user = PromoUser::insert([
                        'user_id' => Auth::user()->id,
                        'promo_id' => $promo->id,
                        'status'=> '1'
                    ]);
                    $get_promo = Promo::find($promo->id);
                    if($get_promo->use_user == $get_promo->max_user){
                        return redirect()->back()->with('message', 'Maaf Kode Promo Salah');
                    }else{

                        $count = $get_promo->use_user + 1;
                        Promo::where('id', $promo->id)->update([
                            'use_user' => $count
                        ]);
                        return redirect()->back()->with('message', 'Selamat Menikmati Promo Yang Ada');
                    }
                }
            } else {
                return redirect()->back()->with('message', 'Maaf Kode Promo Salah');
            }
        }
    }
    public function cekKadaluarsaPromo()
    {
        // Mengambil Tanggal
        $carbon = Carbon::now()->format('Y-m-d');
        $array_cek = [];
        // mengambil data promo
        $tgl_promo = Promo::whereDate('tgl_kadaluarsa', $carbon)->get();
        if ($tgl_promo->count() > 0) {
            // foreach ($tgl_promo as $tgl_cek) {
            $promo_kadaluarsa = Promo::whereDate('tgl_kadaluarsa', $carbon)->get();
            foreach ($promo_kadaluarsa as $item) {
                if ($promo_kadaluarsa) {
                    $array_cek[] = 'Terhapus : ' . $item->id;
                    Promo::whereNull('deleted_at')->whereDate('tgl_kadaluarsa', $carbon)->delete();
                } else {
                    $array_cek[] = 'Tidak Terhapus : ' . $item->id;
                }
                // }
            }
        }
    }
}
