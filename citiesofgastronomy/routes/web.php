<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\CitiesController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\InitiativesController;
use App\Http\Controllers\TastierLifeController;
use App\Http\Controllers\ToursController;
use App\Http\Controllers\AboutController;


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
Route::post('/initiatives', [LandingController::class, 'initiatives_search'])->name('landing.initiatives_search');
Route::get('/tastier_life', [LandingController::class, 'tastier_life'])->name('landing.tastier_life');
Route::post('/tastier_life', [LandingController::class, 'tastierLife_search'])->name('landing.tastierLife_search');
Route::get('/tours', [LandingController::class, 'tours'])->name('landing.tours');
Route::post('/tours', [LandingController::class, 'tours_search'])->name('landing.tours_search');
Route::post('/search', [LandingController::class, 'search'])->name('search');

Route::post('/newslettersave', [LandingController::class, 'newsletter']);

Route::get('/cities/view/{id}', [CitiesController::class, 'index'])->name('cities.view');
Route::get('/initiatives/view/{id}', [InitiativesController::class, 'index'])->name('initiatives.view');
Route::get('/tastier_life/view/{id}', [TastierLifeController::class, 'index'])->name('tastier_life.view');
Route::get('/tours/view/{id}', [ToursController::class, 'index'])->name('tours.view');

Route::get('/stats', [LandingController::class, 'stats'])->name('landing.stats');
Route::get('/calendar', [LandingController::class, 'calendar'])->name('landing.calendar');
Route::get('/contact', [LandingController::class, 'contact'])->name('landing.contact');

Route::get('/privacy_policy', [LandingController::class, 'privacy_policy'])->name('landing.privacy_policy');
Route::get('/terms_and_conditions', [LandingController::class, 'terms_conditions'])->name('landing.terms_conditions');



/*ADMIN PANEL*/
Route::get('/login', [AdminController::class, 'login'])->name('admin.login');
Route::get('/reset_password', [AdminController::class, 'reset_password'])->name('admin.reset_password');
Route::post('/account/reset_password', [AdminController::class, 'user_resetPassword'])->name('admin.reset_user_password'); //sends email
Route::get('/create_password/{token}', [AdminController::class, 'show_resetPassword'])->name('admin.show_reset__password'); //url form email



//create_password

//Route::get('/admin/home', [AdminController::class, 'index'])->name('admin.index');
Route::get('/admin/home', function(){return redirect()->route('admin.cities');})->name('admin.index');

Route::get('/admin/cities', [AdminController::class, 'cities'])->name('admin.cities');
Route::post('/admin/cities', [AdminController::class, 'cities']);
Route::get('/admin/cities/{id}', [CitiesController::class, 'cities_edit'])->name('admin.cities_edit');
Route::post('/admin/cities/delete', [CitiesController::class, 'cities_delete']);
Route::get('/admin/citiesFind/{id}', [AdminController::class, 'citiesFind']);
Route::post('/admin/store', [CitiesController::class, 'citiesStoreUpdate']);
Route::post('/admin/completeUpdate', [CitiesController::class, 'citiesCompleteUpdate']);


Route::get('/admin/initiatives', [AdminController::class, 'initiatives'])->name('admin.initiatives');
Route::get('/admin/initiatives?section=in&page=1', [AdminController::class, 'initiatives'])->name('admin.initiatives.in');
Route::post('/admin/initiatives', [InitiativesController::class, 'initiatives_search']);
Route::get('/admin/initiatives/create', [InitiativesController::class, 'initiatives_new'])->name('admin.initiatives_new');
Route::post('/admin/initiatives/store', [InitiativesController::class, 'initiatives_store']);
Route::post('/admin/initiatives/delete', [InitiativesController::class, 'initiatives_delete']);
Route::get('/admin/initiatives/{id}', [InitiativesController::class, 'initiatives_edit'])->name('admin.initiatives_edit');
Route::post('/admin/initiatives/typeOfActivity/store', [InitiativesController::class, 'typeOfActivity_save']);
Route::post('/admin/initiatives/typeOfActivity/delete', [InitiativesController::class, 'typeOfActivity_delete']);
Route::post('/admin/initiatives/topic/store', [InitiativesController::class, 'topics_save']);
Route::post('/admin/initiatives/topic/delete', [InitiativesController::class, 'topics_delete']);
Route::post('/admin/initiatives/sdg/store', [InitiativesController::class, 'sdg_save']);
Route::post('/admin/initiatives/sdg/delete', [InitiativesController::class, 'sdg_delete']);
Route::post('/admin/initiatives/connection/store', [InitiativesController::class, 'connection_save']);
Route::post('/admin/initiatives/connection/delete', [InitiativesController::class, 'connection_delete']);

