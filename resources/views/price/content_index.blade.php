<div class="main-content">
    @include('layout-index.header')
    <div class="section">
        <p class="text-center">
            <i class='fa fa-check' aria-hidden='true'></i>{{Session::get('create-success')}}
        </p>
    </div>
    <h1>Danh sách đường bay</h1>
    <a href="{{route('price.create')}}" class="btn btn-primary">thêm</a>
    <table border="1" class="table">
        <thead>
        <tr>
            <th>STT</th>
            <th>nơi xuất phát</th>
            <th>đích đến</th>
            <th>Thao tác</th>
        </tr>
        </thead>
        <tbody>
            @foreach($prices as $key => $price)
        <tr>
            <td>{{++$key}}</td>
            <td>{{$price->flight_schedule_id}}</td>
            <td>{{$price->price}}</td>
            <td>
                <form action="{{route('price.delete',$price->id )}}" method="post" enctype="multipart/form">
                <a href="{{route('price.show',$price->id )}}"class="btn btn-info">Xem</a> 
                <a href="{{route('price.edit',$price->id )}}"class="btn btn-success">Sửa</a>  
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