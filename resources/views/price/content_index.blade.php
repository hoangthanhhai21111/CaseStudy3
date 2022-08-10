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
            <th>chuyến bay</th>
            <th>giá</th>
            <th>Thao tác</th>
        </tr>
        </thead>
        <tbody>
            @foreach($schedules as $key => $price)
        <tr>
            <td>{{++$key}}</td>
            <td>{{$price->departure}} =>{{$price->destination}} \\ {{$price->flight_date}} : {{$price->flight_time}}</td>
            <td>{{$price->price}}.VNĐ</td>
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