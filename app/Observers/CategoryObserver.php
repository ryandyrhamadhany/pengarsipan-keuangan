<?php

namespace App\Observers;

use App\Models\Category;
use App\Models\Year;
use Illuminate\Support\Facades\Storage;

class CategoryObserver
{
    public function deleting(Category $category)
    {
        // Hapus semua year milik category
        foreach ($category->years as $year) {
            $year->delete();
        }

        // Hapus semua sub category
        foreach ($category->subcategories as $sub) {
            $sub->delete();
        }
    }

    public function deleted(Category $category)
    {
        // --- 1. Hapus YEAR langsung di kategori ---
        if ($category->years()->exists()) {
            foreach ($category->years as $year) {
                $year->delete();
            }
        }

        // --- 2. Hapus SUBCATEGORY + YEAR di dalamnya ---
        if ($category->subcategories()->exists()) {
            foreach ($category->subcategories as $sub) {

                if ($sub->years()->exists()) {
                    foreach ($sub->years as $year) {
                        $year->delete();
                    }
                }

                $sub->delete();
            }
        }
    }


    /**
     * Handle the Category "created" event.
     */
    // public function created(Category $category): void
    // {
    //     //
    // }

    // /**
    //  * Handle the Category "updated" event.
    //  */
    // public function updated(Category $category): void
    // {
    //     //
    // }

    // /**
    //  * Handle the Category "deleted" event.
    //  */
    // public function deleted(Category $category): void
    // {
    //     //
    // }

    // /**
    //  * Handle the Category "restored" event.
    //  */
    // public function restored(Category $category): void
    // {
    //     //
    // }

    // /**
    //  * Handle the Category "force deleted" event.
    //  */
    // public function forceDeleted(Category $category): void
    // {
    //     //
    // }
}
