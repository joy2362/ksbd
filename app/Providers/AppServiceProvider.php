<?php

namespace App\Providers;
use Illuminate\Support\Facades\View;
use App\SiteDetails;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Coupon;
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
        $siteinfo=SiteDetails::where('id',1)->get();
        $coupon=Coupon::where('status','1')->get();
        View::share(compact('siteinfo','coupon')  );
        
        Schema::defaultStringLength(191);
    }
}
