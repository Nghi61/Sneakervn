<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Validator::extend('sizes_sum', function ($attribute, $value, $parameters, $validator) {
            $sizes = $value;
            $totalQuantity = $validator->getData()['quantity'];

            $sum = array_reduce($sizes, function ($total, $size) {
                return $total + $size;
            });
            if($sum<$totalQuantity){
                return false;
            }
            else if ($sum > $totalQuantity) {
                return false;
            } else {
                return true;
            }
        });

    }
}
