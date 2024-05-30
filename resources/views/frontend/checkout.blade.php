<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đăng ký</title>
    @include('frontend.head')
    <link rel="stylesheet" href="{{asset('frontend\assets\css\user.css')}}">
    <link rel="stylesheet" href="{{asset('frontend\assets\css\errormessage.css')}}">
    <link rel="stylesheet" href="{{asset('frontend\assets\css\order.css')}}">
</head>
<body>
    @include('frontend.header')
    <div class="main-content">
        <form action="{{route('checkout.post_order')}}" method="GET" class="order row">
            @csrf
            <div class="register-form infor-ship">
                <h2>Thông tin giao hàng</h2>
                <div class="form-group">
                    <label for="name">Họ và tên</label>
                    <input type="text" id="name" name="name" required value="{{$account->name}}">
                    @error('username')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required readonly value="{{$account->email}}">
                    @error('email')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="phonenumber">Số điện thoại</label>
                    <input type="text" id="phonenumber" name="phonenumber" required value="@if($account->phonenumber){{$account->phonenumber}}@endif">
                    @error('phonenumber')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="address">Địa chỉ</label>
                    <input type="text" id="address" name="address" required value="@if($account->address){{$account->address}}@endif">
                    @error('address')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="block-pay-option">
                <h2>Thanh toán </h2>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="pttt" id="" />
                    <label class="form-check-label" for="">
                        Thanh toán khi nhận hàng
                    </label>
                </div>
            </div>
            <div class="block-order-infor">
                <h2>Đơn hàng</h2>
                <div class="order-infor">
                    <div class="name-price row">
                        <p class="name">Sinh tố bơ (x5)</p>
                        <p class="price">30.000 D</p>
                    </div>
                    <div class="sum-price row">
                        <p>Tổng</p>
                        <p class="price">150.000 D</p>
                    </div>
                    <div class="name-price row">
                        <p>Phí vận chuyển</p>
                        <p class="price">50.000 D</p>
                    </div>
                    <div class="sum-all-price row">
                        <p>Tổng cộng</p>
                        <p class="price">200.000</p>
                    </div>
                </div>
            </div>
            <button type="submit">Đặt Hàng</button>
        </form>
    </div>
    @include('frontend.footer')
</body>
</html>