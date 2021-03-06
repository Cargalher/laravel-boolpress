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

/*Pages not connected to a model, statics pages*/
Route::get('/', 'PageController@index')->name('home');
Route::get('about', 'PageController@about')->name('about');
Route::get('contacts', 'PageController@contacts')->name('contacts');
Route::post('contacts', 'PageController@sendContactForm')->name('contacts.send');

/*PostS pages*/
Route::get('posts', 'PostController@index')->name('posts.index');
Route::get('posts/{post}', 'PostController@show')->name('posts.show');



// Categories

Route::get('categories/{category:slug}', 'CategoryController@show')->name('categories.show');
/*guest Routes*/


// Route::resource('posts', PostController::class)->only('index', 'show');



Route::get('vue-posts', function(){
    return view('posts');
});


Auth::routes(['register'=>false]);





/*admin Routes*/
Route::middleware('auth')->prefix('admin')->namespace('Admin')->name('admin.')->group(function (){
    Route::get('/', 'HomeController@index')->name('dashboard');
    Route::resource('posts', PostController::class);
});