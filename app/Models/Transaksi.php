<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Transaksi
 *
 * @property int $id
 * @property string $ID_transaksi
 * @property string $tgl_transaksi
 * @property string $gross_amount
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Transaksi newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Transaksi newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Transaksi query()
 * @method static \Illuminate\Database\Eloquent\Builder|Transaksi whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaksi whereGrossAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaksi whereIDTransaksi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaksi whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaksi whereTglTransaksi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaksi whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Transaksi extends Model
{
    protected $table = 'transaksis';
    protected $filable = ['ID_transaksi','tgl_transaksi','gross_amount'];
    use HasFactory;
}
