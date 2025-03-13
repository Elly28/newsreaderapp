@extends('layouts.app')

@section('content')

<div class="container mx-auto my-8">
    <div class="row">
        <div class="bg-white p-6 shadow-md rounded-lg">
        <!-- Article Content -->
        <div class="col-lg-8 offset-lg-2">
            <div class="article-detail mb-5">
                <h2 class="text-3xl font-bold mb-3">{{ $article->title }}</h2>
                <p class="text-gray-500">{{ $article->publishedAt }} | Category: <span class="text-blue-500">{{ $article->category_name }}</span></p>
                <div class="article-image my-4">
                    <img src="{{ $article->urlToImage ?? 'https://via.placeholder.com/750x400' }}" alt="{{ $article->title }}" class="w-full h-auto rounded-lg">
                </div>
                <div class="article-content">
                    <p>{!! nl2br(e($article->content)) !!}</p>  <!-- Display article content with proper formatting -->
                </div>

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
                
                <div class="article-link">
                    <a href="{{ $article->url }}" class="text-blue-500 hover:underline mt-5 inline-block">Click for full article</a>  <!-- Display article content with proper formatting -->
                </div>
                <a href="{{ url()->previous() }}" class="text-blue-500 hover:underline mt-5 inline-block">Back to Articles</a>
            </div>
        </div>
    </div>
    </div>
</div>

@endsection
