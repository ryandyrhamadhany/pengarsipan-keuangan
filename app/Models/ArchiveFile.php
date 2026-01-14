<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ArchiveFile extends Model
{
    use HasFactory;

    protected $fillable = [
        'folder_id',
        'file_name',
        'file_path',
        'description',
    ];
}
