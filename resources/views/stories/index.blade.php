@extends('layouts.app')

@section('content')

<div class="container">
<h1>All Stories</h1>
@foreach ($stories as $story)
    <div>
        <h2>{{ $story->title }}</h2>
        <p>{{ $story->description }}</p>
        <p>By: {{ $story->author->name }}</p>
        <a href="{{ route('stories.show', $story->id) }}" class="btn btn-primary">View Story</a>
    </div>
@endforeach

{{ $stories->links() }}
</div>
@endsection
