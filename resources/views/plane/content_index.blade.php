
<div class="main-content">

    @include('layout-index.header')
    <div class="section">
        <p class="text-center">
            <i class='fa fa-check' aria-hidden='true'></i>{{Session::get('create-success')}}
        </p>
    </div>
    <h1>Danh sách máy bay</h1>
    <a href="{{route('plane.create')}}" class="btn btn-primary">thêm</a>
    <table border="1" class="table">
        <thead>
        <tr>
            <th>STT</th>
            <th>tên</th>
            <th>THÔNG TIN</th>
            {{-- <th>Thao tác</th> --}}


        </tr>
        </thead>
        <tbody>
            @foreach($plane as $key => $planes)
        <tr>
            <td>{{++$key}}</td>
            <td>{{$planes->plane_name}}</td>
            <td>
                <form action="{{route('plane.delete',$planes->id )}}" method="post" enctype="multipart/form">
                <a href="{{route('plane.show',$planes->id )}}"class="btn btn-info">Xem</a> 
                <a href="{{route('plane.edit',$planes->id )}}"class="btn btn-success">Sửa</a>  
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