<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = 'barangs';
    protected $fillable = ['foto_produk', 'nama_produk', 'harga', 'deskripsi', 'categories'];
    protected $hidden = ['foto_produk', 'harga', 'categories'];
    use HasFactory;

    public function category(){
        return $this->hasOne(Category::class, 'categories');
    }
}
