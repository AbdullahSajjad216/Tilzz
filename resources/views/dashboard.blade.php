<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="container">
        <div class="top-bar-dashboard">
            <a href="{{ route('stories.index') }}" class="btn text-white" style="background-color:#4F46E5;">View All Stories</a>
            <a href="{{ route('stories.create') }}" class="btn " style="color:#4F46E5; background-color:white; margin-left:10px;">Create New Story</a>
        </div>
    
        <!-- Stories created by the logged-in user -->
        <h2 class="heading-your-story">Your Stories</h2>
        <div class="story-container">
            @if(auth()->user()->stories->count() > 0)
                <ul class="story-box101">
                    @foreach(auth()->user()->stories as $story)
                        <li class="story-box">
                            <a class="view-btn" href="{{ route('stories.show', $story->id) }}">view</a>
                            <p class="title">{{ $story->title }}</p>
                            <p class="descp">{{ $story->description }}</p>
                            <img src="https://images.pexels.com/photos/3218465/pexels-photo-3218465.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt=""/>
                        </li>
                    @endforeach
                </ul>
            @else
                <p>You haven't created any stories yet.</p>
            @endif
        </div>
    
    </div>
   


    <!-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>
            </div>
        </div>
    </div> -->
</x-app-layout>
