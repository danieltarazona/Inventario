<?php

namespace App\Http\Controllers;

use App\Calendar;
use App\Http\Requests;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $calendar_events = Calendar::all();
        return view('calendar.index', compact('calendar_events'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('calendar.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $calendar_event = new Calendar();
        $calendar_event->title            = $request->input("title");
        $calendar_event->start            = $request->input("start");
        $calendar_event->end              = $request->input("end");
        $calendar_event->is_all_day       = $request->input("is_all_day");
        $calendar_event->background_color = $request->input("background_color");
        $calendar_event->save();
        return redirect()->route('calendar.index')->with('message', 'Item created successfully.');
    }
    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $calendar_event = Calendar::findOrFail($id);
        return view('calendar.show', compact('calendar_event'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $calendar_event = Calendar::findOrFail($id);
        return view('calendar.edit', compact('calendar_event'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  int    $id
     * @param Request $request
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $calendar_event = Calendar::findOrFail($id);
        $calendar_event->title            = $request->input("title");
        $calendar_event->start            = $request->input("start");
        $calendar_event->end              = $request->input("end");
        $calendar_event->is_all_day       = $request->input("is_all_day");
        $calendar_event->background_color = $request->input("background_color");
        $calendar_event->save();
        return redirect()->route('calendar.index')->with('message', 'Item updated successfully.');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        $calendar_event = Calendar::findOrFail($id);
        $calendar_event->delete();
        return redirect()->route('calendar.index')->with('message', 'Item deleted successfully.');
    }
}
