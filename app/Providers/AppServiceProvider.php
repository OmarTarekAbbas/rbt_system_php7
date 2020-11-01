<?php

namespace App\Providers;

use App\Constants\FullApproveStatus;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Contract;
use App\ContractRenew;
use App\Observers\ContractObserver;
use App\Observers\ContractRenewObserver;
use View;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        Contract::observe(ContractObserver::class);
        ContractRenew::observe(ContractRenewObserver::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
      View::composer("*", function ($view) {
          $view->with("approveStatus", FullApproveStatus::class);
      });

    }
}
