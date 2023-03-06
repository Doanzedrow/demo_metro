<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RouteModel extends Model
{
    use HasFactory;
    protected $table = 'routes';
    protected $primaryKey = 'route_id';
    protected $keyType = 'integer';
    public $incrementing = true;

    public function stations()
    {
        return $this->belongsToMany('App\Models\StationModel', 'routes_stations','route_id', 'station_id')->orderBy('order');
    }
}
