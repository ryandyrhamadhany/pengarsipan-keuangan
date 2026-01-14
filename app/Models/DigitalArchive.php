<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DigitalArchive extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_payment_id',
        'category_funding_id',
        'category_id',
        'archive_name',
        'from_divisi',
        'submiter_name',
        'finance_officer_name',
        'revenue_officer_name',
        'file_path_archive',
        'archive_code',
        'nominal',
        'archive_by',
        'disposal_date',
        'no_spm',
    ];
}
