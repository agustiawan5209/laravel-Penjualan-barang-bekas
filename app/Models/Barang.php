<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = 'barangs';
    protected $fillable = ['user_id', 'foto_produk', 'nama_produk', 'harga', 'deskripsi', 'stock', 'categories'];
    protected $hidden = ['user_id', 'foto_produk', 'harga', 'categories'];
    use HasFactory;

    public function category()
    {
        return $this->belongsTo(Category::class, 'categories');
    }
    public function diskon()
    {
        return $this->hasOne(Diskon::class, 'barang_id', 'id');
    }
    public function user(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
