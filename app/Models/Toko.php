<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Toko extends Model
{
    protected $table = 'tokos';
    protected $fillable = ['user_id', 'kode_toko', 'nama_toko','alamat', 'no_telpon'];
    use HasFactory;

    public function user()
    {
        return $this->hasOne(User::class, 'user_id');
    }
    public function barang(){
        return $this->hasMany(Barang::class);
    }
}
