<?php

namespace App\Providers;

use ConsoleTVs\Charts\Registrar as Charts;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Charts $charts)
    {
        //
        $charts->register([
            \App\Charts\ParticipateChart::class,
            \App\Charts\ResultAssChart::class,
            \App\Charts\ClasspresChart::class,
            \App\Charts\AttentiveChart::class,
            \App\Charts\TodayAttentiveChart::class
        ]);
    }
}
