<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\Post;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view('categories.index', compact("categories"));
    }
    public function show(Category $category){
        return view('categories.show', compact("category"));
    }
    public function create(Category $category){
        return view('categories.create', compact("category"));
    }
    public function store(Request $request){
        $validated = $request->validate([
            "name" => ["required", "max:50"]
        ]);
        Category::create([
            "name" => $validated["name"]
        ]);
        return redirect("/categories");
    }
    public function edit(Category $category){
        return view('categories.edit', compact("category"));
    }
    public function update(Request $request, Category $category){
        $validated = $request->validate([
            "name" => ["required", "max:50"]
        ]);
        $category->name = $validated["name"];
        $category->save();
        return redirect("/categories/$category->id");
    }
    public function destroy(Category $category){
        $category->delete();
        return redirect("/categories");
    }
}
