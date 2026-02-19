<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $posts = Post::all();
        return view("posts.index", compact('posts'));
    }
    public function show(Post $post){
        return view("posts.show", compact('post'));
    }
    public function create(Post $post){
        $categories = Category::all();
        return view("posts.create", compact('post', 'categories'));
    }
    public function store(Request $request){
        $validated = $request->validate([
            "content" => ["required", "max:100"],
            "category" => ["required"]
        ]);
        Post::create([
            "content" => $validated["content"],
            "category_id" => $validated["category"]
        ]);
        return redirect('/posts');
    }
}
