<?php

namespace App\Http\Controllers;

use App\Http\Requests\StadiumRequest;
use App\Http\Requests\StoreRequest;
use App\Http\Resources\StadiumResource;
use App\Models\Stadium;
use Illuminate\Http\Request;

class StadiumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stadiums = Stadium::all();
        $stadiums = StadiumResource::collection($stadiums);
        return response()->json(['success' =>true, 'data' =>$stadiums],200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StadiumRequest $request)
    {
        $stadiums = Stadium::store($request);
        return response()->json(['success' =>true, 'data' =>$stadiums],201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $stadiums =Stadium::find($id);
        $stadiums=new StadiumResource($stadiums);
        return response()->json(['success' =>true, 'data' =>$stadiums],200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $stadiums =Stadium::find($id);
         $stadiums -> update([
            'address'=> $request -> input('address'),
            'zone'=> $request -> input('zone'),
        ]);
        return response()->json(['success' =>true, 'data' => $stadiums],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $stadiums = Stadium::find($id);
        $stadiums->delete();
        return response()->json(['success' =>true, 'message' =>'Data deleted'],200);
    }
}
