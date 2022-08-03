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
    function check(){
         $routes=Flight_route::all();
         return view('home.index',compact('routes'));
    }

    public function index()
    {
        $itemp = DB::table('flight_schedules')
            ->join('plane', 'flight_schedules.plane_id', '=', 'plane.id')
            ->join('Flight_route', 'Flight_route.id', '=', 'flight_schedules.flight_route_id')
            ->select('plane.plane_name','Flight_route.departure','Flight_route.destination','flight_schedules.id',
            'flight_schedules.flight_date','flight_schedules.flight_time')->get();
        return view('schedules.index', compact('itemp'));
    }
    /**
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $routes = Flight_route::all();
        $planes = Plane::all();
        return view('schedules.create', compact('planes', 'routes'));
    }
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $schedules = new flight_schedules();
        $schedules->plane_id = $request->plane_id;
        $schedules->Flight_route_id = $request->Flight_route_id;
        $schedules->flight_date = $request->flight_date;
        $schedules->flight_time = $request->flight_time;
        $schedules->save();
        return redirect()->route('schedules.index');
    }
    /**
         * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $schedules = flight_schedules::find($id);
        return view('schedules.view', compact('schedules'));
    }
    /**
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $schedule = flight_schedules::find($id);
        $routes = Flight_route::all();
        $planes = Plane::all();
        return view('schedules.edit', compact('schedule','routes','planes'));
    }
    /**
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $schedules = flight_schedules::find($id);

        $schedules->plane_id = $request->plane_id;
        $schedules->Flight_route_id = $request->Flight_route_id;
        $schedules->flight_date = $request->flight_date;
        $schedules->flight_time = $request->flight_time;
        $schedules->save();
        return redirect()->route('schedules.index');
    }

    /**

     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $schedules = flight_schedules::findOrFail($id);

        $schedules->delete();
        return redirect()->route('schedules.index');
    }
}


