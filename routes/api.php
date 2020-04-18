<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/contacts/{contact}', 'ContactsController@show');
Route::post('/contacts', 'ContactsController@store');
/**
 * @example
 * can be used the PATCH method also
 *
 * Route::patch('/contacts/{contact}', 'ContactsController@update');
 *
 * Route::match(array('PUT', 'PATCH'), "/contacts/{contact}", array(
 *  'uses' => 'ContactsController@update',
 *  'as' => 'contacts.update'
 * ));
 */
Route::put('/contacts/{contact}', 'ContactsController@update');
Route::delete('/contacts/{contact}', 'ContactsController@destroy');
