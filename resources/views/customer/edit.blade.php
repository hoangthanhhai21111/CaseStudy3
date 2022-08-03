@extends('master')
@section('content')
<div class="main-content">
    @include('layout-index.header')
    <table class="form-table" style="width:800px">
        <form action="{{ route('customers.update', $customer->id) }}"method="post"enctype="multipart/form-data">
            @csrf
            @method('PUT')
                <tr >
                    <td colspan="2">
                        tên: <input type="text" class="form-control" name="name">
                    </td>
                </tr>
                <tr>
                    <td>
                        ngày sinh: <input type="date" class="form-control" name="day_of_birth">
                    </td>
                    <td>
                        giới tính: <select name="gender" id="" class="form-control" >
                            <option value="Nam">Nam</option>
                            <option value="Nữ">Nữ</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        địa chỉ: <input type="text" class="form-control" name="address" value = 'hoàng thanh hải'>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        số điện thoại: <input type="text" class="form-control" name="phone">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        số cmnd/cccd: <input type="number" class="form-control" name="citizen_identification">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit"class="btn btn-primary" valua="add">
                    </td>
                </tr>
            </form>
        </table>
</div>
@endsection