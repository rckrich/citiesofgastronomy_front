<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\CitiesController;
use App\Http\Controllers\InitiativesController;
use App\Http\Controllers\TastierLifeController;
use App\Http\Controllers\ToursController;


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

Route::get('/', [LandingController::class, 'index'])->name('landing.index');
Route::get('/cities', [LandingController::class, 'cities'])->name('landing.cities');
Route::get('/about', [LandingController::class, 'about'])->name('landing.about');
Route::get('/initiatives', [LandingController::class, 'initiatives'])->name('landing.initiatives');
Route::get('/tastier_life', [LandingController::class, 'tastier_life'])->name('landing.tastier_life');
Route::get('/tours', [LandingController::class, 'tours'])->name('landing.tours');
Route::get('/search', [LandingController::class, 'search'])->name('search');//cambiar por post después

Route::get('/cities/view', [CitiesController::class, 'index'])->name('cities.index');
Route::get('/initiatives/view', [InitiativesController::class, 'index'])->name('initiatives.index');
Route::get('/tastier_life/view', [TastierLifeController::class, 'index'])->name('tastier_life.index');
Route::get('/tours/view', [ToursController::class, 'index'])->name('tours.index');

Route::get('/stats', [LandingController::class, 'stats'])->name('landing.stats');
Route::get('/calendar', [LandingController::class, 'calendar'])->name('landing.calendar');
Route::get('/contact', [LandingController::class, 'contact'])->name('landing.contact');