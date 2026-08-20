<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $funding_source_name
 * @property string|null $sub_category
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FundingSource newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FundingSource newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FundingSource query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FundingSource whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FundingSource whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FundingSource whereFundingSourceName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FundingSource whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FundingSource whereSubCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FundingSource whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class FundingSource extends Model
{
    use HasFactory;

    protected $fillable = [
        'funding_source_name',
        'sub_category',
        'description',
    ];
}
