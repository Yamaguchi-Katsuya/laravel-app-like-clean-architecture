<?php

namespace App\Providers;

use App\Http\Services\FileServiceInterface;
use App\Http\Services\S3Service;
use Illuminate\Support\ServiceProvider;

class ServicesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            FileServiceInterface::class,
            S3Service::class
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
