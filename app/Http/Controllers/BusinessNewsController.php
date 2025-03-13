<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\BusinessNews;
use App\Models\Category;

class BusinessNewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {        
        $businessArticles = Article::where('category_name', 'business')
        ->orderBy('publishedAt', 'desc')  // Optionally, you can order the articles by the creation date
        ->paginate(6);

        $categories = Category::get();
        return view('business.index', compact('businessArticles', 'categories'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Retrieve the article by ID
        $article = Article::findOrFail($id);
        $article->increment('read_count'); // Increment the read count
        $categories = Category::get();

        // Return the single article view with the article data
        return view('business.show', compact('article', 'categories'));
    }

}
