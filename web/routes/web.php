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

Route::resource('teams', 'TeamController');
Route::resource('players', 'PlayerController');
Route::resource('leagues', 'LeagueController');
Route::resource('games', 'GameController');
Route::resource('stats','StatController');
Route::resource('zweite_liga','ZweiteLigaController');
Route::resource('dritte_liga','DritteLigaController');
Route::resource('hometable','HomeTableController');
Route::resource('guesttable','GuestTableController');
Route::resource('hometable_zweite_liga','HomeTableZweiteLigaController');
Route::resource('guesttable_zweite_liga','GuestTableZweiteLigaController');
Route::resource('hometable_dritte_liga','HomeTableDritteLigaController');
Route::resource('guesttable_dritte_liga','GuestTableDritteLigaController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
