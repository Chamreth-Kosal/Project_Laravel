<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Event extends Model
{
    use HasFactory;
    protected $fillable = [
        'event_type',
        'descriptions',
        'event_time',
        'event_date_start',
        'event_date_end',
        'created_by',
    ];

    public static function store($request, $id = null){

        $eventData = $request->only(['event_type', 'descriptions','event_time','event_date_start','event_date_end','created_by']);
        $event = self::updateOrCreate(['id'=>$id],$eventData);
        $teams =$request->input('teams',[]);
        $event->teams()->sync($teams);
        return $event;

    }

    public function tickets(){
        return $this->hasMany(Ticket::class);
    }

    public function teams(){
        return $this->belongsToMany(Team::class, 'event_team')->withTimestamps();
    }
    public function users(){
        return $this->hasMany(User::class);
    }
}
