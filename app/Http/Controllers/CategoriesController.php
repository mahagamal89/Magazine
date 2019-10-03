<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoriesController extends Controller
{
    //
    public function show($id){
        $category = Category::findOrFail($id);
        $articles = $category->articles()->where('is_active', '1')->get();
        return view('categories.show', compact('articles', 'category'));
    }
}
