<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Promo
 *
 * @property int $id
 * @property string $kode_promo
 * @property string|null $category_id
 * @property int|null $max_user
 * @property int|null $use_user
 * @property int $promo
 * @property string $tgl_mulai
 * @property string $tgl_kadaluarsa
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Barang|null $barang
 * @property-read \App\Models\Category|null $category
 * @method static \Illuminate\Database\Eloquent\Builder|Promo newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Promo newQuery()
 * @method static \Illuminate\Database\Query\Builder|Promo onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Promo query()
 * @method static \Illuminate\Database\Eloquent\Builder|Promo whereBarangId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Promo whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Promo whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Promo whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Promo whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Promo whereKodePromo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Promo whereMaxUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Promo wherePromo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Promo whereTglKadaluarsa($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Promo whereTglMulai($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Promo whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Promo whereUseUser($value)
 * @method static \Illuminate\Database\Query\Builder|Promo withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Promo withoutTrashed()
 * @mixin \Eloquent
 */
class Promo extends Model
{

    protected $table = 'promos';
    protected $fillable = ['thumbnail','kode_promo', 'category_id', 'max_user', 'use_user',  'promo_persen','deskripsi', 'promo_nominal', 'tgl_mulai', 'tgl_kadaluarsa'];
    protected $dates = ['deleted_at'];
    use HasFactory;
    use SoftDeletes;
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
