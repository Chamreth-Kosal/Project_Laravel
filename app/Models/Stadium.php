<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stadium extends Model
{
    use HasFactory;

    protected $fillable = [
        'address',
        'zone',
    ];

    public static function store($request, $id = null){

        $stadiums = $request->only(['address', 'zone']);
        $stadiums = self::updateOrCreate(['id'=>$id],$stadiums);
        return $stadiums;

    }



    public function ticket(){
        return $this->hasMany(Ticket::class);
    }
}
