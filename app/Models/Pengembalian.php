<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengembalian extends Model
{
    use HasFactory;
    protected $table = 'pengembalians';
    protected $fillable = ['user_id','transaksi_id','alasan','gambar','status', 'kondisi_lain', 'kondisi','admin_ket'];
    protected $hidden = ['status'];

    public function transaksi(){
        return $this->hasOne(Transaksi::class, 'id', 'transaksi_id');
    }
    public function user(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
