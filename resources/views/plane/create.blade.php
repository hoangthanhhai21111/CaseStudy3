@extends('master')
@section('content')
    <div class="main-content">
        @include('layout-index.header')

        <form action="{{ route('plane.store') }}"method="post"enctype="multipart/form-data" style="">
            @csrf
            tên: <input type="text" class="form-control" name="name">
            @error('name')
                <p style="color:red">{{ $message }}</p>
            @enderror
            <input type="submit"class="btn btn-primary" valua="add">
        </form>
    </div>
@endsection
