@extends('master')
@section('content')
    <div class="main-content">
        @include('layout-index.header')
        <form action="{{ route('price.store') }}"method="post"enctype="multipart/form-data" >
            @csrf
            chuyên bay: <select name="flight_schedule_id" id="" class="form-control"style="width:250px ">
                @foreach($schedules as $key => $schedule)
                <option value="{{$schedule->id}}">{{$schedule->departure}} =>{{$schedule->destination}} \\ {{$schedule->flight_date}} : {{$schedule->flight_time}}</option>
                @endforeach
            </select>
            giá : <input type="text" class="form-control" name="price" style="width:250px"> <br>
            <input type="submit"class="btn btn-primary" valua="add">
        </form>
    </div>
@endsection
