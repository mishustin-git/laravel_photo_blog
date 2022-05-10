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

Route::get('/about', function () {
    return view('about');
});
Route::get('/portfolio', function () {
    return view('portfolio');
});
Route::get('/services', function () {
    return view('services');
});
Route::get('/contact', function () {
    return view('contact');
});
Route::get('/admin', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/admin/main', 'App\Http\Controllers\MainController@change')->middleware(['auth'])->name('adm_main');
Route::get('/admin/slide', 'App\Http\Controllers\SliderController@index');
Route::post('/admin/slide/delete', 'App\Http\Controllers\SliderController@delete');
Route::get('/admin/slide/add', 'App\Http\Controllers\SliderController@add');
Route::post('/admin/slide/add', 'App\Http\Controllers\SliderController@add');
Route::get('/admin/slide/update', 'App\Http\Controllers\SliderController@update');
Route::post('/admin/slide/update', 'App\Http\Controllers\SliderController@update');
Route::post('/updatemain','App\Http\Controllers\MainController@update');


require __DIR__.'/auth.php';
