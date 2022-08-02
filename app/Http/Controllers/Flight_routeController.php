<?php

namespace App\Http\Controllers;
use App\Models\Flight_route;


use Illuminate\Http\Request;

class Flight_routeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {         
        $routes= Flight_route::all();
        return view('route.index', compact('routes'));
    }
     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('route.create');

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $route = new Flight_route();
        $route->departure= $request->departure;
        $route->destination= $request->destination;
        $route->save();
        return redirect()->route('route.index');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $route= Flight_route::find($id);
        return view('route.view',compact('route'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $route = Flight_route::find($id);
        return view('route.edit',compact('route'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $route= Flight_route::find($id);
        $route->departure= $request->departure;
        $route->destination= $request->destination;
        $route->save();
        return redirect()->route('route.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $route= Flight_route::findOrFail($id);
        $route->delete();
        return redirect()->route('route.index');
    }
}