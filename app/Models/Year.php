<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Year extends Model
{
    use HasFactory;

    protected $fillable = [
        'yearable_id',
        'yearable_type',
        'year',
    ];

    public function yearable()
    {
        return $this->morphTo();
    }

    public function racks()
    {
        return $this->hasMany(DocumentRack::class, 'year_id');
    }
}
