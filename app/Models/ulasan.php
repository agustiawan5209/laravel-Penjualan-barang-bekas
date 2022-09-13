<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ulasan
 *
 * @property int $id
 * @property int $barang_id
 * @property int|null $point1
 * @property int|null $point2
 * @property int|null $point3
 * @property int|null $point4
 * @property int|null $point5
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ulasan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ulasan newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ulasan query()
 * @method static \Illuminate\Database\Eloquent\Builder|ulasan whereBarangId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ulasan whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ulasan whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ulasan wherePoint1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ulasan wherePoint2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ulasan wherePoint3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ulasan wherePoint4($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ulasan wherePoint5($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ulasan whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ulasan extends Model
{
    use HasFactory;
    protected $table = 'ulasans';
    protected $fillable = ['user_id','email', 'barang_id', 'ket'];

    public function user(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }
    public function barang(){
        return $this->hasOne(Barang::class, 'id', 'barang_id');
    }
}
