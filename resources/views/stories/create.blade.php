@extends('layouts.app')
@section('content')
<h1>Create Story</h1>
<form action="{{ route('stories.store') }}" method="POST">
    @csrf
    <div>
        <label for="title">Title</label>
        <input type="text" name="title" required>
    </div>
    <div>
        <label for="description">Description</label>
        <textarea name="description" required></textarea>
    </div>
    <div>
        <label for="visibility">Visibility</label>
        <select name="visibility">
            <option value="public">Public</option>
            <option value="private">Private</option>
        </select>
    </div>
    <button type="submit">Create</button>
</form>
@endsection
