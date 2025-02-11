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

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('login', ['as' => 'login', 'uses' => 'Auth\LoginController@showLoginForm']);
Route::post('login', ['as' => 'login.post', 'uses' => 'Auth\LoginController@login']);
Route::post('logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);

// Redirect root path
Route::get('/', function () {
    return auth()->check() ? view('index') : redirect('/login');
});

// Protect routes with authentication middleware
Route::middleware(['auth'])->group(function () {
    Route::get( '/initiation-handler', function() {
        return view( 'initiationHandle' );
    } )->name( 'initiationHandle' );

    Route::get( '/clothes', 'FetchClothes' )->name( 'clothes' );
    Route::patch( 'updateOveralls', 'UpdateOverallCount' );
    Route::patch( 'updateShirts', 'UpdateInitiationShirtsCount' );

    Route::resources([
        'song' => 'SongController',
        'board' => 'BoardController',
        'event' => 'EventController',
        'member' => 'MemberController',
        'partner' => 'PartnerController',
        'association' => 'AssociationController',
        'day' => 'InitiationDaysController',
        'initiation' => 'InitiationController',
        'person' => 'InitiationKeyPeopleController',
        'admins' => 'AdminsController',
    ]);
});

// Logout route (POST request required)
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');
