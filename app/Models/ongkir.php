<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ongkir extends Model
{
    protected $table = 'ongkirs';
    protected $fillable = ['payment_id','tgl_pengiriman','alamat', 'kode_pos', 'kabupaten', 'detail_alamat'];
    use HasFactory;

    public function transaksi(){
        return $this->hasOne(Transaksi::class, 'id','transaksi_id');
    }
    public function user()
    {
        return $this->hasOne(User::class , 'id', 'user_id');
    }
}
