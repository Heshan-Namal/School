<?php

namespace App\Providers;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use ConsoleTVs\Charts\Registrar as Charts;

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
        Paginator::useBootstrap();
        $charts->register([
            \App\Charts\ParticipateChart::class,
            \App\Charts\ResultAssChart::class,
            \App\Charts\ClasspresChart::class,
            \App\Charts\AttentiveChart::class,
            \App\Charts\TodayAttentiveChart::class,
            \App\Charts\StudentAttentiveChart::class,
            \App\Charts\StudentAssChart::class,
            \App\Charts\TermtestMarks::class
        ]);
    }
}
