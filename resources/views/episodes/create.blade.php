@extends('layouts.app')

@section('content')
<h1>Add New Episode</h1>
{{-- <form action="{{ route('episodes.store', $storyId) }}" method="POST"> --}}
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
    <button type="submit">Add Episode</button>
</form>
@endsection
