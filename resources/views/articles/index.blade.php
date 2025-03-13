@extends('layouts.app')

@section('content')

<div class="p-4">
    <h1 class="text-3xl font-bold text-center" :class="{ 'text-white': darkMode, 'text-black': !darkMode }">Welcome to the News Reader</h1>
    <p class="mt-2 text-center" :class="{ 'text-white': darkMode, 'text-black': !darkMode }">Explore the latest news in various categories</p>
</div>

<div class="container mx-auto my-8">
    <div class="p-4">
        <h3 class="text-3xl font-bold text-center" :class="{ 'text-white': darkMode, 'text-black': !darkMode }">News</h3>
        <h6 class="underline text-center" :class="{ 'text-white': darkMode, 'text-black': !darkMode }"><a href="{{ route('general') }}">Click here for more news!</a> </h6>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach($latestArticles as $article)
        <div class="bg-white p-4 shadow-md rounded-lg">
            <img src="{{ $article->urlToImage}}" alt="Image" class="w-full h-48 object-cover rounded-lg mb-4">
            <h2 class="text-xl font-semibold text-gray-800">
                <a href="" class="hover:text-blue-500">{{ $article->title }}</a>
            </h2>
            <p class="text-gray-600 mt-2">{{ Str::limit($article->content, 150) }}</p>
        </div>
        @endforeach
    </div>
    <br><br>
    <hr>
</div>

<div class="container mx-auto my-8">
    <div class="p-4">
        <h3 class="text-3xl font-bold text-center" :class="{ 'text-white': darkMode, 'text-black': !darkMode }">Sports</h3>
        <h6 class="underline text-center" :class="{ 'text-white': darkMode, 'text-black': !darkMode }"><a href="{{ route('sports') }}">Click here for more news!</a> </h6>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach($sportsArticles as $article)
        <div class="bg-white p-4 shadow-md rounded-lg">
            <img src="{{ $article->urlToImage}}" alt="Image" class="w-full h-48 object-cover rounded-lg mb-4">
            <h2 class="text-xl font-semibold text-gray-800">
                <a href="" class="hover:text-blue-500">{{ $article->title }}</a>
            </h2>
            <p class="text-gray-600 mt-2">{{ Str::limit($article->content, 150) }}</p>
        </div>
        @endforeach
    </div>
    <br><br>
    <hr>
</div>

<div class="container mx-auto my-8">
    <div class="p-4">
        <h3 class="text-3xl font-bold text-center" :class="{ 'text-white': darkMode, 'text-black': !darkMode }">Business</h3>
        <h6 class="underline text-center" :class="{ 'text-white': darkMode, 'text-black': !darkMode }"><a href="{{ route('business') }}">Click here for more news!</a> </h6>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach($businessArticles as $article)
        <div class="bg-white p-4 shadow-md rounded-lg">
            <img src="{{ $article->urlToImage}}" alt="Image" class="w-full h-48 object-cover rounded-lg mb-4">
            <h2 class="text-xl font-semibold text-gray-800">
                <a href="" class="hover:text-blue-500">{{ $article->title }}</a>
            </h2>
            <p class="text-gray-600 mt-2">{{ Str::limit($article->content, 150) }}</p>
        </div>
        @endforeach
    </div>
    <br><br>
    <hr>
</div>

<div class="container mx-auto my-8">
    <div class="p-4">
        <h3 class="text-3xl font-bold text-center" :class="{ 'text-white': darkMode, 'text-black': !darkMode }">Health</h3>
        <h6 class="underline text-center" :class="{ 'text-white': darkMode, 'text-black': !darkMode }"><a href="{{ route('health') }}">Click here for more news!</a> </h6>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach($healthArticles as $article)
        <div class="bg-white p-4 shadow-md rounded-lg">
            <img src="{{ $article->urlToImage}}" alt="Image" class="w-full h-48 object-cover rounded-lg mb-4">
            <h2 class="text-xl font-semibold text-gray-800">
                <a href="" class="hover:text-blue-500">{{ $article->title }}</a>
            </h2>
            <p class="text-gray-600 mt-2">{{ Str::limit($article->content, 150) }}</p>
        </div>
        @endforeach
    </div>
    <br><br>
    <hr>
</div>

<div class="container mx-auto my-8">
    <div class="p-4">
        <h3 class="text-3xl font-bold text-center" :class="{ 'text-white': darkMode, 'text-black': !darkMode }">Technology</h3>
        <h6 class="underline text-center" :class="{ 'text-white': darkMode, 'text-black': !darkMode }"><a href="{{ route('technology') }}">Click here for more news!</a> </h6>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach($techArticles as $article)
        <div class="bg-white p-4 shadow-md rounded-lg">
            <img src="{{ $article->urlToImage}}" alt="Image" class="w-full h-48 object-cover rounded-lg mb-4">
            <h2 class="text-xl font-semibold text-gray-800">
                <a href="" class="hover:text-blue-500">{{ $article->title }}</a>
            </h2>
            <p class="text-gray-600 mt-2">{{ Str::limit($article->content, 150) }}</p>
        </div>
        @endforeach
    </div>
    <br><br>
    <hr>
</div>

@endsection
