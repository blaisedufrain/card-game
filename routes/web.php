<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
/** @var $router \Illuminate\Routing\Router */
Route::get('/card-game/start', 'CardGameController@start');
Route::get('/card-game/play', 'CardGameController@play')->name('play');
Route::get('/card-game/status', 'CardGameController@getStatus');
Route::post('/card-game/deal-next', 'CardGameController@dealNextCard')->name('deal');
//Route::get('/playing-card-game', function () {
//   $dealer = app(\Core\Contracts\DealerContract::class);
//   /** @var $dealer \Core\Dealer */
//    $dealer->shuffle();
//   try {
//       return ['card' => $dealer->dealOneCard()->display()];
//   } catch (\Core\Exceptions\NoCardsRemainingException $exception) {
//       return ['card' => 'Game Over'];
//   }
//});