<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;

//use Illuminate\Http\Request;
//use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
//        $allCategories = ['Category 1', 'Category 2'];
        // access to data in database directly
//        $allCategories = DB::table('categories')->get();
        // or access to data in database using model : to create model we use make:model Model_name
        $categories = Category::all();
//        $posts = Post::latest()->get();
//        $posts = Post::where('category_id', request('category_id'))
//            ->latest()
//            ->get();

        $posts = Post::when( request('category_id'), function ($query) {
                    $query->where('category_id', request('category_id'));
                    })
                    ->latest()
                    ->get();
//        return view('index', ['categories' => $categories, 'posts' => $posts]);
        // if argument name like variables name we can use compact
        return view('index', compact('categories', 'posts'));
    }
}
