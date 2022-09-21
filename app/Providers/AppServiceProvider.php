<?php

namespace App\Providers;

use App\Models\BuyMedicament;
use App\Observers\BuyMedicamentObserver;
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
        BuyMedicament::observe(BuyMedicamentObserver::class);
    }
}
