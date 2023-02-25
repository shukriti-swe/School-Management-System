<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\NotificationInfo;
use Illuminate\Support\Facades\Session;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Schema::defaultStringLength(191);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        View::composer('backend.includes.header', function($view) {
            $view->with('notificationinfo', NotificationInfo::get());
            $view->with('schoolnotification', NotificationInfo::where(['receiver_status' => 1, 'receiver_id' => Session::get('school_id')])->get());
            $view->with('trainernotification', NotificationInfo::where(['receiver_status'=> 2, 'receiver_id'=> Session::get('trainer_id')])->get());
            $view->with('studentnotification', NotificationInfo::where(['receiver_status'=> 3, 'receiver_id' => Session::get('student_id')])->get());
        });


        Paginator::useBootstrap();

        Blade::component('components.backend-breadcrumbs', 'backendBreadcrumbs');
    }
}
