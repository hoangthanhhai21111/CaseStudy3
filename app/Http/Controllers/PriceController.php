<?php

namespace App\Http\Controllers;

use App\Models\Price;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PriceController extends Controller
{
    function index()
    {           $schedules = DB::table('flight_schedules')
        ->join('Flight_route', 'flight_schedules.Flight_route_id', '=', 'Flight_route.id')
        ->join('Price', 'Price.flight_schedule_id', '=', 'flight_schedules.id')
        ->select(
            'Flight_route.departure',
            'Flight_route.destination',
            'flight_schedules.flight_date',
            'flight_schedules.flight_time',
            'flight_schedules.id',
            'price.price'
        )->get();
        return view('price.index', compact('schedules'));
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
        $prices->flight_schedule_id = $request->flight_schedule_id;
        $prices->price = $request->price;
        $prices->save();
        return redirect()-> route('price.index');
    }
}
