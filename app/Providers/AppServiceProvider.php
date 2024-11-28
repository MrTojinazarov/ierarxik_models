<?php

namespace App\Providers;

use App\Models\Agent;
use App\Models\Product;
use App\Observers\AgentObserver;
use App\Observers\ProductObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        Agent::observe(AgentObserver::class);
        Product::observe(ProductObserver::class);
    }
}
