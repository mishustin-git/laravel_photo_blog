<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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
//     return view('main');
// });
Route::get('/', 'App\Http\Controllers\MainController@index');
Route::get('/about', 'App\Http\Controllers\MainController@about');

Route::get('/portfolio', function () {
    return view('portfolio');
});
// Route::get('/services', function () {
//     return view('services');
// });
Route::get('/services', 'App\Http\Controllers\MainController@services');
Route::get('/contact', function () {
    return view('contact');
});
Route::get('/admin', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/admin/main', 'App\Http\Controllers\MainController@change')->middleware(['auth'])->name('adm_main');
Route::get('/admin/slide', 'App\Http\Controllers\SliderController@index');
Route::get('/admin/slide/add', 'App\Http\Controllers\SliderController@add');
Route::get('/admin/slide/update', 'App\Http\Controllers\SliderController@update');
Route::post('/admin/slide/add', 'App\Http\Controllers\SliderController@add');
Route::post('/admin/slide/delete', 'App\Http\Controllers\SliderController@delete');
Route::post('/admin/slide/update', 'App\Http\Controllers\SliderController@update');
Route::post('/updatemain','App\Http\Controllers\MainController@update');
// 
Route::get('/admin/about', 'App\Http\Controllers\PageAboutController@index')->middleware(['auth'])->name('adm_about');
Route::post('/admin/about/update', 'App\Http\Controllers\PageAboutController@update');

Route::get('/admin/services', 'App\Http\Controllers\PageServicesController@index')->middleware(['auth'])->name('adm_services');
Route::post('/admin/services/update', 'App\Http\Controllers\PageServicesController@update');
Route::get('/admin/services/add', 'App\Http\Controllers\ServiceController@create');
Route::post('/admin/services/store', 'App\Http\Controllers\ServiceController@store');
Route::get('/admin/services/edit/{id}', 'App\Http\Controllers\ServiceController@edit');
Route::get('/admin/services/{id}', 'App\Http\Controllers\ServiceController@show');
Route::get('/admin/services/delete/{id}', 'App\Http\Controllers\ServiceController@destroy');
Route::post('/admin/services/upgrade', 'App\Http\Controllers\ServiceController@update');

require __DIR__.'/auth.php';
