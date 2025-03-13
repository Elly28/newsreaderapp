<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\GeneralNews;
use Illuminate\Http\Request;

class GeneralNewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $generalArticles = Article::where('category_name', 'general')
        ->orderBy('publishedAt', 'desc') 
        ->paginate(6);
        $categories = Category::get();
        return view('general.index', compact('generalArticles', 'categories'));
    }

    /**
     * Display the specified resource.
     */
    public function show(GeneralNews $generalNews)
    {
        //
    }

}
