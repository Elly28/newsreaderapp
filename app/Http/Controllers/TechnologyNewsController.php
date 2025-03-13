<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;

class TechnologyNewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $techArticles = Article::where('category_name', 'technology')
            ->orderBy('publishedAt', 'desc') 
            ->paginate(6);

        $categories = Category::get();
        return view('technology.index', compact('techArticles', 'categories'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Retrieve the article by ID
        $article = Article::findOrFail($id);
        $categories = Category::get();

        // Return the single article view with the article data
        return view('technology.show', compact('article', 'categories'));
    }

}
