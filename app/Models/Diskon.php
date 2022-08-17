<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Diskon
 *
 * @property int $id
 * @property int $barang_id
 * @property int $diskon
 * @property string $tgl_mulai
 * @property string $tgl_kadaluarsa
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Barang $barang
 * @method static \Illuminate\Database\Eloquent\Builder|Diskon newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Diskon newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Diskon query()
 * @method static \Illuminate\Database\Eloquent\Builder|Diskon whereBarangId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Diskon whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Diskon whereDiskon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Diskon whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Diskon whereTglKadaluarsa($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Diskon whereTglMulai($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Diskon whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Diskon extends Model
{
    protected $table = 'diskons';
    protected $fillable = ['barang_id', 'diskon', 'tgl_mulai', 'tgl_kadaluarsa'];

    protected $hidden = ['barang_id'];
    use HasFactory;

    public function barang(){
        return $this->belongsTo(Barang::class, 'barang_id');
    }
}
