<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\File;

class OnionViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot()
    {
        $modulePath = app_path('Http/Module');
        $this->addViewsFromModule($modulePath);
    }

    protected function addViewsFromModule($modulePath)
    {
        $directories = File::directories($modulePath);

        foreach ($directories as $moduleDirectory) {
            $presentationViewPath = $moduleDirectory . '/Presentation/View';
            if (File::isDirectory($presentationViewPath)) {
                View::addLocation($presentationViewPath);
            }
        }
    }
}
