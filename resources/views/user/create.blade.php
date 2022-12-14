@extends('master')
@section('content')
    <div class="main-content">
        @include('layout-index.header')

        <form action="{{ route('user.store') }}"method="post"enctype="multipart/form-data" style="">
            @csrf
            tên: <input type="text" class="form-control" name="name">
            @error('name')
                <p style="color:red">{{ $message }}</p>
            @enderror
            <br>
            ngày sinh: <input type="date" class="form-control" name="day_of_birth">
            @error('day_of_birth')
                <p style="color:red">{{ $message }}</p>
            @enderror
            <br>
            địa chỉ: <input type="text" class="form-control" name="address">
            @error('address')
                <p style="color:red">{{ $message }}</p>
            @enderror
            <br>
            chức vụ: <Select name="position" class="form-control">
                @foreach ($position as $key => $value)
                <option value="{{$value->position}}">{{$value->position}}</option>
                @endforeach
            </Select>
            @error('position')
                <p style="color:red">{{ $message }}</p>
            @enderror
            <br>
            số điện thoại: <input type="text" class="form-control" name="phone">
            @error('phone')
                <p style="color:red">{{ $message }}</p>
            @enderror
            <br>
            email: <input type="email" class="form-control" name="email">
            @error('email')
                <p style="color:red">{{ $message }}</p>
            @enderror
            <br>
            <img type="hidden" width="120px" height="100px" id="blah" src="#" alt="your image" /> <br>
            <input accept="image/*" type='file' id="imgInp" name="image" />
            <input type="submit"class="btn btn-primary" valua="add">
        </form>
    </div>
    <script>
        jQuery(document).ready(function() {
            jQuery('#imgInp').change(function() {
                const file = jQuery(this)[0].files;
                if (file[0]) {
                    jQuery('#blah').attr('src', URL.createObjectURL(file[0]));
                }
            });
        });
    </script>
@endsection
