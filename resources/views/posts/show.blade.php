@extends('layouts.app')

@section('content')
    <div class="bg-white px-6 py-32 lg:px-8">
        <div class="mx-auto max-w-3xl text-base/7 text-gray-700">
            <p class="text-base/7 font-semibold text-black">Introducing</p>
            <h1 class="mt-2 text-pretty text-4xl font-semibold tracking-tight text-gray-900 sm:text-5xl">{{ $post->title }}</h1>
            <p class="mt-6 text-xl/8">{{ $post->excerpt }}</p>
            <figure class="mt-16">
                <img class="aspect-video rounded-xl bg-gray-50 object-cover"
                    src="{{ $post->image }}"
                    alt="">
            </figure>
            <div class="mt-16 max-w-2xl">
                <p class="mt-6">{{ $post->body }}</p>
            </div>
            <div>
                By {{ $post->author->name }}
            </div>
        </div>
    </div>
    <div class="mx-auto max-w-3xl text-base/7 text-gray-700">
        @foreach($post->comments as $comment)
            <div>{{ $comment->body }} from {{ $comment->name }}</div>
            <div>{{ $comment->created_at->diffForHumans() }}</div>
            <form action="{{ route('comment.delete', $comment->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-gray-400 text-black focus:ring-4 focus:ring-red-300 focus:outline-none font-medium rounded-lg text-base px-6 py-3 w-auto inline-flex items-center justify-center shadow-lg mb-12">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" viewBox="0 0 24 24" class="w-5 h-5 mr-2" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                    Delete
                </button>
            </form>
        @endforeach
    </div>
    <form id="comment-form" action="{{ route('comment', $post->id) }}" method="POST" class="bg-gray-50 p-6 rounded-lg shadow-md max-w-3xl mx-auto">
        @csrf
        <div class="mb-6">
            <label for="name" class="block text-lg font-semibold text-gray-700 mb-2">Your Name</label>
            <input type="text" name="name" id="name" required class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-gray-500 focus:border-transparent">
        </div>
        <div class="mb-6">
            <label for="body" class="block text-lg font-semibold text-gray-700 mb-2">Your Comment</label>
            <textarea name="body" id="body" required class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-gray-500 focus:border-transparent h-32 resize-none"></textarea>
        </div>
        <div>
            <button type="submit" class="w-full py-3 bg-gray-400 text-black dark:hover:text-white font-semibold rounded-md hover:bg-gray-600 transition-colors">Post Comment</button>
        </div>
    </form>
@endsection
