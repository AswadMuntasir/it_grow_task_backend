<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::all();
        return response()->json(['events' => $events], 200);
    }

    // Get a specific event by ID
    public function show($id)
    {
        $event = Event::find($id);

        if (!$event) {
            return response()->json(['message' => 'Event not found'], 404);
        }

        return response()->json(['event' => $event], 200);
    }

    // Create a new event
    public function store(Request $request)
    {
        // Validate the request data here if needed

        $event = Event::create($request->all());

        return response()->json(['event' => $event], 201);
    }

    // Update an existing event
    public function update(Request $request, $id)
    {
        // Validate the request data here if needed

        $event = Event::find($id);

        if (!$event) {
            return response()->json(['message' => 'Event not found'], 404);
        }

        $event->update($request->all());

        return response()->json(['event' => $event], 200);
    }

    // Delete an event
    public function destroy($id)
    {
        $event = Event::find($id);

        if (!$event) {
            return response()->json(['message' => 'Event not found'], 404);
        }

        $event->delete();

        return response()->json(['message' => 'Event deleted'], 204);
    }
}
