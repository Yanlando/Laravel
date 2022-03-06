<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;

use App\Models\Category;
use Illuminate\Http\Request;


class PostController extends Controller
{
    //
    public function index()
    {   
        // dd(request('search'));
        $title='';
        if(request('category')){
            $category = Category::firstWhere('slug', request('category'));
            $title = ' in ' . $category->name;
        }

        if(request('author')){
            $author = User::firstWhere('username', request('author'));
            $title = ' by ' . $author->name;
        }
        return view('posts', [
            "title" => "Semua Posts" . $title,
            // "posts" => Post::all(),
            "active" => 'posts',
            'posts' => Post::latest()->filter(request(['search','category','author']))->paginate(7)->withquerystring()
        ]);
    }

    public function show(Post $postingan)
    {
        return view('post', [
            "title" => "Single Post",
            "active" => 'posts',
            "post" => $postingan
        ]);
    }
}
