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
                        {{-- {{dd($notification)}} --}}
                        <h1 style="text-align:center;color:rgb(236, 8, 8)">Kiểm tra thông tin </h1>
                        <table class="table">
                            @foreach ($notification as $key => $value)
                                <tr>
                                    <th style='color:rgb(11, 232, 40);width:25%;'>Họ và tên/fullName :</th>
                                    <td style='color:red'>{{ $value->name }}</td>
                                </tr>
                                <tr>
                                    <th style='color:rgb(11, 232, 40);width:20%;'>ngày sinh/birthday :</th>
                                    <td style='color:red'>{{ $value->day_of_birth }}</td>
                                </tr>
                                <tr>
                                    <th style='color:rgb(11, 232, 40);width:20%;'>giới tính/gender :</th>
                                    <td style='color:red'>{{ $value->gender }}</td>
                                </tr>
                                <tr>
                                    <th style='color:rgb(11, 232, 40);width:20%;'>CMND,CCCD/citizen_identification :
                                    </th>
                                    <td style='color:red'>{{ $value->citizen_identification }}</td>
                                </tr>
                                <tr>
                                    <th style='color:rgb(11, 232, 40);width:20%;'>địa chỉ/address :</th>
                                    <td style='color:red'>{{ $value->address }}</td>
                                </tr>
                                <tr>
                                    <th style='color:rgb(11, 232, 40);width:20%;'>điện thoại/phone :</th>
                                    <td style='color:red'>{{ $value->phone }}</td>
                                </tr>
                                <tr>
                                    <th style='color:rgb(11, 232, 40);width:20%;'>xuất phát/start :</th>
                                    <td style='color:red'>{{ $value->departure }}</td>
                                </tr>
                                <tr>
                                    <th style='color:rgb(11, 232, 40);width:20%;'>đích đến/target :</th>
                                    <td style='color:red'>{{ $value->destination }}</td>
                                </tr>
                                <tr>
                                    <th style='color:rgb(11, 232, 40);width:20%;'>ngày bay/day :</th>
                                    <td style='color:red'>{{ $value->flight_date }}</td>
                                </tr>
                                <tr>
                                    <th style='color:rgb(11, 232, 40);width:20%;'>giờ bay/time:</th>
                                    <td style='color:red'>{{ $value->flight_time }}</td>
                                </tr>
                                <tr>
                                    <th style='color:rgb(11, 232, 40);width:20%;'>giá/price :</th>
                                    <td style='color:red'>{{ $value->price }} .VNĐ</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><a href="" class="btn btn-primary">thanh toán</a></td>
                                </tr>
                            @endforeach

                        </table>
                    </div>
                </div>
                {{-- <--form--> --}}
            </div>
        </div>
    </div>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
