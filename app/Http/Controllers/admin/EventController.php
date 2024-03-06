<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        $events = Event::orderBy("created_at", "desc")->paginate(10);
        return view("admin.events.index", compact("events", "categories"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validated = $request->validate([
            "title" => "required|min:5",
            "description" => "required|min:50|max:150",
            "event_img" => 'required|max:2048',
            "event_date" => "required|date",
            "location" => "required",
            "category_id" => "required",
            "seats_number" => "required|integer|min:1",
            "reservation_status" => "required|in:automatic,manual"
        ]);

        $event = Event::create($validated);
        return redirect()->route('admin.events.index')->with('success', 'Event created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        return view("admin.events.show", compact("event"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        $categories = Category::all();
        return view("admin.events.edit", compact("event", "categories"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        $validated = $request->validate([
            "title" => "required|min:5",
            "description" => "required|min:50|max:150",
            "event_img" => 'required|max:2048',
            "event_date" => "required|date",
            "location" => "required",
            "category_id" => "required",
            "seats_number" => "required|integer|min:1",
            "reservation_status" => "required|in:automatic,manual"
        ]);

        $event->update($validated);
        return redirect()->route("admin.events.index", $event)->with("success", "Event updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        $event->delete();
        session()->flash('success', "Event is deleted successfully");

        return response()->json(['success' => true, 'message' => "Event deleted successfully"]);
    }
}
