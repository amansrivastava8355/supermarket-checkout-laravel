<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Checkout\CheckoutService;

class CheckoutServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $pricingRules = [
            'A' => [
                'quantity' => 3,
                'specialPrice' => 130,
            ],
            'B' => [
                'quantity' => 2,
                'specialPrice' => 45,
            ],
            'C' => [
                'quantity' => 1,
                'specialPrice' => null,
            ],
            'D' => [
                'quantity' => 1,
                'specialPrice' => null,
            ],
        ];

        $this->app->bind(CheckoutService::class, function ($app) use ($pricingRules) {
            return new CheckoutService($pricingRules);
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
