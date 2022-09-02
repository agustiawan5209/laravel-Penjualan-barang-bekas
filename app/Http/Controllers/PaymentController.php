<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\ongkir;
use GuzzleHttp\Client;
use App\Models\Payment;
use App\Models\PromoUser;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use App\Services\Midtrans\CallbackService;
use Carbon\Carbon;

class PaymentController extends Controller
{
    public function uploadFile($file)
    {
        // dd($file->getClientOriginalName());
        $nama = $file->getClientOriginalName();
        $random_name = md5($nama) . "." . $file->getClientOriginalExtension();
        if (Storage::exists(public_path('bukti/' . $random_name))) {
            $random_name = md5($nama) . "." . $file->getClientOriginalExtension();
        }
        $file->storeAs("bukti", $random_name);
        return $random_name;
    }

    public function GantiStatusPromo(){
        PromoUser::where('user_id', '=', Auth::user()->id)->update([
            'status' => '2'
        ]);
    }
    public function receive(Request $request)
    {
        // dd(session('param'));
        if (session()->has('param')) {
            $validasi = $request->validate([
                'name' => 'required',
                'email' => 'required',
                'kabupaten' => 'required',
                'kode_pos' => 'required',
                'metode' => 'required',
                'sub_total' => 'required',
                'foto' => 'required',
            ]);
            $param = [
                'param' => session('param'),
                'request' => $request,
                'file' => $this->uploadFile($request->foto),
            ];
            // dd($cek_file);
            $pdf = Pdf::loadView('PDF.PDFpembayaran', $param);
            $item_details = session('param');
            $this->createTransaksi($item_details['item_details']);
            $this->createPayment($request, $item_details['item_details'], $pdf->download()->getOriginalContent());
            Cart::where('user_id', '=', Auth::user()->id)->delete();
            session()->forget('param');
            $this->GantiStatusPromo();
            return redirect()->route('home')->with('message', 'Dalam Proses Konfirmasi');
        } else {
            return redirect()->route('home');
        }
    }

    public function createPayment($request, $item_details, $pdf)
    {

        $payment_status = "";
        $payment_type = "";
        if ($request->foto == null && $request->metode == "COD") {
            $payment_status = "";
            $payment_type = "COD";
        } else if ($request->metode == "BANK" && $request->foto != null) {
            $random_name = $this->uploadFile($request->foto);
            $payment_status = "2";
            $payment_type = "BANK";
        }
        // Cek Pemilik Barang
        $arr = [];
        $cart = Cart::where('user_id', '=', Auth::user()->id)->get();
        foreach ($cart as $item) {
            $arr[] = $item->barang->user_id;
        }


        for ($i = 0; $i < count($item_details); $i++) {
            $exp = implode(",", $item_details[$i]);
        }
        $permitted_chars = '01234567891011223344556677889900_abcdefghijklmnopqrstuvwxyz_ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        // Generate Transaksi ID
        do {
            $transaksi_id = substr(str_shuffle($permitted_chars), 0, 20);
        } while (Payment::where("transaksi_id", "=", $transaksi_id)->first());
        // Simpan PDF
        $namPDF = substr(str_shuffle($permitted_chars), 0, 7) . ".pdf";
        Storage::put('bukti/' . $namPDF, $pdf);

        Payment::create([
            "user_id" => Auth::user()->id,
            "number" => Auth::user()->name . "_" . $this->generateUniqueNumber(),
            'total_price' => $request->sub_total,
            'payment_status' => $payment_status,
            'payment_type' => $payment_type,
            'transaksi_id' => $transaksi_id,
            'pdf_url' => $namPDF,
            'tgl_transaksi' => Carbon::now()->format('Y-m-d'),
            'item_details' => $exp,
        ]);
        $this->createOngkir($request, $transaksi_id);
    }

    public function createOngkir($request, $transaksi_id)
    {
        ongkir::create([
            'transaksi_id' => $transaksi_id,
            'tgl_pengiriman' => null,
            'harga' => null,
            'kode_pos' => $request->kode_pos,
            'kabupaten' => $request->kabupaten,
            'detail_alamat' => $request->alamat,
            'status' => '1',
        ]);
    }

    public function createTransaksi($item_details = [])
    {
        $count = count($item_details);
        // dd($item_details[1]);
        // Ambil Nilai Promo Dari CartController
        $cart = new CartController;
        // Ambil Promo Persen
        $promo_persen = $cart->GetPromo($item_details[0]['id_barang']);
        // Ambil Promo Nominal
        $promo_nominal = $cart->GetPromoNominal($item_details[0]['id_barang']);

        // Melakukan Perulanagan Untuk Membuat Field Dalam Tabel Transaksi
        for ($i = 0; $i < $count; $i++) {
            // Melakukan Generate Random Number Pada Field ID_transaksi
            $permitted_chars = '01234567891011223344556677889900_abcdefghijklmnopqrstuvwxyz_ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            do {
                $transaksi_id = substr(str_shuffle($permitted_chars), 0, 20);
            } while (Transaksi::where("ID_transaksi", "=", $transaksi_id)->first());
            // dd($item_details[$i]);
            $promo_persen = $cart->GetPromo($item_details[$i]['id_barang']);
            $promo_nominal = $cart->GetPromoNominal($item_details[$i]['id_barang']);
            $potongan =  $promo_persen == 0 || $promo_persen == "" ? $promo_nominal : $item_details[$i]['harga_barang'] * ($promo_persen / 100);
            Transaksi::create([
                'ID_transaksi' =>  $transaksi_id,
                'tgl_transaksi' => Carbon::now()->format('Y-m-d'),
                'item_details' => implode(',', $item_details[$i]),
                'potongan' => $potongan,
                'total' => $item_details[$i]['harga_barang'] - $potongan,
            ]);
        }
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
