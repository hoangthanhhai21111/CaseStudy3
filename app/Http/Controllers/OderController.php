<?php

namespace App\Http\Controllers;

use App\Models\Flight_route;
use App\Models\flight_schedules;
use App\Models\Plane;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OderController extends Controller
{
    /**
     * @return \Illuminate\Http\Response
     */
    function check()
    {
        $routes = Flight_route::all();
        return view('home.index', compact('routes'));
    }
    function result(Request $request)
    {
        $departure = $request->departure;
        $destination = $request->destination;
        $flight_date = $request->flight_date;
        $results = DB::table('flight_schedules')
            ->join('Flight_route', 'flight_schedules.Flight_route_id', '=', 'Flight_route.id')
            ->select(
                'Flight_route.departure',
                'Flight_route.destination',
                'flight_schedules.flight_date',
                'flight_schedules.flight_time',
                'flight_schedules.id'
            )
            ->where('Flight_route.departure', $departure)
            ->where('Flight_route.destination', $destination)
            ->where('flight_schedules.flight_date', $flight_date)
            ->get();
        //  dd($results);
        return view('home.results', compact('results'));
    }
}
