<?php

namespace App\Providers;
//Category

use App\Models\Album;
use App\Models\User;
use App\Models\Picture;
use App\Repositories\User\UserRepository;
use App\Repositories\Album\AlbumRepository;
use App\Repositories\Picture\PictureRepository;
use App\Repositories\Album\Elqouent\AlbumRepositoryEloquent;
use App\Repositories\User\Elqouent\UserRepositoryEloquent;
use App\Repositories\Picture\Elqouent\PictureRepositoryEloquent;
use Illuminate\Support\ServiceProvider;
  
class AppRepositoryProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
    
        $this->app->bind(UserRepository::class, function(){
            return new UserRepositoryEloquent(new User);
        });

        $this->app->bind(AlbumRepository::class, function(){
            return new AlbumRepositoryEloquent(new Album);
        });
        $this->app->bind(PictureRepository::class, function(){
            return new PictureRepositoryEloquent(new Picture);
        });

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
