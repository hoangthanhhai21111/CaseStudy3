<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use App\Models\Flight_route;
use App\Models\flight_schedules;
use App\Models\Oder;
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
            ->join('Price', 'Price.flight_schedule_id', '=', 'flight_schedules.id')

            ->select(
                'Flight_route.departure',
                'Flight_route.destination',
                'flight_schedules.flight_date',
                'flight_schedules.flight_time',
                'flight_schedules.id',
                'Price.price'
            )
            ->where('Flight_route.departure', $departure)
            ->where('Flight_route.destination', $destination)
            ->where('flight_schedules.flight_date', $flight_date)
            ->get();
        return view('home.results', compact('results'));
    }
    function oder($id){
       $id = $id;
           return view('home.oder',compact('id'));
    }
    function orderProcessing(Request $request , $id){
        $customer = new Customers();
        $customer->name = $request->name;
        $customer->address = $request->address;
        $customer->gender = $request->gender;
        $customer->day_of_birth = $request->day_of_birth;
        $customer->phone = $request->phone;
        $customer->citizen_identification = $request->citizen_identification;
        $customer->save();  
             $oder = new Oder(); 
             $oder->customer_id=$customer->id;
             $oder->flight_schedule_id=$id;
             $oder->save();
             $oder_id = $oder->id;
             return redirect()->route('home.notification',$oder_id);                                        
    }
    function notification($oder_id){
        $notification = DB::table('oders')
        ->join('customers', 'oders.customer_id', '=', 'customers.id')
        ->join('flight_schedules', 'oders.flight_schedule_id', '=', 'flight_schedules.id')
        ->join('flight_route', 'flight_schedules.flight_route_id', '=', 'flight_route.id')
        ->join('price', 'price.flight_schedule_id', '=', 'flight_schedules.id')
        ->select(
            'Flight_route.departure',
            'Flight_route.destination',
            'flight_schedules.flight_date',
            'flight_schedules.flight_time',
            'oders.id',
            'Price.price',
            'customers.name',
            'customers.citizen_identification',
            'customers.phone',
            'customers.address',
            'customers.gender',
            'customers.day_of_birth'
        )
        ->where('oders.id', $oder_id)
        ->get();
        // dd($results);
        
        return view('home.notification',compact('notification'));
    }
}
