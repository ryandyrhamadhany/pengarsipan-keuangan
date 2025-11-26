<?php

namespace App\Observers;

use App\Models\Cabinet;
use Illuminate\Support\Facades\Storage;

class CabinetObserver
{
    public function deleting(Cabinet $cabinet)
    {
        foreach ($cabinet->categories as $category) {
            foreach ($category->subcategories as $sub) {
                foreach ($sub->years as $year) {
                    foreach ($year->racks as $rack) {
                        foreach ($rack->folders as $folder) {
                            foreach ($folder->files as $file) {
                                $path = $file->path_file;
                                if ($path && Storage::disk('public')->exists($path)) {
                                    Storage::disk('public')->delete($path);
                                }
                            }
                        }
                    }
                }
            }
        }
    }

    public function deleted(Cabinet $cabinet)
    {
        foreach ($cabinet->categories as $category) {

            /** 1) Hapus semua Year yang langsung milik Category */
            foreach ($category->years as $year) {
                $year->delete();
            }

            /** 2) Hapus Year yang milik SubCategory */
            foreach ($category->subcategories as $sub) {
                foreach ($sub->years as $year) {
                    $year->delete();
                }
            }
        }
    }


    /**
     * Handle the Cabinet "created" event.
     */
    // public function created(Cabinet $cabinet): void
    // {
    //     //
    // }

    // /**
    //  * Handle the Cabinet "updated" event.
    //  */
    // public function updated(Cabinet $cabinet): void
    // {
    //     //
    // }

    // /**
    //  * Handle the Cabinet "deleted" event.
    //  */
    // public function deleted(Cabinet $cabinet): void
    // {
    //     //
    // }

    // /**
    //  * Handle the Cabinet "restored" event.
    //  */
    // public function restored(Cabinet $cabinet): void
    // {
    //     //
    // }

    // /**
    //  * Handle the Cabinet "force deleted" event.
    //  */
    // public function forceDeleted(Cabinet $cabinet): void
    // {
    //     //
    // }
}
