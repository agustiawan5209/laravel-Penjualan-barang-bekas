<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Promo extends Model
{

    protected $table = 'promos';
    protected $fillable = ['kode_promo', 'category_id', 'barang_id','max_user','use_user', 'promo', 'tgl_mulai', 'tgl_kadaluarsa'];
	protected $dates = ['deleted_at'];
    use HasFactory;
    use SoftDeletes;
    public function barang()
    {
        return $this->belongsTo(Barang::class, 'barang_id', 'id');
    }
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
