<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketModel extends Model
{
    use HasFactory;
    protected $table = 'tickets';
    protected $primaryKey = 'ticket_id';
    protected $keyType ='integer';
    public $incrementing = true;
    public $timestamps = false;
    protected $fillable = [
        'phone',
        'station_id_start',
        'station_id_end',
        'total',
        'route_id',
        'count'
    ];

    public function stationEnd(){
        return $this->hasOne('App\Models\StationModel','station_id','station_id_end');
    }
    public function stationStart(){
        return $this->hasOne('App\Models\StationModel','station_id','station_id_start');
    }
    public function route(){
        return $this->hasOne('App\Models\RouteModel','route_id','route_id');
    }

    public static function wherePhoneNumber($phone){
        $temp_phone = strlen($phone) == 10 ? substr_replace($phone,'84',0,1) : substr_replace($phone,'0',0,2);
        return self::where('phone','=',$phone)->orWhere('phone','=',$temp_phone)->get();
    }
}
