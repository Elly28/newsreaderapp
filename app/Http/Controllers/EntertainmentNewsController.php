<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\EntertainmentNews;
use Illuminate\Http\Request;

class EntertainmentNewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $entertainmentArticles = Article::where('category_name', 'entertainment')
        ->orderBy('publishedAt', 'desc') 
        ->paginate(6);
        $categories = Category::get();
        return view('entertainment.index', compact('entertainmentArticles', 'categories'));
    }

    /**
     * Display the specified resource.
     */
    public function show(EntertainmentNews $entertainmentNews)
    {
        //
    }
}
