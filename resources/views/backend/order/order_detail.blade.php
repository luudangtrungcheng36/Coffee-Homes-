<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lịch sử đon hàng</title>
    @include('frontend.head')
    <link rel="stylesheet" href="{{asset('frontend\assets\css\user.css')}}">
    <link rel="stylesheet" href="{{asset('frontend\assets\css\errormessage.css')}}">
    <link rel="stylesheet" href="{{asset('frontend\assets\css\cart.css')}}">

    <style>
        .myorder {
            width: 100%;
            border-collapse: collapse;
        }

        .myorder th,td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        .myorder th {
            background-color: #f2f2f2;
        }

        .myorder .order-status {
            padding: 5px 5px;
            background-color: aquamarine;
        }

        .myorder .btn-detail {
            padding: 5px 5px;
            background: #ddd;
            text-decoration: none;
            border-radius: 5px;
            margin-left: 15px;
            display: inline-block;
        }

        .btn-action {
            width: 10%;
        }

        .img-myorder_detail {
            width: 80px;
            height: 50px;
            object-fit: cover;
        }

        .h2-product {
            /* float: left; */
        }

        .about-user {
            justify-content: space-between;
            gap: 100px;
            margin-bottom: 30px;
        }

        .infor-user {
            /* margin-left: 200px; */
            width: 80%;
        }

        .infor-shipping {
            /* margin-left: 200px; */
            width: 80%;
        }

        .title {
            font-weight: 700;
            font-size: 18px;
        }

        .a {
            justify-content: space-between;
        }

        .about-user span {
            color: red;
        }


    </style>
</head>
<body>
    @include('frontend.header')
    <div class="main-content cart">
            <div class="about-user row">
                <div class="infor-user">
                    <h2>Thông tin khách hàng</h2>
                    <div class="row a">
                        <p class="title">Họ tên</p>
                        <p class="des">{{$order->account->name}}</p>
                    </div>
                    <div class="row a">
                        <p class="title">Phone</p>
                        <p class="des">
                            @if($order->account->phonenumber) {{$order->account->phonenumber}} @else <span>Chưa có thông tin</span> @endif
                        </p>
                    </div>
                    <div class="row a">
                        <p class="title">Địa chỉ</p>
                        <p class="des">@if($order->account->address) {{$order->account->address}} @else <span>Chưa có thông tin</span> @endif</p>
                    </div>
                </div>

                <div class="infor-shipping">
                    <h2>Thông tin giao hàng</h2>
                    <div class="row a">
                        <p class="title">Họ tên</p>
                        <p class="des">{{$order->name}}</p>
                    </div>
                    <div class="row a">
                        <p class="title">Phone</p>
                        <p class="des">{{$order->phonenumber}}</p>
                    </div>
                    <div class="row a">
                        <p class="title">Địa chỉ</p>
                        <p class="des">{{$order->address}}</p>
                    </div>
                </div>
            </div>
            <h2 class="h2-product">Thông tin sản phẩm</h2>
            <table class="myorder">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Ảnh sản phẩm</th>
                        <th>Tên sản phẩm </th>
                        <th>Số lượng</th>
                        <th>Giá bán</th>
                        <th>Tổng giá</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order->details as $detail)
                        <tr>
                            <td>{{$loop->index + 1}}</td>
                            <td><img class="img-myorder_detail" src="{{asset('uploads/products/' . $detail->product->image)}}" alt=""></td>
                            <td>{{$detail->product->name}}</td>
                            <td>{{$detail->quantity}}</td>
                            <td>{{number_format($detail->price, 0, '.', '.') . ' đ'}}</td>
                            <td>{{number_format($detail->quantity * $detail->price, 0, '.', '.') . ' đ'}}</td>
                        </tr>
                        @endforeach
                </tbody>
            </table>

        </div>
    @include('frontend.footer')
</body>
</html>