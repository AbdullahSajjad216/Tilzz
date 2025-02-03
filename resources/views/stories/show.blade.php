@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $story->title }}</h1>
    <p>{{ $story->description }}</p>

    <h2>Episodes</h2>
    @foreach ($story->episodes as $episode)
        <div>
            <h3>{{ $episode->title }}</h3>
            <p>{{ $episode->content }}</p>
            <p>By: {{ $episode->author->name }}</p>

            @if ($episode->created_by === auth()->id())
                <a href="{{ route('episodes.edit', $episode->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('episodes.destroy', $episode->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            @endif
        </div>
    @endforeach

    <h2>Add New Episode</h2>
    <form action="{{ route('episodes.store', $story->id) }}" method="POST">
        @csrf
        <div>
            <label for="title">Title</label>
            <input type="text" name="title" required>
        </div>
        <div>
            <label for="content">Content</label>
            <textarea name="content" required></textarea>
        </div>
        <button type="submit" class="btn btn-success">Add Episode</button>
    </form>
</div>
@endsection
