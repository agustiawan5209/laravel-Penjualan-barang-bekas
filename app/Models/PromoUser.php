<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\PromoUser
 *
 * @property int $id
 * @property int $user_id
 * @property int $promo_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Promo|null $promo
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|PromoUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PromoUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PromoUser query()
 * @method static \Illuminate\Database\Eloquent\Builder|PromoUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PromoUser whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PromoUser wherePromoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PromoUser whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PromoUser whereUserId($value)
 * @mixin \Eloquent
 */
class PromoUser extends Model
{
    protected $table = 'promo_users';
    protected $fillable = ['user_id', 'promo_id'];
    protected $hidden  = [
        'user_id',
        'promo_id',
    ];
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function promo(){
        return $this->hasOne(Promo::class, 'id', 'promo_id');
    }
}
