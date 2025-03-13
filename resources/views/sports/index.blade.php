@extends('layouts.app')

@section('content')

<div class="p-4">
    <h1 class="text-3xl font-bold text-center" :class="{ 'text-white': darkMode, 'text-black': !darkMode }">Welcome to the News Reader</h1>
    <p class="mt-2 text-center" :class="{ 'text-white': darkMode, 'text-black': !darkMode }">Explore the latest news in various categories</p>
</div>

<div class="container mx-auto my-8">
    <div class="p-4">
        <h3 class="text-3xl font-bold text-center" :class="{ 'text-white': darkMode, 'text-black': !darkMode }">Sports News</h3>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach($sportsArticles as $article)
        <div class="bg-white p-4 shadow-md rounded-lg">
            <img src="{{ $article->urlToImage}}" alt="Image" class="w-full h-48 object-cover rounded-lg mb-4">
            <h2 class="text-xl font-semibold text-gray-800">
                <a href="{{ route('sports.show', $article->id) }}" class="hover:text-blue-500">{{ $article->title }}</a>
            </h2>
            <p class="text-gray-600 mt-2">{{ Str::limit($article->content, 150) }}</p>
            <div class="article-favorites mt-3">
                <!-- Favorite Button Logic -->
                @if (Auth::check())
                    <!-- If the user is logged in, show the Add to Favorites button -->
                    @if (Auth::user()->favorites()->where('article_id', $article->id)->exists())
                        <form action="{{ route('article.unfavorite', ['id' => $article->id, 'category' => $article->category_id]) }}" method="POST">
                            @csrf
                            <button type="submit" class="text-red-500 hover:text-red-700">Remove from Favorites</button>
                        </form>
                    @else
                        <form action="{{ route('article.favorite', ['id' => $article->id, 'category' => $article->category_id]) }}" method="POST">
                            @csrf
                            <button type="submit" class="text-blue-500 hover:text-blue-700">Add to Favorites</button>
                        </form>
                    @endif
                @else
                    <!-- If the user is not logged in, redirect to the login page when they try to favorite -->
                    <a href="{{ route('login') }}" class="text-blue-500 hover:text-blue-700">Login to Favorite</a>
                @endif
            </div>
        </div>
        @endforeach
    </div>
    <!-- Pagination -->
    <div class="d-flex justify-content-center mt-4">
        {{ $sportsArticles->links() }}
    </div>
</div>

@endsection
