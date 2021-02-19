<?php

namespace Gidkom\Ovvar;

use Illuminate\Support\ServiceProvider;

class VoucherServiceProvider extends ServiceProvider {
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('voucher', Voucher::class);
    }
}