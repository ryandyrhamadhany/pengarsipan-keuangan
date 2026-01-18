<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    public function payment_method()
    {
        return $this->belongsTo(PaymentMethod::class);
    }

    public function funding_source()
    {
        return $this->belongsTo(FundingSource::class);
    }
}
