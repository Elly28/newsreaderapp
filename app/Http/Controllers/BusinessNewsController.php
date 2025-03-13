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
    public function show(BusinessNews $businessNews)
    {
        //
    }

}
