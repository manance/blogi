<?php

namespace App\Http\Controllers;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request){
        $validated = $request->validate([
            "comment" => ["required", "max:100"],
            "author" => ["required"],
            "id" => ["required"]
        ]);
        Comment::create([
            "comment" => $validated["comment"],
            "author" => $validated["author"],
            "blog_id" => $validated["id"]
        ]);
        return redirect("/posts/" . $validated["id"]);
    }
    public function edit(Comment $comment){
        return view('comments.edit', compact('comment'));
    }
    public function update(Request $request, Comment $comment){
        $validated = $request->validate([
            "comment" => ["required", "max:100"],
        ]);
        $comment->update([
            "comment" => $validated["comment"],
        ]);
        $comment->save();
        return redirect("/posts/" . $comment->blog_id);
    }
    public function destroy(Comment $comment){
        $comment->delete();
        return redirect("/posts/" . $comment->blog_id);
    }
}
