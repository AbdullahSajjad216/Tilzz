@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Your Account</h1>
    <form action="{{ route('user.account.update') }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
        </div>
        <button type="submit" class="btn btn-success">Save Changes</button>
    </form>
</div>
@endsection
