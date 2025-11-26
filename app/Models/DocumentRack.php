<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentRack extends Model
{
    use HasFactory;

    protected $fillable = [
        'rack_name',
        'kode_rack',
        'keterangan',
        'year_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function folders()
    {
        return $this->hasMany(DocumentFolder::class, 'document_rack_id');
    }

    public function allFiles()
    {
        return ArchiveFile::whereIn(
            'document_folder_id',
            $this->folders()->pluck('id')
        )->get();
    }
}
