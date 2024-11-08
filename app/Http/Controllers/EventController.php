<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events2 = Event::latest()->paginate(50);
        $events = $events2->sortBy('begin');


        return view('events.index', compact('events'))->with(request()->input('page'));
    }

    public function print()
    {
        $events2 = Event::latest()->paginate(50);
        $events = $events2->sortBy('begin');


        return view('events.print', compact('events'))->with(request()->input('page'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('events.create');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validate
        $data = $request->validate([
			'name' => 'required|max:300|string',
            'detail' => 'required|max:1500',
            'begin' => 'required|date',
            'end' => 'required|date|after:begin',
			'category' => 'required',
            'graphics' => 'required|mimes:png,jpg,jpeg,webp|max:1024',
        ]);

        if($request->has('graphics'))
        {
            $graphName = time().'.'.$request->graphics->getClientOriginalExtension();
            $request->graphics->move(public_path('uploads/images/'),$graphName);
            $data['graphics'] = $graphName;
        }
        //$input = $data->except('_token');

        Event::create($data);

        return redirect()->route('events.index')->with('success', 'Wydarzenie utworzone poprawnie');
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        return view('events.show', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        return view('events.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
         //validate
         $data = $request->validate([
			'name' => 'required|max:300|string',
            'detail' => 'required|max:1500',
            'begin' => 'required',
            'end' => 'required',
			'category' => 'required',
            'graphics' => 'nullable|mimes:png,jpg,jpeg,webp|max:1024',
        ]);
        //$input = $request->except('_token');
        if($request->has('graphics'))
        {
            $destination = 'uploads/images/'.$event->graphics;

            if(\File::exists($destination))
            {
                \File::delete($destination);
            }

            $graphName = time().'.'.$request->graphics->getClientOriginalExtension();
            $request->graphics->move(public_path('uploads/images/'),$graphName);
            $data['graphics'] = $graphName;
        }

        $event->update($data);

        return redirect()->route('events.index')->with('success', 'Edycja wykonana poprawnie');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        if($event->graphics)
        {
            $destination = 'uploads/images/'.$event->graphics;

                        if(\File::exists($destination))
                        {
                            \File::delete($destination);
                        }

                    $event->delete();

                    return redirect()->route('events.index')->with('success', 'Usunięto wydarzenie pomyślnie');
        }
        
    }
}
