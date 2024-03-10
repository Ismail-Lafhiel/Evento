<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Reservation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ReservationController extends Controller
{
    public function bookNow(Request $request, $eventId)
    {
        if (Gate::denies('make reservations')) {
            abort(403, 'Permission denied');
        }

        $event = Event::findOrFail($eventId);

        $existingReservation = Reservation::where('event_id', $event->id)
            ->where('user_id', auth()->user()->id)
            ->first();

        if ($existingReservation) {
            return redirect()->back()->with('warning', "You have already booked {$existingReservation->event->title}.");
        }

        $systemDate = Carbon::now();
        $eventDate = Carbon::parse($event->event_date);

        if ($systemDate->greaterThan($eventDate)) {
            $status = 'cancelled';

            return redirect()->back()->with('error', 'The event date has passed. Reservation is cancelled.');
        } else {
            $status = ($event->reservation_status == 'automatic') ? 'approved' : 'pending';
        }

        $reservation = Reservation::create([
            'event_id' => $event->id,
            'user_id' => auth()->user()->id,
            'status' => $status,
        ]);

        if ($status == 'approved') {
            $event->decrement('seats_number');
        }

        if ($status == 'pending' && $event->reservation_status == 'manual') {
            return redirect()->back()->with('success', 'Your reservation is pending. Please wait for the organizer to confirm it.');
        }

        return redirect()->back()->with('success', "{$reservation->event->title} booked successfully");
    }
}
