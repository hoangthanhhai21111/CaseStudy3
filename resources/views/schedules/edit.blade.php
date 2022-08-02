@extends('master')
@section('content')
<div class="main-content">
    @include('layout-index.header')
    <form action="{{route('schedules.update',$schedule->id)}}"method="post"enctype="multipart/form-data">
        @csrf
        @method('PUT')
        tên máy bay: <select name="plane_id" id="" class="form-control">
            @foreach($planes as $key => $plane)
             <option value="{{$plane->id}}">{{$plane->plane_name}}</option>
             @endforeach
        </select>
        <br>
        tuyến bay: <select name="Flight_route_id" id="" class="form-control">
            @foreach($routes as $key => $route)
            <option value="{{$route->id}}">{{$route->departure}} --> {{$route->destination}} </option>
            @endforeach
        </select>
        <br>
        ngày bay: <input type="date" name='flight_date' class="form-control">
        <br>
        giờ bay <input type="time" class="form-control" name="flight_time">
        <input type="submit"class="btn btn-primary" valua="add">
    </form>
</div>
@endsection