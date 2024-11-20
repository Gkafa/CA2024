@extends('layouts.app')

@section('authors')
    <section id="authors">
        <h2>Our Authors</h2>

        @if ($authors->isEmpty())
            <p>No authors found.</p>
        @else
            <div class="authors-list">
                @foreach ($authors as $author)
                    <div class="author">
                        <h3>{{ $author->name }}</h3>
                        <p>Posts: {{ $author->posts->count() }}</p> <!-- Show how many posts this author has -->
                        <p><a href="{{ route('user.posts', $author) }}">View Posts</a></p> <!-- Link to author's posts -->
                    </div>
                @endforeach
            </div>
        @endif
    </section>
@endsection
