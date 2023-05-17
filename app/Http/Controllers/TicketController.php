<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRequest;
use App\Http\Requests\TicketRequest;
use App\Http\Resources\TicketResource;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tickets = Ticket::all();
        $tickets = TicketResource::collection($tickets);
        return response()->json(['success' =>true, 'data' =>$tickets],200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TicketRequest $request)
    {
        $tickets = Ticket::store($request);
        return response()->json(['success' =>true, 'data' =>$tickets],201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $tickets =Ticket::find($id);
        $tickets=new TicketResource($tickets);
        return response()->json(['success' =>true, 'data' =>$tickets],200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $tickets = Ticket::find($id);
        $tickets -> update([
            'date'=> $request -> input('date'),
            'time'=> $request -> input('time'),
            'user_id'=> $request -> input('user_id'),
            'event_id'=> $request -> input('event_id'),
            'stadium_id'=> $request -> input('stadium_id'),
        ]);
        return response()->json(['success' =>true, 'data' =>$tickets],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tickets = Ticket::find($id);
        $tickets->delete();
        return response()->json(['success' =>true, 'message' =>'Data deleted'],200);
    }
}
