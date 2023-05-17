<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRequest;
use App\Http\Requests\TeamRequest;
use App\Http\Resources\ShowTeamResource;
use App\Http\Resources\TeamResource;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teams = Team::all();
        $teams = TeamResource::collection($teams);
        return response()->json(['success' =>true, 'data' =>$teams],200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TeamRequest $request)
    {
        $teams = Team::store($request);
        return response()->json(['success' =>true, 'data' =>$teams],201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $teams =Team::find($id);
        $teams =new ShowTeamResource($teams);
        return response()->json(['success' =>true, 'data' =>$teams],200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $teams = Team::find($id);
        $teams -> update([
            'name'=> $request -> input('name'),
            'mamber'=> $request -> input('mamber'),
            'user_id'=> $request -> input('user_id'),
        ]);
        return response()->json(['success' =>true, 'data' =>$teams],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $teams = Team::find($id);
        $teams->delete();
        return response()->json(['success' =>true, 'message' =>'Data deleted'],200);
    }
}
