@extends('master')
@section('content')
    <div class="main-content">
        @include('layout-index.header')
        <form action="{{ route('route.update', $route->id) }}"method="post"enctype="multipart/form-data">
            @csrf
            @method('PUT')
            xuất phát: <input type="text" class="form-control" name="departure">
            đích đến: <input type="text" class="form-control" name="destination"><br>
            <input type="submit"class="btn btn-primary" valua="add">
        </form>
    </div>
@endsection
