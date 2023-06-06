<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Barang
 *
 * @property int $id
 * @property int $user_id
 * @property string $foto_produk
 * @property string $nama_produk
 * @property int $harga
 * @property string $deskripsi
 * @property string|null $stock
 * @property string $categories
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Category|null $category
 * @property-read \App\Models\Diskon|null $diskon
 * @property-read \App\Models\Promo|null $promo
 * @property-read \App\Models\User|null $user
 * @method static \Database\Factories\BarangFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Barang newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Barang newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Barang query()
 * @method static \Illuminate\Database\Eloquent\Builder|Barang whereCategories($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Barang whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Barang whereDeskripsi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Barang whereFotoProduk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Barang whereHarga($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Barang whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Barang whereNamaProduk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Barang whereStock($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Barang whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Barang whereUserId($value)
 * @mixin \Eloquent
 */
class Barang extends Model
{
    protected $table = 'barangs';
    protected $fillable = ['user_id', 'foto_produk', 'nama_produk', 'harga', 'deskripsi', 'stock', 'categories', 'request_barang_id', 'jenis_request'];
    protected $hidden = ['user_id', 'foto_produk', 'harga', 'categories', 'request_barang_id'];
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
    public function promo(){
        return $this->hasOne(Promo::class, 'barang_id','id');
    }
    public function ulasan(){
        return $this->hasMany(ulasan::class, 'barang_id', 'id');
    }
    public function fotobarang(){
        return $this->hasMany(FotoBarang::class, 'barang_id', 'id');
    }

    public function requestbarang(){
        return $this->hasOne(RequestBarang::class, 'id','request_barang_id');
    }
}
