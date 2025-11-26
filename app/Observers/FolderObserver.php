<?php

namespace App\Observers;

use App\Models\DocumentFolder;
use Illuminate\Support\Facades\Storage;

class FolderObserver
{
    public function deleting(DocumentFolder $folder)
    {
        foreach ($folder->files as $file) {
            if ($file->path_file && Storage::disk('public')->exists($file->path_file)) {
                Storage::disk('public')->delete($file->path_file);
            }
        }
    }

    // /**
    //  * Handle the DocumentFolder "created" event.
    //  */
    // public function created(DocumentFolder $documentFolder): void
    // {
    //     //
    // }

    // /**
    //  * Handle the DocumentFolder "updated" event.
    //  */
    // public function updated(DocumentFolder $documentFolder): void
    // {
    //     //
    // }

    // /**
    //  * Handle the DocumentFolder "deleted" event.
    //  */
    // public function deleted(DocumentFolder $documentFolder): void
    // {
    //     //
    // }

    // /**
    //  * Handle the DocumentFolder "restored" event.
    //  */
    // public function restored(DocumentFolder $documentFolder): void
    // {
    //     //
    // }

    // /**
    //  * Handle the DocumentFolder "force deleted" event.
    //  */
    // public function forceDeleted(DocumentFolder $documentFolder): void
    // {
    //     //
    // }
}
