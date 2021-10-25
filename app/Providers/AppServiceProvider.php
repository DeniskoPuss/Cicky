<?php

namespace App\Providers;

use App\Models\Reservation;
use App\Models\User;
use App\Observers\ReservationObserver;
use App\Observers\UserObserver;
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
    public function boot()
    {
        User::observe(UserObserver::class);
        Reservation::observe(ReservationObserver::class);
    }
}
