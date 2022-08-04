<div class="main-content">
    @include('layout-index.header')
    <div class="section">
        <p class="text-center">
            <i class='fa fa-check' aria-hidden='true'></i>{{ Session::get('create-success') }}
        </p>
    </div>
    <h1>Danh sách khách hàng</h1>
    <a href="{{ route('customers.create') }}" class="btn btn-primary">thêm</a>
    <table border="1" class="table table-striped">
        <thead>
            <tr>
                <th>STT</th>
                <th>Họ và tên</th>
                <th>giới tính</th>
                <th>Số điện thoại</th>
                <th>số cmnd/cccd</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($customers as $key => $customer)
                <tr>
                    <td>{{ ++$key }}</td>
                    <td>{{ $customer->name }}</td>
                    <td>{{ $customer->gender }}</td>
                    <td>{{ $customer->phone }}</td>
                    <td>{{ $customer->citizen_identification }}</td>
                    <form action="{{ route('customers.delete', $customer->id) }}" method="post"
                        enctype="multipart/form">
                        <td>
                            <a href="{{ route('customers.edit', $customer->id) }}"class="btn btn-success">Sửa</a>
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="xóa" class="btn btn-danger">
                    </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
