<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SubCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'sub_category_name',
        'sub_category_code',
        'keterangan',
    ];

    public function category()
    {
        return $this->BelongsTo(Category::class);
    }

    public function years()
    {
        return $this->morphMany(Year::class, 'yearable');
    }

    public function racks()
    {
        return DocumentRack::whereIn(
            'year_id',
            $this->years()->pluck('id')
        );
    }

    public function folders()
    {
        return DocumentFolder::whereIn(
            'document_rack_id',
            $this->racks()->pluck('id')
        );
    }

    public function files()
    {
        return ArchiveFile::whereIn(
            'document_folder_id',
            $this->folders()->pluck('id')
        )->get();
    }
}
