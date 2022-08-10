@extends('master')
@section('content')
    <div class="main-content">

        @include('layout-index.header')

        <form action="{{ route('user.update', $user->id) }}"method="post"enctype="multipart/form-data">
            @csrf
            @method('PUT')
            tên: <input type="text" class="form-control" name="name"><br>
            số điện thoại: <input type="text" class="form-control" name="phone"><br>
            email: <input type="email" class="form-control" name="email"><br>
            <input accept="image/*" type='file' id="imgInp" name="image" />
            <img type="hidden" width="120px" height="100%" id="blah" src="#" alt="your image" /> <br>
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
