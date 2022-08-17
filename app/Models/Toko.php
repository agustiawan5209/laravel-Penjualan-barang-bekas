<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Toko
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Barang[] $barang
 * @property-read int|null $barang_count
 * @property-read \App\Models\User|null $user
 * @method static \Database\Factories\TokoFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Toko newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Toko newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Toko query()
 * @mixin \Eloquent
 */
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
