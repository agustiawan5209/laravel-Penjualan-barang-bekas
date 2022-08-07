<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promo extends Model
{
    protected $table = 'promos';
    protected $fillable = ['kode_promo', 'category_id', 'barang_id','max_user','use_user', 'promo', 'tgl_mulai', 'tgl_kadaluarsa'];
    use HasFactory;

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'id', 'barang_id');
    }
    public function category()
    {
        return $this->belongsTo(Category::class, 'id', 'category_id');
    }
}
