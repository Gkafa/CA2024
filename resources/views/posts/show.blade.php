@extends('layouts.app')

@section('content')
    <div class="bg-white px-6 py-32 lg:px-8">
        <div class="mx-auto max-w-3xl text-base/7 text-gray-700">
            <p class="text-base/7 font-semibold text-indigo-600">Introducing</p>
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
    <div>

    </div>

    <div>
        @foreach($post->comments as $comment)
            <div>{{ $comment->body }} from {{ $comment->name }}</div>
            <div>{{ $comment->created_at->diffForHumans() }}</div>
            <form action="{{ route('comment.delete', $comment->id) }}" method="POST">
                @csrf  <!-- CSRF token for security -->
                @method('DELETE')  <!-- This tells Laravel to treat the form as a DELETE request -->

                <button type="submit" class="btn btn-danger">Delete</button>  <!-- Button to submit the form -->
            </form>

        @endforeach
    </div>

{{--    @section("authors")--}}
{{--    @show--}}
    <!-- resources/views/posts/show.blade.php -->
    <form id="comment-form" action="{{ route('comment', $post->id) }}" method="POST">
        @csrf
        <div>
            <label for="name">Your Name</label>
            <input type="text" id="name" required name="name">
        </div>

        <div>
            <label for="body">Your Comment</label>
            <textarea id="body" required name="body"></textarea>
        </div>

        <div>
            <button type="submit">Post Comment</button>
        </div>
    </form>

@endsection
