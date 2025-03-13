<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\HealthNews;
use Illuminate\Http\Request;

class HealthNewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $healthArticles = Article::where('category_name', 'health')
            ->orderBy('publishedAt', 'desc') 
            ->paginate(6);
        $categories = Category::get();
        return view('health.index', compact('healthArticles', 'categories'));
        
    }

    /**
     * Display the specified resource.
     */
    public function show(HealthNews $healthNews)
    {
        //
    }

}
