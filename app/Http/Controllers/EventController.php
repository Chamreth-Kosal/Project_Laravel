<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventRequest;
use App\Http\Requests\StoreRequest;
use App\Http\Resources\EventResource;
use App\Http\Resources\ShowEventResource;
use App\Models\Event;
use Illuminate\Http\Request;
use Psy\Readline\Hoa\EventSource;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::all();
        $events = EventResource::collection($events);
        return response()->json(['success' =>true, 'data' =>$events],200);
    } 
    /**
     * Store a newly created resource in storage.
     */
    public function store(EventRequest $request)
    {
        $events = Event::store($request);
        return response()->json(['success' =>true, 'data' =>$events],201);
        
    }
    
    //search for events
    public function search(Request $request)
    {
        $events = Event::all();
        $event_type= $request->get('event_type');
        $events = Event::where('event_type', 'like', '%' .$event_type. '%')->get();
        return response()->json(['success' =>true, 'data' =>$events],201);
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $events = Event::find($id);
        $events = new ShowEventResource($events);
        return response()->json(['success' => true, 'data' => $events], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $events = Event::find($id);
        $events -> update([
            'event_type'=> $request -> input('event_type'),
            'descriptions'=> $request -> input('descriptions'),
            'event_time'=> $request -> input('event_time'),
            'event_date_start'=> $request -> input('event_date_start'),
            'event_date_end'=> $request -> input('event_date_end'),
            'created_by'=> $request -> input('created_by'),
            'teams'=> $request -> input('teams'),
        ]);
        return response()->json(['success' =>true, 'data' =>$events],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $events = Event::find($id);
        $events->delete();
        return response()->json(['success' =>true, 'message' =>'Data deleted'],200);
    }
}
