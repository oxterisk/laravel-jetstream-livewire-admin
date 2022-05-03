<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\UserController;

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

Route::middleware(['auth:sanctum', 'verified'])->group( function() {

    Route::get( '/dashboard', function () {
        return view( 'dashboard' );
    })->name( 'dashboard' );

});

Route::middleware(['middleware' => 'admins'])->group( function() {

    Route::get( '/users', function () {
        return view( 'admin.users.index' );
    })->name( 'users.index' );

    Route::get( '/roles', function () {
        return view( 'admin.roles.index' );
    })->name( 'roles.index' );

    Route::get( '/permissions', function () {
        return view( 'admin.permissions.index' );
    })->name( 'permissions.index' );

    Route::get( '/modules', function () {
        return view( 'modules.index' );
    })->name( 'modules.index' );

    Route::get( '/companies', function () {
        return view( 'companies.index' );
    })->name( 'companies.index' );

});
