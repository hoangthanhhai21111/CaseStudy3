@extends('master')
@section('content')
    <div class="main-content">
        @include('layout-index.header')
        <form action="{{ route('Position.store') }}"method="post"enctype="multipart/form-data" >
            @csrf
            <h1>
                thêm chức vụ trong công ty
            </h1>
            tên chức vụ : <input type="text" class="form-control" name="position" style="width:250px"> <br>
            <input type="submit"class="btn btn-primary" valua="add">
        </form>
    </div>
@endsection
