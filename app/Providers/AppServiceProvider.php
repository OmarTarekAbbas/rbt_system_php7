<?php

namespace App\Providers;

use View;
use App\Contract;
use App\ContractItem;
use App\ContractRenew;
use App\ContractRequest;
use App\Observers\ContractObserver;
use App\Constants\FullApproveStatus;
use App\Observers\ContractItemObserver;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use App\Observers\ContractRenewObserver;
use App\Observers\ContractRequestObserver;

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
        ContractItem::observe(ContractItemObserver::class);
        // ContractRequest::observe(ContractRequestObserver::class);
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
