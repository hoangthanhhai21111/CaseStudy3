<?php

namespace App\Http\Controllers;

use App\Models\Price;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PriceController extends Controller
{
    function index()
    {
        $prices = Price::all();
        return view('price.index', compact('prices'));
    }
    function create(){
        $schedules = DB::table('flight_schedules')
        ->join('Flight_route', 'flight_schedules.Flight_route_id', '=', 'Flight_route.id')
        ->select(
            'Flight_route.departure',
            'Flight_route.destination',
            'flight_schedules.flight_date',
            'flight_schedules.flight_time',
            'flight_schedules.id'
        )
        ->get();
        // dd($schedules);
        return view('price.create',compact('schedules'));
    }
    function store(Request $request){
        $prices = new Price();
    }
}
