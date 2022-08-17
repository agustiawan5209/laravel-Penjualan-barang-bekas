<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\SlidePage
 *
 * @property int $id
 * @property string $slide
 * @property string $deskripsi
 * @property string $thumbnail
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|SlidePage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SlidePage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SlidePage query()
 * @method static \Illuminate\Database\Eloquent\Builder|SlidePage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SlidePage whereDeskripsi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SlidePage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SlidePage whereSlide($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SlidePage whereThumbnail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SlidePage whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class SlidePage extends Model
{
    protected $table = 'slide_pages';
    protected $fillable = [
        'slide','deskripsi','thumbnail'
    ];
    protected $hidden =['slide', 'thumbnail'];
    use HasFactory;
}
