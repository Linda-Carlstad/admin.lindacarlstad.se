<?php

namespace App\Http\Controllers;

use App\LindaEvents;
use Illuminate\Http\Request;

class LindaEventsController extends Controller
{
    public function index()
    {
        $events = LindaEvents::all();
        return view('linda_events.index')->with('events', $events);
    }

    public function create()
    {
        return view('linda_events.create');
    }

    public function getEventsICalObject()
    {
        $events = LindaEvents::all();
        define('ICAL_FORMAT', 'Ymd\THis\Z');

        $icalObject = "BEGIN:VCALENDAR
        VERSION:2.0
        METHOD:PUBLISH
        PRODID:-//Charles Oduk//Tech Events//EN\n";

        foreach ($events as $event) {
            $icalObject .=
            "BEGIN:VEVENT
            DTSTART:" . date(ICAL_FORMAT, strtotime($event->starts)) . "
            DTEND:" . date(ICAL_FORMAT, strtotime($event->ends)) . "
            DTSTAMP:" . date(ICAL_FORMAT, strtotime($event->created_at)) . "
            SUMMARY:$event->summary
            UID:$event->uid
            STATUS:" . strtoupper($event->status) . "
            LAST-MODIFIED:" . date(ICAL_FORMAT, strtotime($event->updated_at)) . "
            LOCATION:$event->location
            END:VEVENT\n";
        }

        $icalObject .= "END:VCALENDAR";

        header('Content-type: text/calendar; charset=utf-8');
        header('Content-Disposition: attachment; filename="cal.ics"');

        $icalObject = str_replace(' ', '', $icalObject);

        echo $icalObject;
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'starts' => 'required|date',
            'ends' => 'required|date|after_or_equal:starts',
            'status' => 'required|string|in:confirmed,tentative,cancelled',
            'summary' => 'required|string|max:255',
            'location' => 'required|string|max:255',
        ]);

        $event = LindaEvents::create($validated);

        return redirect( 'linda_events' )->with('success', 'Evenemanget har skapats.' );
    }

    public function edit($id)
    {
        $event = LindaEvents::findOrFail($id);
        return view('linda_events.edit', compact('event'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'starts' => 'required|date',
            'ends' => 'required|date|after_or_equal:starts',
            'status' => 'required|string|in:confirmed,tentative,cancelled',
            'summary' => 'required|string|max:255',
            'location' => 'required|string|max:255',
        ]);

        $event = LindaEvents::findOrFail($id);
        $event->update($validated);

        return redirect( 'linda_events' )->with('success', 'Evenemanget har uppdaterats!');
    }

    public function destroy($id)
    {
        $event = LindaEvents::findOrFail($id);
        $event->delete();

        return redirect( 'linda_events' )->with('success', 'Evenemanget har tagits bort!');
    }
}