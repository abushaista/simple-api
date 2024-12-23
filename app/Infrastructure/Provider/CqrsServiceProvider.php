<?php

namespace App\Infrastructure\Provider;

use Illuminate\Support\ServiceProvider;
use App\Core\Domain\Repositories\UserRepository;
use App\Infrastructure\Persistent\EloquentUser;
use App\Core\Application\Dispatcher;
use App\Core\Application\Commands\CreateUserCommandHandler;

class CqrsServiceProvider extends ServiceProvider {

    public function register(){
        $this->app->bind(UserRepository::class, EloquentUser::class);
        $this->app->singleton(Dispatcher::class, function($app) {
            return new Dispatcher();
        });

        $this->app->bind(CreateUserCommandHandler::class, function($app){
            return new CreateUserCommandHandler($app->make(UserRepository::class));
        });
    }
}