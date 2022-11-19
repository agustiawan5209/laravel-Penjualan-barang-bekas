<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanController extends Controller
{
    public function laporanPenjualan(Request $request){
        $transaksi = Transaksi::all();
        if($request->tgl_awal != null && $request->tgl_akhir != null){
            $transaksi = Transaksi::whereBetween('tgl_transaksi' ,[$request->tgl_awal, $request->tgl_akhir])->get();
        }
        $pdf = Pdf::loadView('PDF.penjualan', [ 'data'=> $transaksi]);
        return $pdf->stream('Penjualan.pdf');
    }
}
