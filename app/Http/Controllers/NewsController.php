<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = News::latest()->paginate(10);
        return view('pages.berita', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('news.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'link' => 'nullable|string',
            'desc' => 'required|string',
            'media' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('media')) {
            $validated['media'] = $request->file('media')->store('news', 'public');
        }

        News::create($validated);

        return redirect()->route('news.index')->with('success', 'News created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(News $news)
    {
        return view('news.show', compact('news'));
    }

    public function edit(News $news)
    {
        return view('news.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, News $news)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'link' => 'nullable|string',
            'desc' => 'required|string',
            'media' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Only handle media if a new file is uploaded
        if ($request->hasFile('media')) {
            // Delete old media if exists
            if ($news->media && Storage::disk('public')->exists($news->media)) {
                Storage::disk('public')->delete($news->media);
            }
            $validated['media'] = $request->file('media')->store('news', 'public');
        } else {
            // Remove media from validated data if no new file uploaded
            unset($validated['media']);
        }

        $news->update($validated);

        return redirect()->route('news.index')->with('success', 'News updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news)
    {
        // Delete image if exists
        if ($news->image && Storage::disk('public')->exists($news->image)) {
            Storage::disk('public')->delete($news->image);
        }

        $news->delete();

        return redirect()->route('news.index')->with('success', 'News deleted successfully!');
    }
}
