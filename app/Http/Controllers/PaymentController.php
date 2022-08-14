<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use GuzzleHttp\Client;
use App\Models\Payment;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use App\Services\Midtrans\CallbackService;

class PaymentController extends Controller
{

    public function receive(Request $request)
    {
        // dd(session('param'));
        if(session()->has('param')){
            $validasi = $request->validate([
                'name' => 'required',
                'email' => 'required',
                'kabupaten' =>'required',
                'kode_pos' => 'required',
                'metode' =>'required',
                'sub_total' => 'required',
            ]);
            $param = [
                'param'=> session('param'),
                'request' => $request,
            ];
            $pdf = Pdf::loadView('PDF.PDFpembayaran', $param);
            $item_details = session('param');
            // dd($request);
            $this->createPayment($request, $item_details['item_details'], $pdf->download()->getOriginalContent());
            Cart::where('user_id', '=', Auth::user()->id)->delete();
            session()->forget('param');
            return redirect()->route('home')->with('message','Dalam Proses Konfirmasi');
        }else{
            return redirect()->route('home');
        }

    }

    public function createPayment($request, $item_details,$pdf)
    {

        $payment_status = "";
        $payment_type = "";
        if ($request->foto == null && $request->metode == "COD") {
            $payment_status = "";
            $payment_type = "COD";
        } else if ($request->metode == "BANK" && $request->foto != null) {
            $payment_status = "Belum Di Konfirmasi";
            $payment_type = "BANK";
        }
        // Cek Pemilik Barang
        $arr = [];
        $cart = Cart::where('user_id', '=', Auth::user()->id)->get();
        foreach($cart as $item){
            $arr[] = $item->barang->user_id;
        }


        for ($i=0; $i < count($item_details); $i++) {
            $exp = $item_details[$i];
        }
        dd($exp);
        $exp = implode(",",$item_details);
        $permitted_chars = '_____0123456789_abcdefghijklmnopqrstuvwxyz_____ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $transaksi_id = substr(str_shuffle($permitted_chars), 0, 7);
        // Simpan PDF
        $namPDF = substr(str_shuffle($permitted_chars),0,7). ".pdf";
        Storage::put('bukti/'. $namPDF,$pdf);
        Payment::create([
            "user_id" => Auth::user()->id,
            "number" => Auth::user()->name . "_" . $this->generateUniqueNumber(),
            'total_price' => $request->sub_total,
            'payment_status' => $payment_status,
            'payment_type' => $payment_type,
            'transaksi_id' => $transaksi_id,
            'pdf_url'=> $namPDF,
            'item_details' => $exp,
        ]);
    }

    public function createOngkir()
    {

    }
    public function generateUniqueNumber()
    {
        do {
            $code = random_int(1111, 9999);
        } while (Payment::where("number", "=", $code)->first());
        return $code;
    }
    public function api_kota()
    {
        $url_kota = "https://dev.farizdotid.com/api/daerahindonesia/kota/7371";
        $url_kecamatan = "https://dev.farizdotid.com/api/daerahindonesia/kecamatan?id_kota=7371";
        $url_detail_kecamatan = "https://dev.farizdotid.com/api/daerahindonesia/kecamatan/7371110";
        $url_desa = 'https://dev.farizdotid.com/api/daerahindonesia/kelurahan?id_kecamatan=7371110';
        $url_detail_desa = 'https://dev.farizdotid.com/api/daerahindonesia/kelurahan/7371110004';
        $client = new Client();
        $api_response = $client->get($url_kota);
        $http_get_kota = Http::get($url_kota);
        $http_get_kec = Http::get($url_kecamatan);
        $http_get_detail_kecamatan = Http::get($url_detail_kecamatan);
        $http_get_detail_desa = Http::get($url_detail_desa);
        $http_get_desa = Http::get($url_desa);
    }
}
