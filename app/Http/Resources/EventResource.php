<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EventResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'event_type'=>$this->event_type,
            'descriptions'=>$this->descriptions,
            'event_date_start'=>$this->event_date_start,
            'event_date_end'=>$this->event_date_end,
            'event_time'=>$this->event_time,
            'create_by'=>$this->user,
           
        ];
    }
}
