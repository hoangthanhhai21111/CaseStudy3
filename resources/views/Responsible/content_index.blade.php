<div class="main-content">
    @include('layout-index.header')
    <div class="section">
        <p class="text-center">
            <i class='fa fa-check' aria-hidden='true'></i>{{Session::get('create-success')}}
        </p>
    </div>
    <h1>lịch bay</h1>
    <a href="{{route('Responsible.create')}}" class="btn btn-primary">thêm</a>
    <table border="1" class="table">
        <thead>
        <tr>
            <th>id</th>
            <th>số hiệu chuyến bay</th>
            <th>cơ trưởng</th>
            <th>cơ phó</th>
            <th>tiếp viên trưởng</th>
            <th>tiếp viên phó</th>
            <th>tiếp viên</th>
            <th>tiếp viên</th>
            <th>tiếp viên</th>
            <th>Thao tác</th>
        </tr>
        </thead>
        <tbody>
            @foreach($itemp as $key => $Responsible)
        <tr>
            <td>{{$Responsible->id}}</td>
            <td>VNT.{{$Responsible->flight_date}}.{{$Responsible->flight_time}}.{{$Responsible->flight_schedules_id}}</td>
            <td>{{$Responsible->captain}}</td>
            <td>{{$Responsible->engine_deal}}</td>
            <td>{{$Responsible->chief_flight_attendant}}</td>
            <td>{{$Responsible->deputy_attendant}}</td>
            <td>{{$Responsible->stewardess_1}}</td>
            <td>{{$Responsible->stewardess_2}}</td>
            <td>{{$Responsible->stewardess_3}}</td>
            <form action="{{route('Responsible.delete',$Responsible->id )}}" method="post" enctype="multipart/form">
            <td>
                <a href="{{route('Responsible.show',$Responsible->id )}}"class="btn btn-info">Xem</a> 
                <a href="{{route('Responsible.edit',$Responsible->id )}}"class="btn btn-success">Sửa</a>  
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