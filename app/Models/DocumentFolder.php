<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $category_id
 * @property string|null $rack_name
 * @property string|null $folder_name
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Category $category
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DocumentFolder newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DocumentFolder newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DocumentFolder query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DocumentFolder whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DocumentFolder whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DocumentFolder whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DocumentFolder whereFolderName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DocumentFolder whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DocumentFolder whereRackName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DocumentFolder whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class DocumentFolder extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'rack_name',
        'folder_name',
        'description',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
