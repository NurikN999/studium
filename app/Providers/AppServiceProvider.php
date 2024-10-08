<?php

namespace App\Providers;

use App\Modules\City\Repositories\CityRepository;
use App\Modules\City\Repositories\Interfaces\CityRepositoryInterface;
use App\Modules\Course\Repositories\CourseRepository;
use App\Modules\Course\Repositories\Interfaces\CourseRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(CityRepositoryInterface::class, CityRepository::class);
        $this->app->bind(CourseRepositoryInterface::class, CourseRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
