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


Route::get( 'login', [
  'as' => 'login',
  'uses' => 'Auth\LoginController@showLoginForm'
] );
Route::post( 'login', [
  'as' => '',
  'uses' => 'Auth\LoginController@login'
] );
Route::post( 'logout', [
  'as' => 'logout',
  'uses' => 'Auth\LoginController@logout'
] );

Route::group( [ 'middleware' => 'auth' ], function ()
{
    Route::get( '/', function () {
        return view( 'index' );
    });
    Route::get( '/medlemmar', function () {
        return view( 'members' );
    })->name( 'members' );
    Route::get( '/overaller', function () {
        return view( 'overalls' );
    })->name( 'overalls' );
    Route::get( '/nollning', function () {
        return view( 'initiation' );
    })->name( 'initiation' );
    Route::get( '/styrelsen', function () {
        return view( 'board' );
    })->name( 'board' );
    Route::get( '/dokument', function () {
        return view( 'documents' );
    })->name( 'documents' );
});
