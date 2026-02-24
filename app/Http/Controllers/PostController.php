<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Category;
use App\Models\Comment;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $posts = Post::all();
        return view("posts.index", compact('posts'));
    }
    public function show(Post $post){
        $comments = Comment::all();
        $category = Category::findOrFail($post->category_id);
        return view("posts.show", compact('post', 'category', 'comments'));
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
    public function edit(Post $post){
        $categories = Category::all();
        return view('posts.edit', compact('post', 'categories'));
    }
    public function update(Request $request, Post $post){
        $validated = $request->validate([
            "content" => ["required", "max:100"],
            "category" => ["required"]
        ]);
        $post->update([
            "content" => $validated["content"],
            "category_id" => $validated["category"]
        ]);
        $post->save();
        return redirect("/posts/$post->id");
    }
    public function destroy(Post $post){
        $comments = Comment::all();
        foreach($comments as $comment){
            if($comment->blog_id == $post->id){
                $comment->delete();
            }
        }
        $post->delete();
        return redirect('/posts');
    }
}
