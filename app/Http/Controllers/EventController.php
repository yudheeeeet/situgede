<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $event = Event::latest()->paginate(10);
        return view('event.index', compact('event'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('event.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'desc' => 'required|string',
            'media' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('media')) {
            $validated['media'] = $request->file('media')->store('event', 'public');
        }

        Event::create($validated);

        return redirect()->route('events.index')->with('success', 'Events created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        return view('event.show', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        return view('event.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'desc' => 'required|string',
            'media' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Only handle media if a new file is uploaded
        if ($request->hasFile('media')) {
            // Delete old media if exists
            if ($event->media && Storage::disk('public')->exists($event->media)) {
                Storage::disk('public')->delete($event->media);
            }
            $validated['media'] = $request->file('media')->store('event', 'public');
        } else {
            // Remove media from validated data if no new file uploaded
            unset($validated['media']);
        }

        $event->update($validated);

        return redirect()->route('events.index')->with('success', 'News updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        if ($event->media) {
            Storage::disk('public')->delete($event->media);
        }

        $event->delete();

        return redirect()->route('events.index')->with('success', 'News deleted successfully!');
    }

    public function explore()
{
    $events = \App\Models\Event::latest()->paginate(10);
    return view('pages.explorekegiatan', compact('events'));
}

public function exploreDetail($id)
{
    $event = Event::findOrFail($id);
    // Dua event rekomendasi selain yang sekarang
    $recommended = Event::where('id', '!=', $id)->latest()->take(2)->get();
    return view('pages.kegiatan-detail', compact('event', 'recommended'));
}



}
