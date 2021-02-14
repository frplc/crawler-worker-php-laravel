<?php

namespace App\Providers;

use App\Services\CrawlerWorker\BrowserDriverPerformerCrawler;
use App\Services\CrawlerWorker\PlainDownloaderCrawler;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind("PlainDownloaderCrawler", function ($app){
           return new PlainDownloaderCrawler();
        });

        $this->app->bind("BrowserDriverPerformerCrawler", function ($app){
            return new BrowserDriverPerformerCrawler();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
