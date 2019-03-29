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

    Route::get( '/overaller', function () {
        return view( 'overall' );
    })->name( 'overall' );

    Route::get( '/nollning', function () {
        return view( 'initiation' );
    })->name( 'initiation' );

    Route::get( '/styrelsen', function () {
        return view( 'board' );
    })->name( 'board' );

    Route::get( '/dokument', function () {
        return view( 'documents' );
    })->name( 'documents' );

    Route::get( '/medlem', function()
    {
        return view( 'member.index' );
    } )->name( 'member.index' );

    Route::get( '/medlem/redigera', function()
    {
        return view( 'member.{id}.edit' );
    } );
    
    Route::get( '/medlem/visa', function()
    {
        return view( 'member.{id}' );
    } );
});
