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

$deck = \Core\DeckFactory::make('PlayingCard');
$shuffler = new \Core\Shufflers\Shuffler();

$dealer = new \Core\Dealer($shuffler, $deck);
$dealer->shuffle();
//dd($dealer, collect($dealer->cards)->map(function ($card) {
//    return $card->display();
//}), $dealer->dealOneCard());
