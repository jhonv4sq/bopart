<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::all();
        return view('events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('events.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Event::create([
            'name' => $request['name'],
        ]);

        return redirect()->route('events.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        $isCheck = false;

        if(auth()->user()){
            $myEvents = auth()->user()->event->where('id', $event->id)->first();
            
            switch($myEvents){
                case true:
                    $isCheck = true;
                    break;
                case false:
                    $isCheck = false;
                    break;
            }
        }
 
        return view('events.show', compact('event', 'isCheck'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        return view('events.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        $event->update([
            'name' => $request['name'],
        ]);
        return redirect()->route('events.index');
    }

    public function checkIn(Event $event)
    {
        $user = auth()->user();
        $user->event()->attach($event);
        return redirect()->route('events.index');
    }

    public function dropOut(Event $event)
    {
        $user = auth()->user();
        $user->event()->detach($event);
        return redirect()->route('events.index');
    }

    public function myEvents()
    {
        $events = auth()->user()->event;
        
        return view('auth.profile', compact('events'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route('events.index');
    }
}
