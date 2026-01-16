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
<<<<<<< HEAD
        'category_code',
        'description',
=======
        'sub_category',
        'year',
        'payment_method_id',
        'funding_source_id',
>>>>>>> main
        'url_icon',
        'path_icon',
        'description',
    ];
}
