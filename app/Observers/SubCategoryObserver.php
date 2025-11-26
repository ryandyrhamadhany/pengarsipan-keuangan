<?php

namespace App\Observers;

use App\Models\SubCategory;
use App\Models\Year;
use Illuminate\Support\Facades\Storage;

class SubCategoryObserver
{
    public function deleting(SubCategory $sub)
    {
        foreach ($sub->years as $year) {
            $year->delete();
        }
    }

    public function deleted(SubCategory $sub)
    {
        // Menghapus semua tahun yang terhubung ke subcategory lewat relasi Eloquent
        foreach ($sub->years as $year) {
            $year->delete();   // atau deleteQuietly() kalau perlu
        }
    }

    /**
     * Handle the SubCategory "created" event.
     */
    // public function created(SubCategory $subCategory): void
    // {
    //     //
    // }

    // /**
    //  * Handle the SubCategory "updated" event.
    //  */
    // public function updated(SubCategory $subCategory): void
    // {
    //     //
    // }

    // /**
    //  * Handle the SubCategory "deleted" event.
    //  */
    // public function deleted(SubCategory $subCategory): void
    // {
    //     //
    // }

    // /**
    //  * Handle the SubCategory "restored" event.
    //  */
    // public function restored(SubCategory $subCategory): void
    // {
    //     //
    // }

    // /**
    //  * Handle the SubCategory "force deleted" event.
    //  */
    // public function forceDeleted(SubCategory $subCategory): void
    // {
    //     //
    // }
}
