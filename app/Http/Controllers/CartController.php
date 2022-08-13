<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Promo;
use App\Models\Barang;
use App\Models\Payment;
use App\Models\PromoUser;
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
            }
        }
        $array_sum_total_price = array_sum($total_price_array);
        $diskon_cart = Cart::whereNotNull('diskon')->where('user_id', '=', Auth::user()->id)->get();
        foreach ($diskon_cart as $item) {
            $diskon = $item->diskon;
        }
        $promo_cart = Cart::whereNotNull('promo')->where('user_id', '=', Auth::user()->id)->get();
        foreach ($promo_cart as $item) {
            $promo = $item->promo;
        }

        // dd($potongan);
        return view('livewire.page.payment', [
            'diskon' => $diskon,
            'promo' => $promo,
            'keranjang' => $keranjang,
            'snapToken' => $snapToken,
            'payment' => $payment,
            'sub_total' => $array_sum_total_price,
            'potongan' => $potongan,
            'total_price' => $this->getTotal($promo, $diskon, $array_sum_total_price),
        ]);
    }
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
                if ($item->barang_id == $barang->id) {
                    $hasil[] =  $item->promo;
                } else if ($item->category_id == $barang->categories) {
                    $hasil[] = $item->promo;
                } else if ($item->category_id == null && $item->barang_id == null) {
                    $hasil[] =  0;
                }
                // $hasil = [$barang_promo, $kategori_promo, $promo_kosong];
            }
        }
        // dd($arr);
        if ($hasil == null ) {
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
        $total_price = Cart::where('user_id', '=', Auth::user()->id)->get();
        $total_price_array = [];
        if ($total_price->count() >  0) {
            foreach ($total_price as $item) {
                $total_price_array[] = $item->sub_total;
                $potongan = $this->GetPromo($item->barang_id);
            }
        }
        $array_sum_total_price = array_sum($total_price_array);
        // Cek Diskon dari Cart
        $diskon_cart = Cart::whereNotNull('diskon')->where('user_id', '=', Auth::user()->id)->get();
        foreach ($diskon_cart as $item) {
            $diskon = $item->diskon;
        }
        $promo_cart = Cart::whereNotNull('promo')->where('user_id', '=', Auth::user()->id)->get();
        foreach ($promo_cart as $item) {
            $promo = $item->promo;
        }
        // dd($potongan);
        return view('livewire.page.payment', [
            'diskon' => $diskon,
            'promo' => $promo,
            'keranjang' => $keranjang,
            'sub_total' => $array_sum_total_price,
            'potongan' => $potongan,
            'total_price' => $this->getTotal($promo, $diskon, $array_sum_total_price),
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
    public function getTotal($promo, $diskon, $sub_total)
    {
        if ($diskon != null && $promo != null) {
            $total_promo = $sub_total * ($promo / 100);
            $total_diskon = $sub_total * ($diskon / 100);
            return $sub_total - $total_promo - $total_diskon;
        } else if ($diskon != null) {
            $total_diskon = $sub_total * ($diskon / 100);
            return $sub_total  - $total_diskon;
        } else if ($promo != null) {
            $total_promo = $sub_total * ($promo / 100);
            return $sub_total - $total_promo;
        } else {
            return $sub_total;
        }
    }
    public function delete($id)
    {
        $keranjang = Cart::where('id', $id)->where('user_id', '=', Auth::user()->id)->delete();
        return redirect()->back()->with('message', 'Berhasil Di Hapus');
    }

    public function Kirim(Request $request)
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
        $item_details = [];
        if ($total_price->count() >  0) {
            foreach ($total_price as $item) {
                $total_price_array[] = $item->sub_total;
                $cart = $item->barang->id;
                $potongan = $this->GetPromo($item->barang_id);
                $item_details[] =  $item->barang->nama_produk . '.' . $item->barang->harga;
            }
        }
        $array_sum_total_price = array_sum($total_price_array);
        $diskon_cart = Cart::whereNotNull('diskon')->where('user_id', '=', Auth::user()->id)->get();
        foreach ($diskon_cart as $item) {
            $diskon = $item->diskon;
        }
        $promo_cart = Cart::whereNotNull('promo')->where('user_id', '=', Auth::user()->id)->get();
        foreach ($promo_cart as $item) {
            $promo = $item->promo;
        }
        $sub_total = $this->getTotal($promo, $diskon, $array_sum_total_price);
        $param = [
            'sub_total' => $sub_total,
            'item_details' => $item_details,
            'potongan' => $potongan,
        ];
        if($array_sum_total_price == null || $keranjang == null ){
            abort(403);
        }
        Session::put('param', $param);
        return  view('page.midtrans.midtrans', [
            'keranjang'=> $keranjang,
            'sub_total'=> $sub_total,
            'potongan' => $potongan,
            'total_price' => $array_sum_total_price,
        ]);
    }
}
