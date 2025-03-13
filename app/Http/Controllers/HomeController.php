<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use jcobhams\NewsApi\NewsApi;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articlesCount = Article::count();
        $categories = Category::count();

        if ($articlesCount === 0) {
            $this->getArticles();
        }

        if ($categories === 0) {
            $this->setCategories();
        }

        $categories = Category::get();
        $articles = Article::all();
        $sortedArticles = $articles->sortByDesc('created_at');
        $groupedArticles = $sortedArticles->groupBy('category_name');

        $latestArticles = $groupedArticles['general']->take(6) ?? [];
        $sportsArticles = $groupedArticles['sports']->take(6) ?? [];
        $techArticles = $groupedArticles['technology']->take(6) ?? [];
        $businessArticles = $groupedArticles['business']->take(6) ?? [];
        $entertainmentArticles = $groupedArticles['entertainment']->take(6) ?? [];
        $healthArticles = $groupedArticles['health']->take(6) ?? [];
        $science = $groupedArticles['science']->take(6) ?? [];
        
        return view('articles.index', 
        compact('categories', 'latestArticles', 
        'sportsArticles', 'techArticles', 
        'businessArticles', 'entertainmentArticles', 
        'healthArticles', 'science'));
    }

    public function getArticles(){

        $categories = Category::all();
        $newsapi = new NewsApi(env('NEWS_API_KEY'));

        foreach ($categories as $category) {
                        
            $top_headlines = $newsapi->getTopHeadlines($category->name);
            $articles = $top_headlines->articles ?? [];

            if ($articles !== []) {
                foreach ($articles as $article) {
                    $timestamp = Carbon::parse($article->publishedAt)->timestamp;
                    $published_at = Carbon::createFromTimestamp($timestamp)->toDateTimeString() ?? now();
        
                    Article::updateOrCreate(
                        ['title' => trim($article->title)],
                        [
                            'author' => trim($article->author) ?? 'No author available',
                            'content' => trim($article->content) ?? 'No content available',
                            'description' => trim($article->description) ?? 'No description available',
                            'category_id' => $category->id ?? '1',
                            'category_name' => $category->name ?? 'general',
                            'url' => $article->url ?? '',
                            'urlToImage' => $article->urlToImage ?? '',
                            'source' => $article->source->name ?? 'Unknown',
                            'publishedAt' => $published_at,
                        ]
                    );
                }
            }
        }
    }

    public function setCategories()
    {
        $categories = [
            'business',
            'entertainment',
            'general',
            'health',
            'science',
            'sports',
            'technology',
        ];

        foreach ($categories as $category) {
            Category::updateOrCreate(
                ['name' => $category]
            );
        }
    }
}
