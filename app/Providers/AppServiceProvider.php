<?php

namespace App\Providers;

use App\Models\BuyMedicament;
use App\Models\MedicamentTransfer;
use App\Observers\BuyMedicamentObserver;
use App\Observers\MedicamentTransferObserver;
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
        MedicamentTransfer::observe(MedicamentTransferObserver::class);
    }
}
