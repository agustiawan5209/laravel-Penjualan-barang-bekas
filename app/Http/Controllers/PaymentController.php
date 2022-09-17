<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Cart;
use App\Models\ongkir;
use GuzzleHttp\Client;
use App\Models\Payment;
use App\Models\Voucher;
use App\Models\PromoUser;
use App\Models\Transaksi;
use App\Models\UserVoucher;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Notifications\InvoicePaid;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use App\Services\Midtrans\CallbackService;
use Notification;

class PaymentController extends Controller
{
    public function uploadFile($file)
    {
        // dd($file->getClientOriginalName());
        $nama = $file->getClientOriginalName();
        $random_name = md5($nama) . '.' . $file->getClientOriginalExtension();
        if (Storage::exists(public_path('bukti/' . $random_name))) {
            $random_name = md5($nama) . '.' . $file->getClientOriginalExtension();
        }
        $file->storeAs('bukti', $random_name);
        return $random_name;
    }

    public function GantiStatusPromo()
    {
        PromoUser::where('user_id', '=', Auth::user()->id)->update([
            'status' => '2',
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
            $transaksi_id = $this->transaksi_id();
            $this->createTransaksi($item_details['item_details'], $transaksi_id);
            $this->createPayment($request, $item_details['item_details'], $pdf->download()->getOriginalContent(), $transaksi_id);
            Cart::where('user_id', '=', Auth::user()->id)->delete();
            session()->forget('param');
            $this->GantiStatusPromo();
            Alert::success('Pemesanan berhasil', 'Mohon Tunggu Proses Konfirmasi');

            return redirect()
                ->route('home');
        } else {
            return redirect()->route('home');
        }
    }

    public function createPayment($request, $item_details, $pdf, $transaksi_id)
    {
        $payment_status = '';
        $payment_type = '';
        if ($request->foto == null && $request->metode == 'COD') {
            $payment_status = '';
            $payment_type = 'COD';
        } elseif ($request->metode == 'BANK' && $request->foto != null) {
            $random_name = $this->uploadFile($request->foto);
            $payment_status = '2';
            $payment_type = 'BANK';
        }
        // Cek Pemilik Barang
        $arr = [];
        $cart = Cart::where('user_id', '=', Auth::user()->id)->get();
        foreach ($cart as $item) {
            $arr[] = $item->barang->user_id;
        }

        for ($i = 0; $i < count($item_details); $i++) {
            $exp = implode('/', $item_details[$i]);
        }
        $permitted_chars = '01234567891011223344556677889900_abcdefghijklmnopqrstuvwxyz_ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        // Generate Transaksi ID

        $ID_Transkasi = $transaksi_id;
        // Simpan PDF
        $namPDF = substr(str_shuffle($permitted_chars), 0, 7) . '.pdf';
        Storage::put('bukti/' . $namPDF, $pdf);

       $payemnt =  Payment::create([
            'user_id' => Auth::user()->id,
            'number' => Auth::user()->name . '_' . $this->generateUniqueNumber(),
            'total_price' => $request->sub_total,
            'payment_status' => $payment_status,
            'payment_type' => $payment_type,
            'transaksi_id' => $ID_Transkasi,
            'pdf_url' => $namPDF,
            'tgl_transaksi' => Carbon::now()->format('Y-m-d'),
            'item_details' => $exp,
        ]);
        Notification::send($payemnt,new InvoicePaid([
            'type'=> 'payment',
            'body'=> Auth::user()->name . " Baru Saja Melakukan Pembayaran",
            'from'=> 'User='. Auth::user()->id,
        ]));
        $this->createOngkir($request, $ID_Transkasi);
    }

    public function createOngkir($request, $ID_Transkasi)
    {

        $status = 0;
        if ($request->kabupaten == 'Kota Makassar' || $request->kabupaten == 'Kabupaten Gowa') {
            $harga = 12000;
        }else{
            $harga = 0;
        }
        ongkir::create([
            'transaksi_id' => $ID_Transkasi,
            'tgl_pengiriman' => null,
            'harga' => $harga,
            'kode_pos' => $request->kode_pos,
            'kabupaten' => $request->kabupaten,
            'detail_alamat' => $request->alamat,
            // 'status' => $status,
        ]);
    }

    public function createTransaksi($item_details = [], $transaksi_id)
    {
        $count = count($item_details);
        // dd($item_details[1]);
        // Ambil Nilai Promo Dari CartController
        $cart = new CartController();
        // Ambil Promo Persen
        $promo_persen = $cart->GetPromo($item_details[0]['id_barang']);
        // Ambil Promo Nominal
        $promo_nominal = $cart->GetPromoNominal($item_details[0]['id_barang']);
        // Melakukan Generate Random Number Pada Field ID_transaksi

        // Melakukan Perulanagan Untuk Membuat Field Dalam Tabel Transaksi
        for ($i = 0; $i < $count; $i++) {
            // dd($item_details[$i]);
            // Hapus VOcuher =
            $v = Voucher::where('barang_id', '=', $item_details[$i]['id_barang'])->first();
            //   dd($v);
            if ($v != null) {
                UserVoucher::where('voucher_id', $v->id)->update([
                    'status' => '2',
                ]);
            }
            // end Vocuher
            $promo_persen = $cart->GetPromo($item_details[$i]['id_barang']);
            $promo_nominal = $cart->GetPromoNominal($item_details[$i]['id_barang']);
            // Jika Potongan sama Dengan 0 atau null maka potongan sama dengan harga jika tidak maka harga akan dipotong
            $potongan = $promo_persen == 0 || $promo_persen == '' ? $promo_nominal : $item_details[$i]['harga_barang'] * ((int) $promo_persen / 100);
            Transaksi::create([
                'ID_transaksi' => $transaksi_id,
                'tgl_transaksi' => Carbon::now()->format('Y-m-d'),
                'item_details' => implode(',', $item_details[$i]),
                'barang_id' => $item_details[$i]['id_barang'],
                'potongan' => $potongan,
                'total' => $item_details[$i]['harga_barang'] - $potongan,
            ]);
        }
        // Hapus Voucher Yang Memiliki Status 3
        UserVoucher::where('status', '=', '3')->update([
            'status' => '4',
        ]);
    }
    public function generateUniqueNumber()
    {
        do {
            $code = random_int(1111, 9999);
        } while (Payment::where('number', '=', $code)->first());
        return $code;
    }
    public function transaksi_id(){
        $permitted_chars = '01234567891011223344556677889900_abcdefghijklmnopqrstuvwxyz_ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        do {
            $transaksi_id = substr(str_shuffle($permitted_chars), 0, 8);
        } while (Payment::where('transaksi_id', '=', $transaksi_id)->first());
        return $transaksi_id;
    }
}
