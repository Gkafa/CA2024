@extends('layouts.app')

@section('content')
    <div class="mx-auto max-w-2xl text-center">
    <h1 class="text-balance text-4xl font-semibold tracking-tight text-gray-900 sm:text-5xl">Promoted Posts</h1>

    @if ($posts->isEmpty())
        <p>No promoted posts found.</p>
    @else
        @foreach ($posts as $post)
            <x-post :post="$post" />
        @endforeach
        <div class="pagination">
            {{ $posts->links() }}
        </div>
    @endif
    </div>
@endsection
