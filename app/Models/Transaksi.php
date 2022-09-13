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
 * @property string $item_details_type
 * @property int $item_details_id
 * @property int $potongan
 * @property string $total
 * @method static \Illuminate\Database\Eloquent\Builder|Transaksi whereItemDetailsId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaksi whereItemDetailsType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaksi wherePotongan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaksi whereTotal($value)
 */
class Transaksi extends Model
{
    protected $table = 'transaksis';
    protected $fillable = ['ID_transaksi','tgl_transaksi','item_details', 'potongan', 'total', 'barang_id'];
    use HasFactory;
}
