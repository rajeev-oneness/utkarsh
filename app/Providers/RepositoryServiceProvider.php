<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Contracts\CategoryContract;
use App\Repositories\CategoryRepository;
use App\Contracts\BannerContract;
use App\Repositories\BannerRepository;
use App\Contracts\AdminContract;
use App\Repositories\AdminRepository;
use App\Contracts\LanguageContract;
use App\Repositories\LanguageRepository;
use App\Contracts\ShowContract;
use App\Repositories\ShowRepository;
use App\Contracts\UserContract;
use App\Repositories\UserRepository;
use App\Contracts\PackageContract;
use App\Repositories\PackageRepository;
use App\Contracts\BlogContract;
use App\Repositories\BlogRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    protected $repositories = [
        AdminContract::class        =>  AdminRepository::class,
        CategoryContract::class     =>  CategoryRepository::class,
        BannerContract::class       =>  BannerRepository::class,
        LanguageContract::class     =>  LanguageRepository::class,
        ShowContract::class         =>  ShowRepository::class,
        PackageContract::class      =>  PackageRepository::class,
        UserContract::class         =>  UserRepository::class,
        BlogContract::class         =>  BlogRepository::class,
    ];

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        foreach ($this->repositories as $interface => $implementation)
        {
            $this->app->bind($interface, $implementation);
        }
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
