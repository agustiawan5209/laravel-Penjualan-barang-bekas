<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

/**
 * App\Models\Payment
 *
 * @property int $id
 * @property int $user_id
 * @property string $number
 * @property string $total_price
 * @property string $payment_status 1 = Belum Di Bayar, 2 = Pembayaran Berhasil , 3 = Konfirmasi
 * @property string|null $payment_type
 * @property string|null $pdf_url
 * @property string|null $transaksi_id
 * @property string $item_details
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\ongkir|null $ongkir
 * @property-read \App\Models\User|null $user
 * @method static \Database\Factories\PaymentFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Payment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Payment query()
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereItemDetails($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment wherePaymentStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment wherePaymentType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment wherePdfUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereTotalPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereTransaksiId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereUserId($value)
 * @mixin \Eloquent
 */
class Payment extends Model
{
    use Notifiable;
    use HasFactory;
    // use SoftDeletes;
    protected $table = 'payments';
    protected $fillable = ['user_id','number', 'total_price', 'payment_status', 'payment_type', 'payment_code', 'pdf_url', 'transaksi_id', 'snap_token', 'item_details', 'tgl_transaksi'];
    protected $hidden = ['payment_status', 'payment_type', 'payment_code', 'pdf_url', 'transaksi_id', 'snap_token'];


    public function ongkir(){
        return $this->hasOne(ongkir::class, 'transaksi_id','transaksi_id');
    }
    public function user()
    {
        return $this->hasOne(User::class , 'id', 'user_id');
    }
}
