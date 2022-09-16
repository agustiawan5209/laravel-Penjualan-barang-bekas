<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengembalian extends Model
{
    use HasFactory;
    protected $table = 'pengembalians';
    protected $fillable = ['transaksi_id','alasan','gambar','status', 'kondisi_lain', 'kondisi'];
    protected $hidden = ['status'];

    public function transaksi(){
        return $this->hasOne(Transaksi::class, 'id', 'transaksi_id');
    }
}
