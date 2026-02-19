<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;

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
}
