<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\CitiesController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\InitiativesController;
use App\Http\Controllers\TastierLifeController;
use App\Http\Controllers\ToursController;


use Illuminate\Http\Request;
use Illuminate\Http\Cookie;
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
Route::post('/search', [LandingController::class, 'search'])->name('search');

Route::get('/cities/view/{id}', [CitiesController::class, 'index'])->name('cities.view');
Route::get('/initiatives/view', [InitiativesController::class, 'index'])->name('initiatives.index');
Route::get('/tastier_life/view', [TastierLifeController::class, 'index'])->name('tastier_life.index');
Route::get('/tours/view', [ToursController::class, 'index'])->name('tours.index');

Route::get('/stats', [LandingController::class, 'stats'])->name('landing.stats');
Route::get('/calendar', [LandingController::class, 'calendar'])->name('landing.calendar');
Route::get('/contact', [LandingController::class, 'contact'])->name('landing.contact');


/*ADMIN PANEL*/
Route::get('/login', [AdminController::class, 'login'])->name('admin.login');
Route::get('/recover_password', [AdminController::class, 'recover_password'])->name('admin.recover_password');

//Route::get('/admin/home', [AdminController::class, 'index'])->name('admin.index');
Route::get('/admin/home', function(){return redirect()->route('admin.cities');})->name('admin.index');

Route::get('/admin/cities', [AdminController::class, 'cities'])->name('admin.cities');
Route::post('/admin/cities', [AdminController::class, 'cities']);
Route::get('/admin/cities/{id}', [CitiesController::class, 'cities_edit'])->name('admin.cities_edit');
Route::get('/admin/citiesDelete/{id}', [CitiesController::class, 'delete']);
Route::get('/admin/citiesFind/{id}', [AdminController::class, 'citiesFind']);
Route::post('/admin/store', [CitiesController::class, 'citiesStoreUpdate']);
Route::post('/admin/completeUpdate', [CitiesController::class, 'citiesCompleteUpdate']);


Route::get('/admin/initiatives', [AdminController::class, 'initiatives'])->name('admin.initiatives');
Route::get('/admin/initiatives/create', [InitiativesController::class, 'initiatives_new'])->name('admin.initiatives_new');
Route::get('/admin/initiatives/{id}', [InitiativesController::class, 'initiatives_edit'])->name('admin.initiatives_edit');

Route::get('/admin/tastier_life', [AdminController::class, 'tastier_life'])->name('admin.tastier_life');
Route::get('/admin/tastier_life/recipe/create', [TastierLifeController::class, 'recipe_new'])->name('admin.recipe_new');
Route::get('/admin/tastier_life/recipe/{id}', [TastierLifeController::class, 'recipe_edit'])->name('admin.recipe_edit');
Route::get('/admin/tastier_life/chef/create', [TastierLifeController::class, 'chef_new'])->name('admin.chef_new');
Route::get('/admin/tastier_life/chef/{id}', [TastierLifeController::class, 'chef_edit'])->name('admin.chef_edit');


Route::get('/admin/tours', [AdminController::class, 'tours'])->name('admin.tours');
Route::get('/admin/tours/create', [ToursController::class, 'tour_new'])->name('admin.tour_new');
Route::get('/admin/tours/{id}', [ToursController::class, 'tour_edit'])->name('admin.tour_edit');

Route::get('/admin/about', [AdminController::class, 'about'])->name('admin.about');

Route::get('/admin/contact', [AdminController::class, 'contact'])->name('admin.contact');
Route::get('/admin/contact/create', [ContactController::class, 'contact_new'])->name('admin.contact_new');
Route::get('/admin/contact/{id}', [ContactController::class, 'contact_edit'])->name('admin.contact_edit');


Route::get('/admin/main_site', [AdminController::class, 'main'])->name('admin.main');
Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');
Route::get('/admin/newsletter', [AdminController::class, 'newsletter'])->name('admin.newsletter');


Route::post('/admin/addPDF', [AdminController::class, 'addPDF']);
