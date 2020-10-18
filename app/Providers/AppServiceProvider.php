<?php

namespace App\Providers;

use Core\BankIntegration\IntegrationInterface;
use Core\BankIntegration\SomeBankClient;
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
        app()->bind(IntegrationInterface::class, SomeBankClient::class);
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
