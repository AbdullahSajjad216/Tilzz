<?php

namespace App\Http\Controllers;

use App\Models\Story;
use Illuminate\Http\Request;

class StoryController extends Controller
{
    public function index()
    {
        $stories = Story::where('visibility', 'public')->latest()->paginate(10);
        return view('stories.index', compact('stories'));
    }

    public function create()
    {
        return view('stories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'visibility' => 'required|in:public,private',
        ]);

        Story::create([
            'title' => $request->title,
            'description' => $request->description,
            'visibility' => $request->visibility,
            'author_id' => auth()->id(),
        ]);

        return redirect()->route('stories.index')->with('success', 'Story created successfully!');
    }

    // Show a single story
    public function show(Story $story)
    {
        return view('stories.show', compact('story'));
    }

    // Show the form to edit a story
    public function edit(Story $story)
    {
        if ($story->author_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

        return view('stories.edit', compact('story'));
    }

    // Update an existing story
    public function update(Request $request, Story $story)
    {
        if ($story->author_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'visibility' => 'required|in:public,private',
        ]);

        $story->update($request->only('title', 'description', 'visibility'));

        return redirect()->route('stories.index')->with('success', 'Story updated successfully!');
    }

    // Delete a story
    public function destroy(Story $story)
    {
        if ($story->author_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

        $story->delete();

        return redirect()->route('stories.index')->with('success', 'Story deleted successfully!');
    }
}
