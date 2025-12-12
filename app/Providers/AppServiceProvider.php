<?php

namespace App\Providers;

use App\Models\Job;;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Pagination\Paginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;

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
        Model::preventLazyLoading();

    //    Gate::define('edit-job', function (User $user, Job $job) {
    //        return $job->employer->user->is($user); 
        
    //     });

        Gate::define('update-job', function ($user, $job) {
        return $job->employer->user->is($user) && 'foo' !== 'bar';
        });

        Gate::define('delete-job', function ($user, $job) {
         return $job->employer->user->is($user) && 'foshizzle' !== 'faux chisel';
        });	
    }
}
