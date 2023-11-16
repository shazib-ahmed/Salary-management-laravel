<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::group(['middleware' => 'isAdmin','prefix' => 'admin', 'as' => 'admin.'], function() {
    Route::get('dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard.index');
    Route::resource('permissions', \App\Http\Controllers\Admin\PermissionController::class);
    Route::delete('permissions_mass_destroy', [\App\Http\Controllers\Admin\PermissionController::class, 'massDestroy'])->name('permissions.mass_destroy');
    Route::resource('roles', \App\Http\Controllers\Admin\RoleController::class);
    Route::delete('roles_mass_destroy', [\App\Http\Controllers\Admin\RoleController::class, 'massDestroy'])->name('roles.mass_destroy');
    Route::resource('users', \App\Http\Controllers\Admin\UserController::class);
    Route::delete('users_mass_destroy', [\App\Http\Controllers\Admin\UserController::class, 'massDestroy'])->name('users.mass_destroy');

    // countries
    Route::resource('countries', \App\Http\Controllers\Admin\CountryController::class);
    Route::delete('countries_mass_destroy', [\App\Http\Controllers\Admin\CountryController::class, 'massDestroy'])->name('countries.mass_destroy');

    // countries
    Route::resource('seasons', \App\Http\Controllers\Admin\SeasonController::class);
    Route::delete('seasons_mass_destroy', [\App\Http\Controllers\Admin\SeasonController::class, 'massDestroy'])->name('seasons.mass_destroy');

    // teams
    Route::resource('teams', \App\Http\Controllers\Admin\TeamController::class);
    Route::delete('teams_mass_destroy', [\App\Http\Controllers\Admin\TeamController::class, 'massDestroy'])->name('teams.mass_destroy');
    
    // teams
    Route::resource('players', \App\Http\Controllers\Admin\PlayerController::class);
    Route::delete('players_mass_destroy', [\App\Http\Controllers\Admin\PlayerController::class, 'massDestroy'])->name('players.mass_destroy');

    // salary
    Route::resource('salaries', \App\Http\Controllers\Admin\SalaryController::class);
    Route::delete('salaries_mass_destroy', [\App\Http\Controllers\Admin\SalaryController::class, 'massDestroy'])->name('salaries.mass_destroy');

    Route::get('search', [\App\Http\Controllers\Admin\SearchController::class, 'search'])->name('search');
});

Auth::routes(['register' => false]);

