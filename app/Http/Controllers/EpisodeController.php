<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;

use App\Models\Episode;
use Illuminate\Http\Request;
use Wink\WinkPost;


class EpisodeController extends Controller
{
    public function store(Request $request, $storyId)
    {

        // $story = WinkPost::find($storyId);
        if (!$storyId) {
            return redirect()->back()->withErrors(['error' => 'Story not found!']);
        }


        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);
    
        Episode::create([
            'story_id' =>  $storyId,
            'title' => $request->title,
            'content' => $request->content,
            'created_by' => auth()->id(),
        ]);
    
        return redirect()->route('stories.show', $storyId)->with('success', 'Episode added successfully!');
    }
    public function edit($id)
{
    $episode = Episode::findOrFail($id);

    if ($episode->created_by !== auth()->id()) {
        abort(403, 'Unauthorized action.');
    }

    return view('episodes.edit', compact('episode'));
}
public function update(Request $request, $id)
{
    $episode = Episode::findOrFail($id);

    if ($episode->created_by !== auth()->id()) {
        abort(403, 'Unauthorized action.');
    }

    $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required|string',
    ]);

    $episode->update($request->only('title', 'content'));

    return redirect()->route('stories.show', $episode->story_id)->with('success', 'Episode updated successfully!');
}

public function destroy($id)
{
    $episode = Episode::findOrFail($id);

    if ($episode->created_by !== auth()->id()) {
        abort(403, 'Unauthorized action.');
    }

    $episode->delete();

    return redirect()->route('stories.show', $episode->story_id)->with('success', 'Episode deleted successfully!');
}


    
}
