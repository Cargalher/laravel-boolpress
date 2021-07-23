<?php

// use App\Http\Controllers\PostController;
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

/*Pages not connected to a model*/
Route::get('/', 'PageController@index');
Route::get('about', 'PageController@about');
Route::get('contacts', 'PageController@contacts');

/*PostS pages*/
Route::get('posts', 'PostController@index')->name('posts.index');
Route::get('posts/{post}', 'PostController@show')->name('posts.show');

/*guest Routes*/


Route::resource('posts', PostController::class)->only('index', 'show');



Auth::routes();





/*admin Routes*/
Route::middleware('auth')->prefix('admin')->namespace('Admin')->name('admin.')->group(function (){
    Route::get('/', 'HomeController@index')->name('dashboard');
    Route::resource('posts', PostController::class);
});