
<div class="main-content">
    @include('layout-index.header')
    <div class="section">
        <p class="text-center">
            <i class='fa fa-check' aria-hidden='true'></i>{{Session::get('create-success')}}
        </p>
    </div>
    <h1>Danh sách nhân viên</h1>
    <a href="{{route('user.create')}}" class="btn btn-primary">thêm</a>
    <table border="1" class="table table-striped">
        <thead>
        <tr>
            <th>STT</th>
            <th>Họ và tên</th>
            <th>ngày sinh</th>
            <th>địa chỉ</th>
            <th>chức vụ</th>
            <th>Số điện thoại</th>
            <th>Email</th>
            <th>ảnh</th>
            <th>Thao tác</th>
        </tr>
        </thead>
        <tbody>
            @foreach($users as $key => $user)
        <tr>
            <td>{{$key}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->day_of_birth}}</td>
            <td>{{$user->address}}</td>
            <td>{{$user->position}}</td>
            <td>{{$user->phone}}</td>
            <td>{{$user->email}}</td>           
            <td>
                {{-- {{dd($user->image)}} --}}
                <img src="{{ asset($user->image) }}" alt="" style="width: 70px">
            </td>
            <form action="{{route('user.destroy',$user->id )}}" method="post" enctype="multipart/form">
            <td>
                <a href="{{route('user.show',$user->id )}}"class="btn btn-info">Xem</a> 
                <a href="{{route('user.edit',$user->id )}}"class="btn btn-success">Sửa</a>  
                    @csrf 
                    @method("DELETE")
                <input type="submit" value="xóa" class="btn btn-danger">
            </form>
            </td>
        </tr>
       @endforeach
        </tbody>
    </table>
</div>