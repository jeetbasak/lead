<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

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
        Schema::defaultStringLength(191);
         // $month=array('jan','feb','mar','apl','may','jun','jul','aug','sep','oct','nov','dec');
         //                        $date=date('m');
         //                        $newDate=explode("0", $date);
         //                        dd($date);
        //dd(date('F'));
    }
}
