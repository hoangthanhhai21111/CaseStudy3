@extends('master')
@section('content')
    <div class="main-content">
        @include('layout-index.header')
        <form action="{{ route('route.store') }}"method="post"enctype="multipart/form-data" style="">
            @csrf
            nơi xuất phát: <input type="text" class="form-control" name="departure">
            đích đến: <input type="text" class="form-control" name="destination">
            @error('name')
                <p style="color:red">{{ $message }}</p>
            @enderror
            <input type="submit"class="btn btn-primary" valua="add">
        </form>
    </div>
@endsection
