<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $message='';
        $events = Event::get();
        return view('admin.events.index', compact('events','message'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.events.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $request->session()->regenerateToken();

        $message = '登録成功';

        $request->validate([
            'title' => ['required'],
            'address' => ['required'],
        ]);

        $event = new Event;
        $event->title = $request->title;
        $event->address = $request->address;
        $event->event_date = $request->event_date;

        $event->save();

        return redirect()->route('events.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $event = Event::find($id);
        return view('admin.events.edit',compact('event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->session()->regenerateToken();

        $message = '変更成功';

        $request->validate([
            'title' => ['required'],
            'address' => ['required'],
        ]);

        $event = Event::find($id);
        $event->title = $request->title;
        $event->address = $request->address;
        $event->event_date = $request->event_date;

        $event->save();

        return redirect()->route('events.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $event = Event::find($id);
        $event->delete();
        return redirect()->route('events.index');
    }
}