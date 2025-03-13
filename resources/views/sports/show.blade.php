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
