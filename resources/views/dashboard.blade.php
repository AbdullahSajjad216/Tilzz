<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="container">
        <div class="buttons">
            <a href="{{ route('stories.index') }}" class="btn btn-primary">View All Stories</a>
            <a href="{{ route('stories.create') }}" class="btn btn-success">Create New Story</a>
        </div>
    
        <!-- Stories created by the logged-in user -->
        <h2>Your Stories</h2>
        @if(auth()->user()->stories->count() > 0)
            <ul>
                @foreach(auth()->user()->stories as $story)
                    <li>
                        <a href="{{ route('stories.show', $story->id) }}">{{ $story->title }}</a>
                    </li>
                @endforeach
            </ul>
        @else
            <p>You haven't created any stories yet.</p>
        @endif
    
    </div>
   


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
