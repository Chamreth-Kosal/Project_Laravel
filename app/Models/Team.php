<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'member',
        'user_id'
        
    ];

    public static function store($request, $id = null){

        $team = $request->only(['name', 'member','user_id']);
        $team = self::updateOrCreate(['id'=>$id],$team);
        return $team;

    }

    public function events()
    {
        return $this->belongsToMany(Event::class,"event_team")->withTimestamps();
    }
    public function user()
    {
        return $this->hasMany(User::class);
    }
}
