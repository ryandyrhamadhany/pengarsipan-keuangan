<?php

namespace App\Observers;

use App\Models\ArchiveFile;
use Illuminate\Support\Facades\Storage;

class ArchiveFileObserver
{
    public function deleting(ArchiveFile $file)
    {
        if ($file->path_file && Storage::disk('public')->exists($file->path_file)) {
            Storage::disk('public')->delete($file->path_file);
        }
    }

    /**
     * Handle the ArchiveFile "created" event.
     */
    // public function created(ArchiveFile $archiveFile): void
    // {
    //     //
    // }

    // /**
    //  * Handle the ArchiveFile "updated" event.
    //  */
    // public function updated(ArchiveFile $archiveFile): void
    // {
    //     //
    // }

    // /**
    //  * Handle the ArchiveFile "deleted" event.
    //  */
    // public function deleted(ArchiveFile $archiveFile): void
    // {
    //     //
    // }

    // /**
    //  * Handle the ArchiveFile "restored" event.
    //  */
    // public function restored(ArchiveFile $archiveFile): void
    // {
    //     //
    // }

    // /**
    //  * Handle the ArchiveFile "force deleted" event.
    //  */
    // public function forceDeleted(ArchiveFile $archiveFile): void
    // {
    //     //
    // }
}
