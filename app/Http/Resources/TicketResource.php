<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TicketResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return 
        ["ticket_id" => $this->ticket_id,
        "phone" => $this->phone,
        "total" => $this->total,
        "created_at" => $this->created_at,
        "station_id_start" => $this->stationStart()->get(),
        "station_id_end" => $this->stationEnd()->get(),
        "route" => $this->route()->get(),
    ];
    }
}
