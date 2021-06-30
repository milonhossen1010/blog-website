<?php

use Illuminate\Routing\RouteGroup;
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
    return view('website.home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/category', function () {
    return view('website.category');
});

Route::get('/about', function () {
    return view('website.about');
});


Route::get('/contact', function () {
    return view('website.contact');
});

 

// Admin panel route
Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function(){
    //Dashboard load
    Route::get('dashboard', function(){
        return view('admin.index');
    })->name('dashboard');

    //Category controller
    Route::resource('category', 'App\Http\Controllers\CategoryController');

});