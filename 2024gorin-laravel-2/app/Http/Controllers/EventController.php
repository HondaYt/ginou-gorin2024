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
        $events = Event::get();
        return view('admin.events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.events.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->session()->regenerateToken();

        $request->validate([
            'title' => ['required'],
        ]);

        $event = new Event;
        $event->title = $request->title;
        $event->address = $request->address;
        $event->event_date = $request->event_date;

        $event->save();

        return redirect()->route('events.index')
            ->with('message', 'イベントを登録しました。');
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
        $event = Event::find($id);
        return view('admin.events.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->session()->regenerateToken();

        $request->validate([
            'title' => ['required'],
        ]);

        $event = Event::find($id);
        $event->title = $request->title;
        $event->address = $request->address;
        $event->event_date = $request->event_date;

        $event->save();

        return redirect()->route('events.index')
            ->with('message', 'イベントを更新しました。');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $event = Event::find($id);
        $event->delete();
        return redirect()->route('events.index')
            ->with('message', 'イベントを削除しました。');
    }
}
