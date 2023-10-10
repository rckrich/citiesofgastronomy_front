<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;


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

Route::get('/news', [LandingController::class, 'news'])->name('landing.news');
Route::get('/events', [LandingController::class, 'events'])->name('landing.events');
Route::get('/open_calls', [LandingController::class, 'open_calls'])->name('landing.open_calls');
Route::get('/projects', [LandingController::class, 'projects'])->name('landing.projects');

Route::get('/stats', [LandingController::class, 'stats'])->name('landing.stats');
Route::get('/calendar', [LandingController::class, 'calendar'])->name('landing.calendar');
Route::get('/contact', [LandingController::class, 'contact'])->name('landing.contact');