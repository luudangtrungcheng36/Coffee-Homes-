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

        .myorder span {
            padding: 5px 5px;
            /* color: rgb(255, 255, 255); */
            font-weight: 700;
            display: inline-block;
            width: 150px;
            text-align: center;
        }

        .order-status-0 span{
            background-color: #ddd;
        }
        .order-status-1 span{
            background-color: #c5e25c;
        }
        .order-status-2 span{
            background-color: #95e5a3;
        }
        .order-status-3 span{
            background-color: #28d112;
        }
        .order-status-4 span{
            background-color: #ee2737;
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

        body {
            font-family: "Roboto", sans-serif;
        }

        .col-status {
            width: 30%;
        }
    </style>
</head>
<body>
    @include('frontend.header')
        <div class="main-content cart">
            <h2>Đơn hàng của tôi</h2>
            <table class="myorder">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Ngày đặt</th>
                        <th>Tổng giá</th>
                        <th class="col-status">Trạng thái</th>
                        <th class="btn-action"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($auth->orders as $order)
                        <?php $total = 0;?>
                        <tr>
                            <td>{{$loop->index + 1}}</td>
                            <td>{{$order->created_at->format('d/m/Y')}}</td>
                            @foreach ($order->details as $detail)
                                <?php $total += $detail->price * $detail->quantity;?>
                            @endforeach
                            <td>{{number_format($total)}}</td>
                            @if($order->status == 0) 
                                <td class="order-status-0"><span>Chờ xác nhận</span></td>
                            @elseif($order->status == 1)
                                <td class="order-status-1"><span>Đã tiếp nhận</span></td>
                            @elseif($order->status == 2)
                                <td class="order-status-2"><span>Đang giao hàng</span></td>
                            @elseif($order->status == 3)
                                <td class="order-status-3"><span>Thành công</span></td>
                            @elseif($order->status == 4)
                                <td class="order-status-4"><span>Đã hủy</span></td>
                            @endif
                            <td><a class="btn-detail" href="{{route('checkout.historyDetail', $order->id)}}">Chi tiết</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    @include('frontend.footer')
</body>
</html>