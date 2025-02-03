@extends('layouts.app')

@section('content')
<h1>Edit Episode</h1>
<form action="{{ route('episodes.update', $episode->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div>
        <label for="title">Title</label>
        <input type="text" name="title" value="{{ $episode->title }}" required>
    </div>
    <div>
        <label for="content">Content</label>
        <textarea name="content" required>{{ $episode->content }}</textarea>
    </div>
    <button type="submit">Update Episode</button>
</form>
@endsection
