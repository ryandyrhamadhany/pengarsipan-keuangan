<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\ArchiveFile;
use App\Models\Cabinet;
use App\Models\Category;
use App\Models\DocumentFolder;
use App\Models\DocumentRack;
use App\Models\SubCategory;
use App\Models\Year;
use App\Observers\ArchiveFileObserver;
use App\Observers\CabinetObserver;
use App\Observers\CategoryObserver;
use App\Observers\FolderObserver;
use App\Observers\RackObserver;
use App\Observers\SubCategoryObserver;
use App\Observers\YearObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        ArchiveFile::observe(ArchiveFileObserver::class);
        DocumentFolder::observe(FolderObserver::class);
        DocumentRack::observe(RackObserver::class);
        Year::observe(YearObserver::class);
        SubCategory::observe(SubCategoryObserver::class);
        Category::observe(CategoryObserver::class);
        Cabinet::observe(CabinetObserver::class);
    }
}
