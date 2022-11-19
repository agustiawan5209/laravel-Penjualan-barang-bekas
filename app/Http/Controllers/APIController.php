<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use App\Models\Transaksi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class APIController extends Controller
{
    public function api_kota()
    {
        $url_kota = 'https://dev.farizdotid.com/api/daerahindonesia/kota/7371';
        $url_kecamatan = 'https://dev.farizdotid.com/api/daerahindonesia/kecamatan?id_kota=7371';
        $url_detail_kecamatan = 'https://dev.farizdotid.com/api/daerahindonesia/kecamatan/7371110';
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
    public function kota()
    {
        $url_kota = 'https://dev.farizdotid.com/api/daerahindonesia/kota?id_provinsi=73';
        $client = new Client();
        $http_get_kota = Http::get($url_kota);
        return $http_get_kota;
    }
    public function getKota($id)
    {
        $url_kota = 'https://dev.farizdotid.com/api/daerahindonesia/kota/' . $id;
        $client = new Client();
        $http_get_kota = Http::get($url_kota);
        return $http_get_kota;
    }
    public function kecamatan($id)
    {
        $url_kecamatan = 'https://dev.farizdotid.com/api/daerahindonesia/kecamatan?id_kota=' . $id;
        $http = Http::get($url_kecamatan);
        return $http;
    }
    public function detail_kecamatan($id)
    {
        $url_kecamatan = 'https://dev.farizdotid.com/api/daerahindonesia/kecamatan/' . $id;
        $http = Http::get($url_kecamatan);
        return $http;
    }
    public function desa($id)
    {
        $url_kecamatan = 'https://dev.farizdotid.com/api/daerahindonesia/kelurahan?id_kecamatan=7371110' . $id;
        $http = Http::get($url_kecamatan);
        return $http;
    }
    public function DataPenjualan()
    {
        $carbon = Carbon::now()->parse();
        $year = $carbon->toArray();

        $transaksi = [];
        // $januari =
        for ($i = 1; $i < 13; $i++) {
            $potongan = Transaksi::where('status', '=', '0')
            ->whereYear('created_at', $year['year'])
            ->whereMonth('created_at', '' . $i . '')
            ->sum('potongan');
            $total = Transaksi::where('status', '=', '0')
            ->whereYear('created_at', $year['year'])
            ->whereMonth('created_at', '' . $i . '')
            ->sum('total');
            $transaksi[$i] = $total - $potongan;
        }
        return response()->json($transaksi);
    }
}
