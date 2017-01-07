<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::resource('veicoli', 'VeicoloController', ['only' => ['index', 'show']]);
Route::resource('fabricanti', 'FabricanteController');
Route::resource('fabricanti.veicoli', 'FabricanteVeicoloController', ['except' => ['show']]);

