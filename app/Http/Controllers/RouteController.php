<?php

namespace App\Http\Controllers;

use App\Http\Resources\RouteResource;
use Illuminate\Http\Request;
use App\Models\RouteModel;

class RouteController extends Controller
{
    //
    function getAllAPI(){
        $result = RouteModel::get();
        return $result ? RouteResource::collection($result) : response(null,204);
    }
    function getByIdAPI(Request $request){
        $id = $request->id;
        $result = RouteModel::find($id);
        return $result ? new RouteResource($result) : response(null,204);
    }

}
