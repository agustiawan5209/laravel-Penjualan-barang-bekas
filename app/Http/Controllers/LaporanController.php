<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Pembelian;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanController extends Controller
{
    public function laporanPenjualan(Request $request)
    {
        if ($request->start == null && $request->end == null) {
            $transaksi = Transaksi::all();
        } else {
            $transaksi = Transaksi::whereBetween('tgl_transaksi', [$request->start, $request->end])->get();
        }
        $pdf = Pdf::loadView('PDF.penjualan', ['data' => $transaksi]);
        return $pdf->stream('Penjualan.pdf');
    }

    public function laporanTitip(Request $request){
        if ($request->start == null && $request->end == null) {
            $transaksi = Transaksi::all();
        } else {
            $transaksi = Transaksi::whereBetween('tgl_transaksi', [$request->start, $request->end])
            ->where('jenis_request', "Titip")
            ->get();
        }
        $pdf = Pdf::loadView('PDF.penjualan', ['data' => $transaksi]);
        return $pdf->stream('Penjualan.pdf');
    }
    public function laporanPembelian(Request $request){
        if ($request->start == null && $request->end == null) {
            $Pembelian = Pembelian::all();
        } else {
            $Pembelian = Pembelian::whereBetween('created_at', [$request->start, $request->end])
            ->where('jenis_request', "Titip")
            ->get();
        }
        $pdf = Pdf::loadView('PDF.pembelian', ['data' => $Pembelian]);
        return $pdf->stream('Pembelian.pdf');
    }
}
