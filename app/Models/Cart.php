<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'carts';
    protected $fillable = ['user_id', 'jumlah_barang', 'barang_id', 'sub_total'];
    use HasFactory;

    public function barang(){
        return $this->hasOne(Barang::class, 'id', 'barang_id');
    }
}
