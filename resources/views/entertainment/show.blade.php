@extends('layouts.app')

@section('content')
<div class="container mx-auto my-8">
    <div class="bg-white p-6 shadow-md rounded-lg">
        <h1 class="text-3xl font-semibold text-gray-800 mb-4">{{ $article->title }}</h1>
        <img src="{{ asset('storage/' . $article->image ?? 'default.jpg') }}" alt="Image" class="w-full h-64 object-cover rounded-lg mb-4">
        <p class="text-gray-700 text-lg">{{ $article->content }}</p>
    </div>
</div>
@endsection
