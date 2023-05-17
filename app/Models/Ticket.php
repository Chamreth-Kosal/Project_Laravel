<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'time',
        'date',
        'price',
        'user_id',
        'event_id',
        'stadium_id',
    ];
    public static function store($request, $id = null){
        $tickets = $request->only(['time','date','price','user_id','event_id','stadium_id',]);
        $tickets = self::updateOrCreate(['id'=>$id],$tickets);
        return $tickets;

    }



    public function user(){
        return $this->hasMany(User::class);
    }

    public function event(){
        return $this->belongsTo(Event::class);
    }

    public function stadium(){
        return $this->belongsTo(Stadium::class);
    }
}
