<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\MetodePembayaran
 *
 * @property int $id
 * @property int $user_id
 * @property string $bank
 * @property string $no_rekening
 * @property string $pemilik
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|MetodePembayaran newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MetodePembayaran newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MetodePembayaran query()
 * @method static \Illuminate\Database\Eloquent\Builder|MetodePembayaran whereBank($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MetodePembayaran whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MetodePembayaran whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MetodePembayaran whereNoRekening($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MetodePembayaran wherePemilik($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MetodePembayaran whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MetodePembayaran whereUserId($value)
 * @mixin \Eloquent
 */
class MetodePembayaran extends Model
{
    protected $table = 'metode_pembayarans';
    protected $fillable = [
        'user_id',
        'metode',
        'qr_code',
        'no_rekening',
        'nama_pemilik',
    ];
    use HasFactory;
    public function user(){
        return $this->belongsTo(User::class);
    }
}
