<?php

namespace App\Observers;

use App\Models\Year;
use Illuminate\Support\Facades\Storage;

class YearObserver
{
    public function deleting(Year $year)
    {
        foreach ($year->racks as $rack) {
            foreach ($rack->folders as $folder) {
                foreach ($folder->files as $file) {
                    if ($file->path_file && Storage::disk('public')->exists($file->path_file)) {
                        Storage::disk('public')->delete($file->path_file);
                    }
                }
            }
        }
    }



    /**
     * Handle the Year "created" event.
     */
    // public function created(Year $year): void
    // {
    //     //
    // }

    // /**
    //  * Handle the Year "updated" event.
    //  */
    // public function updated(Year $year): void
    // {
    //     //
    // }

    // /**
    //  * Handle the Year "deleted" event.
    //  */
    // public function deleted(Year $year): void
    // {
    //     //
    // }

    // /**
    //  * Handle the Year "restored" event.
    //  */
    // public function restored(Year $year): void
    // {
    //     //
    // }

    // /**
    //  * Handle the Year "force deleted" event.
    //  */
    // public function forceDeleted(Year $year): void
    // {
    //     //
    // }
}
