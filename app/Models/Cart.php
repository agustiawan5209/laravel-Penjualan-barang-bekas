<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Cart
 *
 * @property int $id
 * @property int $user_id
 * @property int $jumlah_barang
 * @property int $barang_id
 * @property string $sub_total
 * @property int $pemilik_id
 * @property int|null $diskon
 * @property int|null $promo
 * @property string|null $snap_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Barang|null $barang
 * @method static \Database\Factories\CartFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cart newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cart query()
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereBarangId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereDiskon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereJumlahBarang($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart wherePemilikId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart wherePromo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereSnapToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereSubTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereUserId($value)
 * @mixin \Eloquent
 */
class Cart extends Model
{
    protected $table = 'carts';
    protected $fillable = ['user_id', 'jumlah_barang', 'barang_id', 'sub_total', 'diskon', 'pemilik_id', 'promo'];
    use HasFactory;

    public function barang(){
        return $this->hasOne(Barang::class, 'id', 'barang_id');
    }
}
