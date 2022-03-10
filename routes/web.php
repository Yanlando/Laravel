<?php


use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardPostController;
use GuzzleHttp\Middleware;
use Illuminate\Routing\Route as RoutingRoute;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
    return view('home', [
        "title" => "Home",
        'active' => 'home',
        
    ]);
});
Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/{postingan:slug}', [PostController::class, 'show']);

Route::get('/categories', function(){
    return view('categories', [
        'title' => 'Post Categories',
        'active' => 'categories',
        'categories' => Category::all()
    ]);
});
Route::get('/categories/{category:slug}', function(Category $category) {
    return view('posts', [
        'title' =>"Post by Category: $category->name",
        'active' => 'categories',
        'posts' =>$category->post->load('category','author'),

    ]);
});

Route::get('/about', function () {
    
    return view('About', [
        "title" => "About",
        'active' => 'about',
        "name" => "Yan lando Tambunan",
        "email" => "yanlandotambunan@gmail.com",
        "image" => "image1.jpg",
            ] );
        });

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');  
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', function() {
    return view('dashboard.index');
})->middleware('auth');    

// Route::resource('/dashboard/posts', [DashboardPostController::class])->middleware('auth');
Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');

Route::get('/dashboard/post/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');



// Route::get('posts/{slug}', function($slug){
            
            //     // // $newpost = [];
            //     // // foreach($blog_posts as $post)
            //     // // if($post["ubah"] === $slug){
//     // //     $newpost = $post;

//     // }
//     return view('post', [
//         "title" => "Single Post",
//         "post" => Post::find($slug)
//     ]);
// });


// Route::get('/authors/{author:username}', function(User $author) {
//     return view('posts', [
//         'title' =>"Post by Author: $author->name",
//         'active' => 'posts',
//         'posts' =>$author->posts->load('category','author'), 
//     ]);
// });