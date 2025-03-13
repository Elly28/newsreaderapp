<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Favorite;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function addToFavorites($id, $category)
    {        
        $article = Article::where([
            'id' => $id,
            'category_id' => $category,
         ])->get();

        $user = Auth::user();

        // Check if the article is already favorited
        if (!$user->favorites()->where([
            'article_id' => $id,
            'category_name' => $article[0]->category_name,
            'category_id' => $category,
         ])->exists()) {
            $user->favorites()->create([
                'article_id' => $id,
                'category_name' => $article[0]->category_name,
                'category_id' => $category,
             ]);
        }

        return redirect()->back()->with('success', 'Article added to favorites!');
    }

    // Remove an article from favorites
    public function removeFromFavorites($id, $category)
    {
        $article = Article::findOrFail($id);
        $user = Auth::user();

        // Remove from favorites if it exists
        $favorite = $user->favorites()->where('article_id', $article->id)->first();
        if ($favorite) {
            $favorite->delete();
        }

        return redirect()->back()->with('success', 'Article removed from favorites!');
    }

    // Show all favorites for the logged-in user
    public function showFavorites()
    {
        $user = Auth::user();
        // $favorites = $user->favoriteArticles()->latest()->paginate(6); // Pagination
        $favoriteArticles = $user->favoriteArticles()->latest()->with('category')->paginate(6); // 

        $categories = Category::get();
        return view('favorites.index', compact('favoriteArticles', 'categories'));
    }
}
