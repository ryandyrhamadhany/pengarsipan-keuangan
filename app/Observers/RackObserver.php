<?php

namespace App\Observers;

use App\Models\DocumentRack;
use Illuminate\Support\Facades\Storage;

class RackObserver
{
    public function deleting(DocumentRack $rack)
    {
        foreach ($rack->folders as $folder) {
            foreach ($folder->files as $file) {
                if ($file->path_file && Storage::disk('public')->exists($file->path_file)) {
                    Storage::disk('public')->delete($file->path_file);
                }
            }
        }
    }

    /**
     * Handle the DocumentRack "created" event.
     */
    // public function created(DocumentRack $documentRack): void
    // {
    //     //
    // }

    // /**
    //  * Handle the DocumentRack "updated" event.
    //  */
    // public function updated(DocumentRack $documentRack): void
    // {
    //     //
    // }

    // /**
    //  * Handle the DocumentRack "deleted" event.
    //  */
    // public function deleted(DocumentRack $documentRack): void
    // {
    //     //
    // }

    // /**
    //  * Handle the DocumentRack "restored" event.
    //  */
    // public function restored(DocumentRack $documentRack): void
    // {
    //     //
    // }

    // /**
    //  * Handle the DocumentRack "force deleted" event.
    //  */
    // public function forceDeleted(DocumentRack $documentRack): void
    // {
    //     //
    // }
}
