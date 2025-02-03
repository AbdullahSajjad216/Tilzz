@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Your Account</h1>
    <p><strong>Name:</strong> {{ $user->name }}</p>
    <p><strong>Email:</strong> {{ $user->email }}</p>

    <a href="{{ route('user.account.edit') }}" class="btn btn-primary">Edit Account</a>
    <form action="{{ route('user.account.delete') }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete Account</button>
    </form>
</div>
@endsection
