<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Promo;
use App\Models\Barang;
use App\Models\PromoUser;
use App\Models\UserVoucher;
use App\Models\Voucher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Cart $cart)
    {
        $diskon = null;
        $promo = null;
        $snapToken = '';
        $payment = '';
        $potongan = [];
        $keranjang = Cart::where('user_id', '=', Auth::user()->id)->get();
        // dd($snapToken);
        $total_price = Cart::where('user_id', '=', Auth::user()->id)->get();
        $total_price_array = [];
        if ($total_price->count() >  0) {
            foreach ($total_price as $item) {
                $total_price_array[] = $item->sub_total;
                $cart = $item->barang->id;
                $potongan = $this->GetPromo($item->barang_id);
                $potongan_nominal = $this->GetPromoNominal($item->barang_id);
            }
        }
        $array_sum_total_price = array_sum($total_price_array);


        // dd($potongan);
        return view('livewire.page.payment', [
            'diskon' => $diskon,
            'promo' => $promo,
            'keranjang' => $keranjang,
            'snapToken' => $snapToken,
            'payment' => $payment,
            'sub_total' => $array_sum_total_price,
        ]);
    }
    /**
     * GetPromo
     *  Mendapatkan Semua Potongan Yang Ada
     * @param  mixed $id_barang
     * @return void
     */
    public function GetPromo($id_barang)
    {
        $arr = [];
        $barang = Barang::find($id_barang);
        $user_promo = PromoUser::where('user_id', Auth::user()->id)->get();
        foreach ($user_promo as $item) {
            $promo = Promo::where('id', $item->promo_id)->get();
            foreach ($promo as $data) {
                $arr[] = $data->id;
            }
        }
        $count = count($arr);
        $hasil = [];
        for ($i = 0; $i < $count; $i++) {
            $cek = Promo::where('id', $arr[$i])->get();
            foreach ($cek as $item) {
                if ($item->category_id == $barang->categories) {
                    $hasil[] = $item->promo;
                }
                if ($item->promo_persen != null) {
                    $hasil[] = $item->promo_persen;
                }
                // $hasil = [$barang_promo, $kategori_promo, $promo_kosong];
            }
        }
        // dd($arr);
        if ($hasil == null) {
            $param = 0;
        } else {
            $param = array_sum($hasil);
        }
        // dd($param);
        return $param;
    }
    public function GetPromoNominal($id_barang)
    {
        $arr = [];
        $barang = Barang::find($id_barang);
        $user_promo = PromoUser::where('user_id', Auth::user()->id)->get();
        foreach ($user_promo as $item) {
            $promo = Promo::where('id', $item->promo_id)->get();
            foreach ($promo as $data) {
                $arr[] = $data->id;
            }
        }
        $count = count($arr);
        $hasil = [];
        for ($i = 0; $i < $count; $i++) {
            $cek = Promo::where('id', $arr[$i])->get();
            foreach ($cek as $item) {
                if ($item->promo_nominal != null) {
                    $hasil[] =  $item->promo_nominal;
                }
                if ($item->category_id == $barang->categories) {
                    $hasil[] = $item->promo;
                }
                // $hasil = [$barang_promo, $kategori_promo, $promo_kosong];
            }
        }
        // dd($arr);
        if ($hasil == null) {
            $param = 0;
        } else {
            $param = array_sum($hasil);
        }
        return $param;
    }

    /**
     * Show the form for creating a new resource.
     *  Membuat Data Keranjang
     * @return \Illuminate\Http\Response
     */
    public function create(Barang $Barang)
    {
        $diskon = null;
        $promo = null;
        $potongan = [];
        $keranjang = Cart::where('user_id', '=', Auth::user()->id)->get();
        // Melakukan Pengurangan Jumlah Stock
        foreach ($keranjang as $item) {
            // Dapatkan Stock Barang
            $stock_barang = Barang::select('stock')->find($item->barang_id);
            $barang = Barang::where('id', $item->barang_id)->update([
                'stock' => $stock_barang->stock - $item->jumlah_barang
            ]);
        }

        $total_price = Cart::where('user_id', '=', Auth::user()->id)->get();
        $total_price_array = [];
        if ($total_price->count() >  0) {
            foreach ($total_price as $item) {
                $total_price_array[] = $item->sub_total;
                $potongan = $this->GetPromo($item->barang_id);
                $potongan_nominal = $this->GetPromoNominal($item->barang_id);
            }
        }
        $array_sum_total_price = array_sum($total_price_array);
        // Cek Diskon dari Cart
        $diskon_cart = Cart::whereNotNull('diskon')->where('user_id', '=', Auth::user()->id)->get();
        foreach ($diskon_cart as $item) {
            $diskon = $item->diskon;
        }
        // $promo_cart = Cart::whereNotNull('promo')->where('user_id', '=', Auth::user()->id)->get();
        // foreach ($promo_cart as $item) {
        //     $promo = $item->promo;
        // }
        // dd($potongan);
        return view('livewire.page.payment', [
            'diskon' => $diskon,
            'promo' => $promo,
            'keranjang' => $keranjang,
            'sub_total' => $array_sum_total_price,
            'potongan' => $potongan,
            'potongan_nominal' => $potongan_nominal,
            'total_price' => $this->getTotal($promo,$potongan_nominal, $diskon, $array_sum_total_price),
        ]);
    }


    /**
     * cekPromo
     *  Melakukan Pengecekan Jika category dan barang kosong
     *  Melakukan Pengecekan Jika category kosong
     *  Melakukan Pengecekan Jika barang kosong
     * @param  mixed $promo_id
     * @param  mixed $barang_id
     * @return void
     */
    public function cekPromo($promo_id, $barang_id)
    {
        $promo = PromoUser::where('user_id', Auth::user()->id)->get();
        if ($promo->count() > 0) {
            foreach ($promo as $item) {
                $item->promo_id;
                $item->user_id;
            }
        }
    }

    /**
     * getTotal
     *  Perhitungan nilai Total Pembelian
     * @param  mixed $promo
     * @param  mixed $diskon
     * @param  mixed $sub_total
     * @return void
     */
    public function getTotal($promo_persen, $promo_nominal, $diskon, $sub_total)
    {
        if ($diskon != null && $promo_persen != null && $promo_nominal != null) {
            $total_promo_persen = $sub_total * ($promo_persen / 100);
            $total_diskon = $sub_total * ($diskon / 100);
            $total_promo_nominal = $sub_total - $promo_nominal;
            return $sub_total - $total_promo_persen - $total_diskon - $total_promo_nominal;
        } else if ($diskon != null && $promo_persen != null) {
            $total_promo_persen = $sub_total * ($promo_persen / 100);
            $total_diskon = $sub_total * ($diskon / 100);
            return $sub_total - $total_promo_persen - $total_diskon;
        } else if ($diskon != null && $promo_nominal != null) {
            $total_diskon = $sub_total * ($diskon / 100);
            return $sub_total - $total_diskon - $promo_nominal;
        } else if ($diskon != null) {
            $total_diskon = $sub_total * ($diskon / 100);
            return $sub_total  - $total_diskon;
        } else if ($promo_persen != null) {
            $total_promo_persen = $sub_total * ($promo_persen / 100);
            return $sub_total - $total_promo_persen;
        } else if ($promo_nominal != null) {
            return $sub_total - $promo_nominal;
        } else {
            return $sub_total;
        }
    }
    public function delete($id)
    {

        $keranjang = Cart::find($id);
        // Dapatkan Stock Barang
        $stock_barang = Barang::find($keranjang->barang_id);
        $hasil = intval($stock_barang->stock) + $keranjang->jumlah_barang;
        // dd($hasil);
        Barang::where('id', $keranjang->barang_id)
            ->update([
                'stock' => intval($hasil),
            ]);
        $keranjang->delete();
        return redirect()->back()->with('message', 'Berhasil Di Hapus');
    }

    /**
     * Kirim
     * Mengirim Setiap Dta Yang ada
     * @param  mixed $request
     * @return void
     */
    public function Kirim(Request $request)
    {
        $diskon = null;
        $promo = null;
        $voucher = [];
        $snapToken = '';
        $payment = '';
        $potongan = [];
        $keranjang = Cart::where('user_id', '=', Auth::user()->id)->get();
        // dd($snapToken);
        $total_price = Cart::where('user_id', '=', Auth::user()->id)->get();
        $total_price_array = [];
        $item_details = [];
        if ($total_price->count() >  0) {
            foreach ($total_price as $item) {
                $total_price_array[] = $item->sub_total;
                $voucher[] = $item->barang->id;
                $potongan = $this->GetPromo($item->barang_id);

                $potongan_nominal = $this->GetPromoNominal($item->barang_id);

                $item_details[] = [
                    'id_barang' => $item->barang->id,
                    'nama_produk' => $item->barang->nama_produk,
                    'harga_barang' => $item->barang->harga,
                ];
            }
        }
        // menghitung Sub Total Dari Nilai Array
        $array_sum_total_price = array_sum($total_price_array);

        // Medapatkan Diskon
        $diskon_cart = Cart::whereNotNull('diskon')->where('user_id', '=', Auth::user()->id)->get();
        foreach ($diskon_cart as $item) {
            $diskon = $item->diskon;
        }
        $sub_total = (int) $this->getTotal($potongan, $potongan_nominal, $diskon, $array_sum_total_price) - $this->voucherPot($array_sum_total_price);
        // dd($sub_total);
        $param = [
            'sub_total' => $sub_total,
            'item_details' => $item_details,
            'potongan' => $potongan + $this->voucherPot($array_sum_total_price),
        ];
        if ($array_sum_total_price == null || $keranjang == null) {
            abort(403);
        }
        $potongan = $array_sum_total_price * ( (int) $potongan / 100);
        // Tampilkan Voucher
        Session::put('param', $param);
        // dd($voucher);

        return  view('page.midtrans.midtrans', [
            'keranjang' => $keranjang,
            'sub_total' => $sub_total,
            'potongan' => abs($potongan + $this->voucherPot($array_sum_total_price)),
            'potongan_nominal' => $potongan_nominal,
            'total_price' => $array_sum_total_price,
            'voucher'=> $voucher,
        ]);
    }
    public function voucherPot($total_price){
        $total = 0;
        $arr = [];
       $userv=  UserVoucher::where('user_id', Auth::user()->id)->get();
        foreach($userv as $user_voucher){
            $voucher = Voucher::where('id', $user_voucher->id)->first();
            $arr[] = $voucher->diskon;
        }
        $sum = array_sum($arr);
        $total = $total_price * ($sum / 100);
        return $total;

    }
}
