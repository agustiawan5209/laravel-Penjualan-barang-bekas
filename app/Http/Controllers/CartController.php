<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Cart;
use App\Models\Barang;
use App\Models\Payment;
use App\Models\PromoUser;
use Illuminate\Http\Request;
use App\Models\TransaksiDetail;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreCartRequest;
use App\Http\Requests\UpdateCartRequest;
use App\Services\Midtrans\CreateSnapTokenService;

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
        $snapToken = '';
        $payment = '';
        $keranjang = Cart::where('user_id', '=', Auth::user()->id)->get();
        // dd($snapToken);
        $sub_total = Cart::where('user_id', '=', Auth::user()->id)->sum('sub_total');
        return view('livewire.page.payment', [
            'keranjang' => $keranjang,
            'snapToken' => $snapToken,
            'payment' => $payment,
            'sub_total' => $sub_total
        ]);
    }
    public function generateUniqueNumber()
    {
        do {
            $code = random_int(1111, 9999);
        } while (Payment::where("number", "=", $code)->first());
        return $code;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Barang $Barang)
    {
        $keranjang = Cart::where('user_id', '=', Auth::user()->id)->get();
        $total_price = Cart::where('user_id', '=', Auth::user()->id)->sum('sub_total');
        $user_ID = Cart::select('user_id')->where('user_id', '=', Auth::user()->id)->first();
        $sub_total = Cart::where('user_id', '=', Auth::user()->id)->sum('sub_total');

        return view('livewire.page.payment', [
            'keranjang' => $keranjang,
            'sub_total' => $sub_total
        ]);
    }
    public function getDataPayment(Request $request)
    {
        // return $request;
        $randomNumber = $this->generateUniqueNumber();
        $json = json_decode($request->get('json'), true);
        $jsonResponse = response()->json($request->all());

        // Memasukkan Detail
        $cek_snapToken = Cart::whereNotNull('snap_token')->where('user_id', '=', Auth::user()->id)->get();
        foreach ($cek_snapToken as $data) {
            $array[] =
                'harga' . ' = ' . $data->barang->harga . ',' . // harga satuan produk
                'quantity' . ' = ' . $data->jumlah_barang . ',' . // kuantitas pembelian
                'name' . ' = ' . $data->barang->nama_produk // nama produk
            ;
        }
        $data = implode('|', $array);
        // dd(Carbon::now()->timestamp());
        Payment::insert([
            'user_id' => Auth::user()->id,
            'number' => $json['order_id'],
            'total_price' => $json['gross_amount'],
            'payment_status' => $json['transaction_status'],
            'payment_type' => $json['payment_type'],
            'pdf_url' => $json['pdf_url'],
            'transaksi_id' => $json['transaction_id'],
            'snap_token' => $request->snap_token,
            'item_details' => $data,
            // 'created_at' => Carbon::now()->timestamp(),
        ]);
        $array = [];

        Cart::where('user_id', '=', Auth::user()->id)->delete();
        return redirect()->route('home')->with('message', 'Menunggu Pembayaran');
    }

    public function createSnap()
    {
        $snapToken = '';
        $payment = '';
        $keranjang = Cart::where('user_id', '=', Auth::user()->id)->get();
        $cek_snapToken = Cart::whereNull('snap_token')->where('user_id', '=', Auth::user()->id)->get();
        $user_ID = Cart::select('user_id')->where('user_id', '=', Auth::user()->id)->first();
        // dd($cek_snapToken);
        if ($keranjang->count() > 0) {
            // Jika snap token masih NULL, buat token snap dan simpan ke database
            $midtrans = new CreateSnapTokenService($payment, $user_ID->user_id, $keranjang);
            $snapToken = $midtrans->getSnapToken();
            if ($cek_snapToken != null) {
                Cart::whereNull('snap_token')->where('user_id', '=', Auth::user()->id)->update([
                    'snap_token' => $snapToken,
                ]);
            }
        }
        // dd($snapToken);
        $sub_total = Cart::where('user_id', '=', Auth::user()->id)->sum('sub_total');
        return view('page.midtrans.midtrans', [
            'keranjang' => $keranjang,
            'snapToken' => $snapToken,
            'payment' => $payment,
            'sub_total' => $sub_total
        ]);
    }
    public function delete($id)
    {
        $keranjang = Cart::where('id', $id)->where('user_id', '=', Auth::user()->id)->delete();
        return redirect()->back()->with('message', 'Berhasil Di Hapus');
    }
}
