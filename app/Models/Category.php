<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $cabinet_id
 * @property string $category_name
 * @property string|null $sub_category
 * @property string|null $year
 * @property int|null $payment_method_id
 * @property int|null $funding_source_id
 * @property string|null $url_icon
 * @property string|null $path_icon
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\FundingSource|null $funding_source
 * @property-read \App\Models\PaymentMethod|null $payment_method
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category whereCabinetId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category whereCategoryName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category whereFundingSourceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category wherePathIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category wherePaymentMethodId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category whereSubCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category whereUrlIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category whereYear($value)
 * @mixin \Eloquent
 */
class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'cabinet_id',
        'category_name',
        'sub_category',
        'year',
        'payment_method_id',
        'funding_source_id',
        'url_icon',
        'path_icon',
        'description',
    ];

    public function cabinet()
    {
        return $this->belongsTo(Cabinet::class);
    }

    public function payment_method()
    {
        return $this->belongsTo(PaymentMethod::class);
    }

    public function funding_source()
    {
        return $this->belongsTo(FundingSource::class);
    }
}
