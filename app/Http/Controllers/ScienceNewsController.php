<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\ScienceNews;
use Illuminate\Http\Request;

class ScienceNewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $scienceArticles = Article::where('category_name', 'science')
            ->orderBy('publishedAt', 'desc') 
            ->paginate(6);

        $categories = Category::get();
        return view('science.index', compact('scienceArticles', 'categories'));
    }

    /**
     * Display the specified resource.
     */
    public function show(ScienceNews $scienceNews)
    {
        //
    }

}
