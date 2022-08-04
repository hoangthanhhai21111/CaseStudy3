@extends('master')
@section('content')
    <div class="main-content">
        @include('layout-index.header')
        <form action="{{ route('price.store') }}"method="post"enctype="multipart/form-data" style="">
            @csrf
            chuyên bay: <select name="" id="" class="form-control">
                @foreach($schedules as $key => $schedule)
                <option value="{{$schedule->id}}">{{$schedule->departure}} =>{{$schedule->destination}} \\ {{$schedule->flight_date}} : {{$schedule->flight_time}}</option>
                @endforeach
            </select>
            đích đến: <input type="text" class="form-control" name="destination">
            @error('name')
                <p style="color:red">{{ $message }}</p>
            @enderror
            <input type="submit"class="btn btn-primary" valua="add">
        </form>
    </div>
@endsection
