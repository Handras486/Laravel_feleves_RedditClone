<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\View\Composers\SubredditViewComposer;
use Illuminate\Database\Eloquent\Relations\Relation;

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
        Paginator::useBootstrap();
        view()->composer('*', SubredditViewComposer::class);

        Relation::enforceMorphMap([
            'post' => \App\Models\Post::class,
            'comment' => \App\Models\Comment::class,
            'vote' => \App\Models\Vote::class
        ]);
    }
}
