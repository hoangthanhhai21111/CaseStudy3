<div class="main-content">
    @include('layout-index.header')
    <div class="section">
        <p class="text-center">
            <i class='fa fa-check' aria-hidden='true'></i>{{Session::get('create-success')}}
        </p>
    </div>
    <h1>lịch bay</h1>
    <a href="{{route('schedules.create')}}" class="btn btn-primary">thêm</a>
    <table border="1" class="table">
        <thead>
        <tr>
            <th>số hiệu</th>
            <th>xuất phát</th>
            <th>đích đến</th>
            <th>ngày bay</th>
            <th>giờ bay</th>
            <th>máy bay</th>
            <th>Thao tác</th>
        </tr>
        </thead>
        <tbody>
            @foreach($itemp as $key => $schedule)
        <tr>
            <td>VNT.{{$schedule->flight_date}}.{{$schedule->flight_time}}.{{$schedule->id}}</td>
            <td>{{$schedule->departure}}</td>
            <td>{{$schedule->destination}}</td>
            <td>{{$schedule->flight_date}}</td>
            <td>{{$schedule->flight_time}}</td>
            <td>{{$schedule->plane_name}}</td>
            <form action="{{route('schedules.delete',$schedule->id )}}" method="post" enctype="multipart/form">
            <td>
                <a href="{{route('schedules.show',$schedule->id )}}"class="btn btn-info">Xem</a> 
                <a href="{{route('schedules.edit',$schedule->id )}}"class="btn btn-success">Sửa</a>  
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