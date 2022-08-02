@extends('master')
@section('content')
    <div class="main-content">
        @include('layout-index.header')
        <form action="{{ route('plane.update', $plane->id) }}"method="post"enctype="multipart/form-data">
            @csrf
            @method('PUT')
            tên: <input type="text" class="form-control" name="name"><br>
            <input type="submit"class="btn btn-primary" valua="add">
        </form>
    </div>
@endsection
