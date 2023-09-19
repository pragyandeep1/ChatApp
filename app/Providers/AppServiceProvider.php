<?php

namespace App\Providers;

use App\Models\Service;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', function ($view) {
            $path = ltrim(request()->path(), '/');
            $view->with('path', $path);
        });
        // View::composer('*', function ($view) {
        //     $popularSearches = Service::whereNotNull('seo_tags')
        //         ->where('seo_tags', '!=', '')
        //         ->orderBy('seller_name', 'asc')
        //         ->groupBy('seo_tags') // Group the records by 'seo_tags' to avoid duplicates
        //         ->limit(50)
        //         ->select('id', 'category_id', 'type', 'seller_name', 'seo_tags')
        //         ->get();
        //     $view->with('popularSearches', $popularSearches);
        // });
        View::composer('*', function ($view) {
            $popularSearches = Service::join('categories', 'services.category_id', '=', 'categories.id')
                ->whereNotNull('services.seo_tags')
                ->where('services.seo_tags', '!=', '')
                ->orderBy('services.seller_name', 'asc')
                ->groupBy('services.seo_tags') // Group the records by 'seo_tags' to avoid duplicates
                ->limit(50)
                ->select('services.id', 'services.category_id', 'services.seller_name', 'services.seo_tags', 'categories.parent_id')
                ->get();
            $view->with('popularSearches', $popularSearches);
        });
        
        Paginator::useBootstrap();
    }
}
