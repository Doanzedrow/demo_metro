<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\TicketResource;
use App\Models\TicketModel;
use App\Models\RouteModel;
use App\Models\StationModel;

class TicketController extends Controller
{
    //
    function findByPhoneAPI(Request $request)
    {
        if ($request->has('phone')) {
            $phone = $request->input('phone');
            if (preg_match("/(84|0[3|5|7|8|9])([0-9]{8})/", $phone)) {
                $result = TicketModel::wherePhoneNumber($phone);
                if (count($result)) {
                    return TicketResource::collection($result);
                } else {
                    return response(null, 204);
                }
            }
        }
        return response(null, 400);
    }

    function bookTicket(Request $request)
    {
        if($request->station_id_start == $request->station_id_end)
        {
            return response(['message' => 'station end and station start error'], 400);
        }
        $route  = RouteModel::find($request->route_id);
        $count = $request->count;
        $station_start = StationModel::find($request->station_id_start);
        $station_end = StationModel::find($request->station_id_end);
        if (!$station_start || !$station_end) {
            return response(['message' => 'station end and station start error'], 400);
        }
        if(!$route)
        {
            return response(['message' => 'route error'], 400);
        }
       if(!$route->stations()->where('routes_stations.station_id','=',$request->station_id_start)->get(['order'])->first())
       {
            return response(['message' => 'station start error'], 400);
       }

       if(!$route->stations()->where('routes_stations.station_id','=',$request->station_id_end)->get(['order'])->first())
       {
            return response(['message' => 'station start error'], 400);
       }

        $total = $this->getTotal($station_start, $station_end, $route, $count);

        try {
            $new_ticket = new TicketModel;
                $new_ticket->phone = $request->phone;
                $new_ticket->station_id_start = $request->station_id_start;
                $new_ticket->station_id_end = $request->station_id_end;
                $new_ticket->total = $total;
                $new_ticket->route_id = $request->route_id;
                $new_ticket->count = $count;
                $new_ticket->save();
                return response(['message' => 'created'], 201);
        } catch (Exception $e) {
            return response(['message' => $e->getMessage()], 500);
        }
    }
    /***
     * kiểm tra ga trong tuyến
     */
    private function checkStionsInRoute(StationModel $station, RouteModel $route)
    {
        $result = false;
        foreach ($route->stations()  as $stationInRoute) {
            if ($stationInRoute->station_id == $station->station_id) {
                $result = true;
                break;
            }
        }
        return $result;
    }

 
    private function getTotal( $station_start,  $station_end,  $route, $count)
    {
        $result = $route->min_cost;
        $station_start_index = $route->stations()->where('routes_stations.station_id','=',$station_start->station_id)->get(['order'])->first()->order;
        $station_end_index = $route->stations()->where('routes_stations.station_id','=',$station_end->station_id)->get(['order'])->first()->order;
        $length = $station_end_index - $station_start_index + 1;
        if ($length > ceil(count($route->stations()->get())/2)) {
            $result += (($length - ceil(count($route->stations()->get()) / 2)) * $route->cost);
        }
        return $result * $count;
    }
}