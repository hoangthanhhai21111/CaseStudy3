<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Booking </title>
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
                        <form method="get" action="{{route('home.orderProcessing',$id)}}">
							@csrf
							<div class="form-group">
								<div class="form-checkbox">
									
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<span class="form-label">Tên:</span>
										<input name="name" id="" class="form-control" type="text">
										<span class="select-arrow"></span>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<span class="form-label">địa chỉ</span>
                                        <input name="address" id="" class="form-control" type="text">
										</select>
										<span class="select-arrow"></span>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										<span class="form-label">ngày sinh:</span>
										<input class="form-control" name='day_of_birth' type="date" required>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<span class="form-label">số điện thoại</span>
                                        <input class="form-control" name='phone' type="number" required>
									</div>
								</div>
								<div class="col-md-2">
									<div class="form-group">
										<span class="form-label">số CMND/CCCD</span>
                                        <input class="form-control" name='citizen_identification' type="text" required>
										
									</div>
								</div>
								<div class="col-md-2">
									<div class="form-group">
										<span class="form-label">giới tính</span>
										<select class="form-control" name='gender'>
											<option value = 'Nam'>Nam</option>
											<option value = 'Nữ'>Nữ</option>
										</select>
										<span class="select-arrow"></span>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-btn">
										<button class="submit-btn">Show flights</button>
									</div>
								</div>
							</div>
						</form>
                    </div>
                </div>
                {{-- <--form--> --}}
            </div>
        </div>
    </div>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>