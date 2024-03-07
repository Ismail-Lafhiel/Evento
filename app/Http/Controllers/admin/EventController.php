<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Event;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $categories = Category::all();
        $events = Event::orderBy("created_at", "desc")->paginate(10);
        return view("events.index", compact("events", "categories"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (Gate::denies('create events')) {
            abort(403, 'Permission denied');
        }
        $validated = $request->validate([
            "title" => "required|min:5",
            "description" => "required|min:50|max:150",
            "event_img" => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            "event_date" => "required|date",
            "location" => "required",
            "category_id" => "required",
            "seats_number" => "required|integer|min:1",
            "reservation_status" => "required|in:automatic,manual"
        ]);
        $validated['user_id'] = Auth::id();
        if ($request->hasFile('event_img')) {
            $imagePath = $request->file('event_img')->storeAs('public/events_img', uniqid() . '.' . $request->file('event_img')->getClientOriginalExtension());
            $validated['event_img'] = str_replace('public/', '', $imagePath);
        }
        $event = Event::create($validated);
        return redirect()->route('events.index')->with('success', 'Event created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        return view("events.show", compact("event"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        $categories = Category::all();
        return view("events.edit", compact("event", "categories"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        if (Gate::denies('edit events')) {
            abort(403, 'Permission denied');
        }
        $validated = $request->validate([
            "title" => "required|min:5",
            "description" => "required|min:50|max:150",
            "event_img" => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            "event_date" => "required|date",
            "location" => "required",
            "category_id" => "required",
            "seats_number" => "required|integer|min:1",
            "reservation_status" => "required|in:automatic,manual"
        ]);
        if ($request->hasFile('event_img')) {
            $imagePath = $request->file('event_img')->storeAs('public/events_img', uniqid() . '.' . $request->file('event_img')->getClientOriginalExtension());
            $validated['event_img'] = str_replace('public/', '', $imagePath);
        }
        $event->update($validated);
        return redirect()->route("events.index", $event)->with("success", "Event updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        if (Gate::denies('delete events')) {
            abort(403, 'Permission denied');
        }
        $event->delete();
        session()->flash('success', "Event is deleted successfully");

        return response()->json(['success' => true, 'message' => "Event deleted successfully"]);
    }

    public function approveReservation(Reservation $reservation)
    {
        if (Gate::denies('approve reservations')) {
            abort(403, 'Permission denied');
        }

        $reservation->update(['status' => 'approved']);

        return redirect()->back()->with('success',"{$reservation->event->title} is approved");
    }

    public function denyReservation(Reservation $reservation)
    {
        if (Gate::denies('deny reservations')) {
            abort(403, 'Permission denied');
        }

        $reservation->update(['status' => 'denied']);

        return redirect()->back()->with('success',"{$reservation->event->title} is denied");
    }
}
