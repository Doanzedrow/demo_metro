<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\TicketController;
use App\Models\TicketModel;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/route',[RouteController::class,'getAllAPI']);
Route::get('/route/{id}',[RouteController::class,'getByIdAPI']);
 Route::get('/ticket',[TicketController::class,'findByPhoneAPI']);
 Route::post('/ticket',[TicketController::class,'bookTicket']);
// Route::post('/ticket',function (Request $request)
// {
//     if(!$request->phone)
//     {
//         return response(["message"=>"bad request"],400);
//     }
//     $newDB = new TicketModel;
//         $newDB->phone = $request->phone;
//         $newDB->station_id_start = $request->station_id_start;
//         $newDB->route_id = $request->route_id;
//         $newDB->count = $request->count;
//         $newDB->save();
//         return response(["message"=>"create request"],400);
// });

