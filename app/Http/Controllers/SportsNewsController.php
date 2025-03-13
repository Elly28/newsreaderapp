<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\SportsNews;
use Illuminate\Http\Request;

class SportsNewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sportsArticles = Article::where('category_name', 'sports')
            ->orderBy('publishedAt', 'desc') 
            ->paginate(6);

        $categories = Category::get();
        return view('sports.index', compact('sportsArticles', 'categories'));
    }

    /**
     * Display the specified resource.
     */
    public function show(SportsNews $sportsNews)
    {
        //
    }

}