Route::get('/admin/tastier_life', [AdminController::class, 'tastier_life'])->name('admin.tastier_life');
Route::get('/admin/tastier_life?section=recipes&page=1', [AdminController::class, 'tastier_life'])->name('admin.tastier_life.recipes');
Route::post('/admin/tastier_life', [TastierLifeController::class, 'tastier_life_search'])->name('admin.tastier_life_search');
Route::get('/admin/tastier_life/recipe/create', [TastierLifeController::class, 'recipe_new'])->name('admin.recipe_new');
Route::post('/admin/tastier_life/recipe/store', [TastierLifeController::class, 'recipe_save'])->name('admin.recipe_save');
Route::get('/admin/tastier_life/recipe/vote/{id}', [TastierLifeController::class, 'recipe_vote']);
Route::post('/admin/tastier_life/recipe/delete', [TastierLifeController::class, 'recipe_delete']);
Route::get('/admin/tastier_life/recipe/{id}', [TastierLifeController::class, 'recipe_edit'])->name('admin.recipe_edit');
Route::get('/admin/tastier_life/chef/create', [TastierLifeController::class, 'chef_new'])->name('admin.chef_new');
Route::post('/admin/tastier_life/chef/store', [TastierLifeController::class, 'chef_save'])->name('admin.chef_save');
Route::post('/admin/tastier_life/chef/delete', [TastierLifeController::class, 'chef_delete']);
Route::get('/admin/tastier_life/chef/{id}', [TastierLifeController::class, 'chef_edit'])->name('admin.chef_edit');
Route::post('/admin/tastier_life/category/store', [TastierLifeController::class, 'category_save']);
Route::post('/admin/tastier_life/category/delete', [TastierLifeController::class, 'category_delete']);


Route::get('/admin/tours', [AdminController::class, 'tours'])->name('admin.tours');
Route::post('/admin/tours', [AdminController::class, 'tours'])->name('admin.tours_search');
Route::get('/admin/tours/create', [ToursController::class, 'tour_new'])->name('admin.tour_new');
Route::get('/admin/tours/{id}', [ToursController::class, 'tour_edit'])->name('admin.tour_edit');
Route::post('/admin/tours/store', [ToursController::class, 'tour_save'])->name('admin.tour_save');
Route::post('/admin/tours/delete', [ToursController::class, 'tour_delete'])->name('admin.tour_delete');

Route::get('/admin/about', [AdminController::class, 'about'])->name('admin.about');
Route::post('/admin/about', [AdminController::class, 'about']);
Route::get('/admin/timelineFind/{id}', [AboutController::class, 'timelineFind']);
Route::post('/admin/timelineSave', [AboutController::class, 'timelineSave']);
Route::get('/admin/faqFind/{id}', [AboutController::class, 'faqFind']);
Route::post('/admin/faqSave', [AboutController::class, 'faqSave']);
Route::post('/admin/aboutDel', [AboutController::class, 'aboutDel']);

Route::get('/admin/contact', [AdminController::class, 'contact'])->name('admin.contact');
Route::post('/admin/contact', [AdminController::class, 'contact']);
Route::get('/admin/contact/create', [ContactController::class, 'contact_new'])->name('admin.contact_new');
Route::post('/admin/contact/save', [ContactController::class, 'save']);
Route::get('/admin/contact/{id}', [ContactController::class, 'contact_edit'])->name('admin.contact_edit');
Route::get('/admin/ContactDelete/{id}', [ContactController::class, 'delete']);


Route::get('/admin/main_site', [AdminController::class, 'main'])->name('admin.main');
Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');
Route::post('/admin/users', [AdminController::class, 'users'])->name('admin.users_search');
Route::post('/admin/users/store', [AdminController::class, 'users_save'])->name('admin.users_save');
Route::post('/admin/users/delete', [AdminController::class, 'users_delete'])->name('admin.users_delete');

Route::get('/admin/newsletter', [AdminController::class, 'newsletter'])->name('admin.newsletter');
Route::post('/newsletter/DownloadVerify', [AdminController::class, 'newsletterDownloadVerify']);

Route::post('/admin/addPDF', [AdminController::class, 'addPDF']);
Route::post('/admin/bannerUpdate', [AdminController::class, 'mainBannerUp']);
Route::post('/admin/bannerDelete', [AdminController::class, 'mainBannerDelete']);
Route::post('/admin/bannerChange', [AdminController::class, 'mainBannerChange']);

Route::post('/admin/mainSiteContentLinks', [AdminController::class, 'mainLinksSave']);
Route::post('/admin/mainSiteContentClusterInfo', [AdminController::class, 'mainClusterSave']);
