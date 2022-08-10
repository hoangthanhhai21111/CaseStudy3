<div class="main-content">
    @include('layout-index.header')
    <div class="section">
        <p class="text-center">
            <i class='fa fa-check' aria-hidden='true'></i>{{Session::get('create-success')}}
        </p>
    </div>
    <h1>Danh sách các chức vụ trong công ty</h1> 
    <a href="{{route('Position.create')}}" class="btn btn-primary">thêm</a>
    <table border = "1" class="table">
        <thead>
        <tr>
            <th>STT</th>
            <th style="text-align:center; width:70%">tên chức vụ</th>
            <th>thao tác</th>
        </tr>
        </thead>
        <tbody>
            @foreach($position as $key => $value)
        <tr>
            <td>{{++$key}}</td>
            <td >{{$value->position}}</td>
            <td>
                <form action="{{route('Position.delete',$value->id )}}" method="post" enctype="multipart/form">
                <a href="{{route('Position.show',$value->id )}}"class="btn btn-info">Xem</a> 
                <a href="{{route('Position.edit',$value->id )}}"class="btn btn-success">Sửa</a>  
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