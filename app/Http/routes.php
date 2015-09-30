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

Route::get('test', function(){
    $in = App::make('App\Procedures\PersonasProcedures');
    $q = $in->guardar('', '', '', '', '', '', '', '', '', '', '');
    dd($q);
});

Route::controller('residencias', 'ResidenciasController');

Route::get('logout', 'AuthController@logout');
Route::post('login', 'AuthController@postLogin');
Route::get('login', 'AuthController@getLogin');

Route::controller('', 'HomeController');