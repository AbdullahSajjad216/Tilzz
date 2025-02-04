<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="main-user-dashboard"> 
        <div class="leftdiv">
            <div>
                <h4 class="leftbar-heading">GENERAL</h4>
                <div class="leftbar-items">
                    <div class="active-leftbar"><x-fas-magic style="height:14px; width:14px; display:inline-block; margin:0; color:black; margin-right:5px; margin-top:-2px;" /> Stories</div>
                    <div><x-ri-dashboard-fill style="height:14px; width:14px; display:inline-block; margin:0; color:black; margin-right:5px; margin-top:-2px;"/> Categories</div>
                    <div><x-bx-news style="height:14px; width:14px; display:inline-block; margin:0; color:black; margin-right:5px; margin-top:-2px;"/> News Feed</div>
                </div>
            </div>
        </div> 
        <div class="rightdiv">
            <div class="top-bar-dashboard">
                <a href="{{ route('stories.index') }}" class="btn text-white" style="background-color:#4F46E5;">View All Stories</a>
                <a href="{{ route('stories.create') }}" class="btn " style="color:#4F46E5; background-color:white; margin-left:10px;">Create New Story</a>
            </div>
            <div class="logged-in-user-story-div">
                <!-- Stories created by the logged-in user -->
                <h2 class="heading-your-story">Your Stories <x-fas-magic style="height:14px; width:14px; display:inline-block; margin:0; color:#4F46E5;" /></h2>
                <div class="story-container">
                    @if(auth()->user()->stories->count() > 0)
                        <ul class="story-box101">
                            @foreach(auth()->user()->stories as $story)
                                <li class="story-box">
                                    <a class="view-btn" href="{{ route('stories.show', $story->id) }}">view</a>
                                    <div class="like-dislike-div">
                                        <div class="heart-icon">
                                            <svg fill="white" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
                                                viewBox="0 0 511.996 511.996" xml:space="preserve">
                                                <g>
                                                    <g>
                                                        <path d="M467.01,64.373c-29.995-29.995-69.299-44.988-108.612-44.988c-36.779,0-73.259,13.662-102.4,39.919
                                                            c-29.15-26.257-65.621-39.919-102.4-39.919c-39.313,0-78.618,14.993-108.612,44.988c-59.981,59.981-59.981,157.235,0,217.225
                                                            L255.998,492.61L467.01,281.598C526.991,221.609,526.991,124.363,467.01,64.373z M448.919,263.49L255.998,456.403L63.085,263.499
                                                            c-49.903-49.911-49.903-131.115,0-181.018c24.175-24.175,56.32-37.487,90.513-37.487c31.206,0,60.399,11.563,83.695,31.889
                                                            l18.705,17.485l18.714-17.493c23.296-20.318,52.489-31.889,83.695-31.889c34.193,0,66.33,13.312,90.513,37.487
                                                            C498.831,132.375,498.822,213.587,448.919,263.49z"/>
                                                    </g>
                                                </g>
                                            </svg>
                                        </div>
                                        <h4 class="like-count">10</h4>
                                    </div>
                                    <!-- <p class="descp">{{ $story->description }}</p> -->
                                    <img src="https://images.pexels.com/photos/3218465/pexels-photo-3218465.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt=""/>
                                    @php
                                        $btnClass = ($loop->index > 1) ? 'following-btn' : 'follow-btn';
                                        $btnText = ($loop->index > 1) ? 'following' : 'follow';
                                    @endphp
                                    <div class="title">
                                        <p >{{ $story->title }}</p> <button class="{{ $btnClass }}">{{ $btnText }}</button>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p>You haven't created any stories yet.</p>
                    @endif
                </div>
            </div>
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
