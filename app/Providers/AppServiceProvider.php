<?php

namespace App\Providers;

use App\Interactions\CardGameSessionHandler;
use App\Interactions\SessionResolverInterface;
use App\Interactions\SessionSetterInterface;
use Core\Contracts\DealerContract;
use Core\Dealer;
use Core\DeckFactory;
use Core\Shufflers\Shuffler;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(DealerContract::class, function () {
            return new Dealer(new Shuffler, DeckFactory::make(config('cards.deck')));
        });
        $this->app->singleton(SessionResolverInterface::class, function () {
            return new CardGameSessionHandler($this->app->make(Session::class));
        });
        $this->app->singleton(SessionSetterInterface::class, function () {
            return new CardGameSessionHandler($this->app->make(Session::class));
        });
    }
}
