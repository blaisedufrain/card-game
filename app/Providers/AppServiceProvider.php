<?php

namespace App\Providers;

use App\Interactions\CardGameSessionHandler;
use App\Interactions\SessionResolverInterface;
use App\Interactions\SessionSetterInterface;
use Core\Contracts\DealerContract;
use Core\Contracts\ShufflerContract;
use Core\Dealer;
use Core\DeckFactory;
use Core\Shufflers\DefaultShuffler;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\ServiceProvider;
use Prophecy\Exception\Doubler\ClassNotFoundException;

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
        $this->app->singleton(ShufflerContract::class, function () {
            $shufflerClass = 'Core\\Shufflers\\' . config('cards.shuffler') . 'Shuffler';
            if (!class_exists($shufflerClass)) {
                throw new ClassNotFoundException('Unable to find shuffler', $shufflerClass);
            }

            return new $shufflerClass;
        });
        $this->app->singleton(DealerContract::class, function () {
            return new Dealer($this->app->make(ShufflerContract::class), DeckFactory::make(config('cards.deck')));
        });
        $this->app->singleton(SessionResolverInterface::class, function () {
            return new CardGameSessionHandler($this->app->make(Session::class));
        });
        $this->app->singleton(SessionSetterInterface::class, function () {
            return new CardGameSessionHandler($this->app->make(Session::class));
        });
    }
}
