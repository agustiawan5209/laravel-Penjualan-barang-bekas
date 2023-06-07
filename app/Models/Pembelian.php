<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    use HasFactory;
    protected $table = 'pembelians';
    protected $fillable= ['request_id','barang_id','bukti_transaksi', 'kode_transaksi','subtotal', 'status','jumlah'];


    public function barang(){
        return $this->hasOne(Barang::class, 'id','barang_id');
    }
    public function request(){
        return $this->hasOne(RequestBarang::class, 'id','request_id');
    }

    public function getBuktiTransaksiAttribute($value){
        return asset('upload/'. $value);
    }
}
