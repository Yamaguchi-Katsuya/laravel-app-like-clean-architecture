<?php

namespace App\Providers;

use App\Repositories\Admin\Article\ArticleRepository;
use App\Repositories\Admin\Article\ArticleRepositoryInterface;
use App\Repositories\Admin\ArticleCategory\ArticleCategoryRepository;
use App\Repositories\Admin\ArticleCategory\ArticleCategoryRepositoryInterface;
use App\Repositories\Admin\Tag\TagRepository;
use App\Repositories\Admin\Tag\TagRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            ArticleRepositoryInterface::class,
            ArticleRepository::class
        );
        $this->app->bind(
            ArticleCategoryRepositoryInterface::class,
            ArticleCategoryRepository::class
        );
        $this->app->bind(
            TagRepositoryInterface::class,
            TagRepository::class
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
