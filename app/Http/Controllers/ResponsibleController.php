<?php

namespace App\Http\Controllers;

use App\Models\Flight_route;
use App\Models\flight_schedules;
use App\Models\Plane;
use App\Models\Responsible;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ResponsibleController extends Controller
{
    /**
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $itemp = DB::table('Responsible')
            ->join('flight_schedules', 'Responsible.flight_schedules_id', '=', 'flight_schedules.id')
            ->select('Responsible.*', 'flight_schedules.flight_date', 'flight_schedules.flight_time')->get();
        return view('Responsible.index', compact('itemp'));
    }
    /**
     * @return \Illuminate\Http\Response
     */
    public function create()

    {
        $itemp = DB::table('Flight_route')
            ->join('flight_schedules', 'flight_schedules.Flight_route_id', '=', 'Flight_route.id')
            ->select('flight_schedules.id', 'Flight_route.departure', 'Flight_route.destination', 'flight_schedules.flight_date', 'flight_schedules.flight_time')->get();
        $captain =  DB::table('users')->where('position', 'phi công')->get();
        $chief_flight_attendant =  DB::table('users')->where('position', 'tiếp viên trưởng')->get();
        $deputy_attendant =  DB::table('users')->where('position', 'tiếp viên phó')->get();
        $stewardess =  DB::table('users')->where('position', 'tiếp viên')->get();
        return view('Responsible.create', compact('captain', 'itemp', 'chief_flight_attendant', 'deputy_attendant', 'stewardess'));
    }
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Responsible = new Responsible();
        $Responsible->flight_schedules_id = $request->flight_schedules_id;
        $Responsible->captain = $request->captain;
        $Responsible->engine_deal = $request->engine_deal;
        $Responsible->chief_flight_attendant = $request->chief_flight_attendant;
        $Responsible->deputy_attendant = $request->deputy_attendant;
        $Responsible->stewardess_1 = $request->stewardess_1;
        $Responsible->stewardess_2 = $request->stewardess_2;
        $Responsible->stewardess_3 = $request->stewardess_3;
        $Responsible->save();
        return redirect()->route('Responsible.index');
    }
    /**
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $schedules = flight_schedules::find($id);
        return view('Responsible.view', compact('Responsible'));
    }
    /**
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Responsible = Responsible::find($id);
        $itemp = DB::table('Flight_route')
            ->join('flight_schedules', 'flight_schedules.Flight_route_id', '=', 'Flight_route.id')
            ->select('flight_schedules.id', 'Flight_route.departure', 'Flight_route.destination', 'flight_schedules.flight_date', 'flight_schedules.flight_time')->get();
        $captain =  DB::table('users')->where('position', 'phi công')->get();
        $chief_flight_attendant =  DB::table('users')->where('position', 'tiếp viên trưởng')->get();
        $deputy_attendant =  DB::table('users')->where('position', 'tiếp viên phó')->get();
        $stewardess =  DB::table('users')->where('position', 'tiếp viên')->get();
        return view('Responsible.create', compact('captain', 'itemp', 'chief_flight_attendant', 'deputy_attendant', 'stewardess', 'Responsible'));
    }
    /**
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $Responsible = Responsible::find($id);
        $Responsible->flight_schedules_id = $request->flight_schedules_id;
        $Responsible->captain = $request->captain;
        $Responsible->engine_deal = $request->engine_deal;
        $Responsible->chief_flight_attendant = $request->chief_flight_attendant;
        $Responsible->deputy_attendant = $request->deputy_attendant;
        $Responsible->stewardess_1 = $request->stewardess_1;
        $Responsible->stewardess_2 = $request->stewardess_2;
        $Responsible->stewardess_3 = $request->stewardess_3;
        $Responsible->save();
        return redirect()->route('Responsible.index');
    }

    /**
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Responsible = Responsible::findOrFail($id);
        $Responsible->delete();
        return redirect()->route('Responsible.index');
    }
}
