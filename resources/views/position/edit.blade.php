@extends('master')
@section('content')
    <div class="main-content">
        @include('layout-index.header')
        <form action="{{ route('Position.update', $position->id) }}"method="post"enctype="multipart/form-data">
            @csrf
            @method('PUT')
            tên chức vụ: <input type="text" class="form-control" name="position" value="{{$position->position}}">
            <input type="submit"class="btn btn-primary" valua="add">
        </form>
    </div>
@endsection
