<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cabinet extends Model
{
    use HasFactory;

    protected $fillable = [
        'cabinet_name',
        'cabinet_code',
        'total_racks',
        'deskripsi',
    ];

    public function categories()
    {
        return $this->hasMany(Category::class, 'cabinet_id');
    }

    public function subcategories()
    {
        return SubCategory::whereIn(
            'category_id',
            $this->categories()->pluck('id')
        );
    }

    public function years()
    {
        return Year::whereIn(
            'subcategory_id',
            $this->subcategories()->pluck('id')
        );
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
