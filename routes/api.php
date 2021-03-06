<?php

use App\Http\Resources\PostResource;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


// without Controller
//  all the Posts response json

/*Route::get('posts', function () {
    $posts = Post::all();
    // using json response (customizable output) 
    return response()->json([
        'total_results' => count($posts),
        'status_code' => 200,
        'response' => $posts
    ]);
}); */


 // no customizable
// Route::get('posts', function () {
//     $posts = Post::all();
//     return $posts;
// });


// route with pagination
/*Route::get('posts', function () {
    $posts = Post::paginate(5);
    return $posts;
});*/



// route with relations & with NO pagination
/* Route::get('posts', function () {
    $posts = Post::with(['category', 'tags'])->get();
    // ddd($posts);
    return $posts;
}); */



// route with relations & with pagination
/* Route::get('posts', function () {
    $posts = Post::with(['category', 'tags'])->paginate();
    // ddd($posts);
    return $posts;
}); */

Route::get('posts', 'API\PostController@index');


// API single resource
Route::get('posts/{post}', function (Post $post){
    return new PostResource($post);
});