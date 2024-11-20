@extends('layouts.app')

@section('content')
    <h1>Promoted Posts</h1>

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
@endsection
