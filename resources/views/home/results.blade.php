<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Booking</title>
    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=PT+Sans:400" rel="stylesheet">
    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="{{ asset('asset/css/bootstrap.min.css') }}" />
    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="{{ asset('asset/css/style.css') }}" />
</head>
<body>
    <div id="booking" class="section">
        <div class="section-center">
            <div class="container">
                {{-- <--form--> --}}
                <div class="row">
                    <div class="booking-form">
                        <table class="table table-striped table">
                            <thead>
                                <tr>
                                    <th style="color: blue">STT</th>
                                    <th style="color: blue">Nơi xuất phát</th>
                                    <th style="color: blue">Đích đến</th>
                                    <th style="color: blue">ngày bay</th>
                                    <th style="color: blue">giờ bay</th>
                                    <th style="color: blue">giá vé</th>
                                    <th style="color: rgb(221, 86, 14)">Thao tác</th>
                                </tr>
                            </thead>

                            <body>
                                @if (!count($results) == 0)
                                    @foreach ($results as $key => $result)
                                        <tr>
                                            <td style="color: rgb(233, 17, 17)">
                                                {{ ++$key }}
                                            </td>
                                            <td style="color: rgb(233, 17, 17)">
                                                {{ $result->departure }}
                                            </td>
                                            <td style="color: rgb(233, 17, 17)">
                                                {{ $result->destination }}
                                            </td>
                                            <td style="color: rgb(233, 17, 17)">
                                                {{ $result->flight_date }}
                                            </td>
                                            <td style="color: rgb(233, 17, 17)">
                                                {{ $result->flight_time }}
                                            </td>
                                            <td style="color: rgb(233, 17, 17)">
                                                {{ $result->price}}.VNĐ
                                            </td>
                                            <th style="color: rgb(233, 17, 17)">
                                                <a href="{{route('home.oder',$result->id)}}" class=''>Đặt vé</a>
                                            </th>
                                        </tr>
                                    @endforeach
                                @else
                                    <h1 style="text-align: center; color:aqua">không tìm thấy chuyến bay nào</h1>
                                @endif

                            </body>
                        </table>
                    </div>
                </div>
                {{-- <--form--> --}}
            </div>
        </div>
    </div>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
