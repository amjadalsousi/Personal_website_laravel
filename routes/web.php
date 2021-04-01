<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\MainPagesController;
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

// Route::get('/', function () {
//     return view('pages.index');
// });


//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'PagesController@index')->name('index');

Route::prefix('admin')->group(function () {
    Route::get('/dashboard', 'PagesController@dashboard')->name('admin.dashboard');
    Route::get('/main', 'MainPagesController@index')->name('admin.main');
    Route::put('/main/update', 'MainPagesController@update')->name('admin.main.update');
    Route::get('/services/create', 'ServiceController@create')->name('admin.services.create');
    Route::post('/services/store', 'ServiceController@store')->name('admin.services.store');
    Route::get('/services/list', 'ServiceController@list')->name('admin.services.list');
    Route::get('/services/edit/{id}', 'ServiceController@edit')->name('admin.services.edit');
    Route::post('/services/update/{id}', 'ServiceController@update')->name('admin.services.update');
    Route::delete('/services/destroy/{id}', 'ServiceController@destroy')->name('admin.services.destroy');

    Route::get('/portfolios/create', 'PortfolioController@create')->name('admin.portfolios.create');
    Route::PUT('/portfolios/store', 'PortfolioController@store')->name('admin.portfolios.store');
    Route::get('/portfolios/list', 'PortfolioController@lists')->name('admin.portfolios.list');
    Route::get('/portfolios/edit/{id}', 'PortfolioController@edit')->name('admin.portfolios.edit');
    Route::post('/portfolios/update/{id}', 'PortfolioController@update')->name('admin.portfolios.update');
    Route::delete('/portfolios/destroy/{id}', 'PortfolioController@destroy')->name('admin.portfolios.destroy');

    Route::get('/abouts/create', 'AboutController@create')->name('admin.abouts.create');
    Route::PUT('/abouts/store', 'AboutController@store')->name('admin.abouts.store');
    Route::get('/abouts/list', 'AboutController@lists')->name('admin.abouts.list');
    Route::get('/abouts/edit/{id}', 'AboutController@edit')->name('admin.abouts.edit');
    Route::post('/abouts/update/{id}', 'AboutController@update')->name('admin.abouts.update');
    Route::delete('/abouts/destroy/{id}', 'AboutController@destroy')->name('admin.abouts.destroy');
});
Auth::routes();
Route::post('/contact', 'ContactController@store')->name('contact.store');