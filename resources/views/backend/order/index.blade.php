@extends('master.admin')

@section('title', 'Đơn hàng')

@section('css')

<style>
    .table-order-admin span{
        padding: 5px 5px;
        /* color: rgb(255, 255, 255); */
        font-weight: 700;
        display: inline-block;
        width: 150px;
        text-align: center;
    }

    .order-status-0 {
        background-color: #ddd;
    }
    .order-status-1 {
        background-color: #c5e25c;
    }
    .order-status-2 {
        background-color: #95e5a3;
    }
    .order-status-3 {
        background-color: #28d112;
    }
    .order-status-4 {
        background-color: #ee2737;
    }

    .status-container {
    position: relative;
    display: inline-block;
}

    .order-status {
        display: table-cell;
        vertical-align: middle;
    }

    .status-options {
        display: none;
        position: absolute;
        top: 100%;
        left: 0;
        background-color: white;
        border: 1px solid #ccc;
        z-index: 1;
        min-width: 150px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    .status-container:hover .status-options {
        display: block;
    }

    .status-options a {
        display: block;
        padding: 10px;
        text-decoration: none;
        color: black;
        white-space: nowrap;
    }

    .status-options a:hover {
        opacity: 80%;
    }

</style>

@endsection

@section('main')    

<table class="table table-hover table-order-admin">
    <thead>
        <tr>
            <th>STT</th>
            <th>Mã đơn hàng</th>
            <th>Ngày đặt</th>
            <th>Người đặt</th>
            <th>Tổng giá</th>
            <th class="tt">Trạng thái</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($orders as $order)
        <?php $total = 0; ?>
        <tr>
            <td>{{$loop->index + 1}}</td>
            <td>{{$order->id}}</td>
            <td>{{$order->created_at->format('d/m/Y H:i:s')}}</td>
            <td>{{$order->email}}</td>
            @foreach ($order->details as $detail)
                <?php $total += $detail->quantity * $detail->price ?>
            @endforeach
            <td>{{$total}}</td>
            {{-- <div class="status-container">
                <div class="order-status">
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
                </div>
                
                <div class="status-options">
                    @if($order->status != 0)
                        <a href="">Chờ xác nhận</a>
                    @endif
                    @if($order->status != 1)
                        <a href="">Đã tiếp nhận</a>
                    @endif
                    @if($order->status != 2)
                        <a href="">Đang giao hàng</a>
                    @endif
                    @if($order->status != 3)
                        <a href="">Thành công</a>
                    @endif
                    @if($order->status != 4)
                        <a href="">Đã hủy</a>
                    @endif
                </div>
            </div> --}}

            <td class="order-status">
                <div class="status-container">
                    @if($order->status == 0) 
                        <span class="order-status-0">Chờ xác nhận</span>
                    @elseif($order->status == 1)
                        <span class="order-status-1">Đã tiếp nhận</span>
                    @elseif($order->status == 2)
                        <span class="order-status-2">Đang giao hàng</span>
                    @elseif($order->status == 3)
                        <span class="order-status-3">Thành công</span>
                    @elseif($order->status == 4)
                        <span class="order-status-4">Đã hủy</span>
                    @endif
            
                    <div class="status-options">
                        @if($order->status != 0)
                            <a class="order-status-0" href="{{route('order.updateStatus', ['id' => $order->id, 'status' => 0])}}">Chờ xác nhận</a>
                        @endif
                        @if($order->status != 1)
                            <a class="order-status-1" href="{{route('order.updateStatus', ['id' => $order->id, 'status' => 1])}}">Đã tiếp nhận</a>
                        @endif
                        @if($order->status != 2)
                            <a class="order-status-2" href="{{route('order.updateStatus', ['id' => $order->id, 'status' => 2])}}">Đang giao hàng</a>
                        @endif
                        @if($order->status != 3)
                            <a class="order-status-3" href="{{route('order.updateStatus', ['id' => $order->id, 'status' => 3])}}">Thành công</a>
                        @endif
                        @if($order->status != 4)
                            <a class="order-status-4" href="{{route('order.updateStatus', ['id' => $order->id, 'status' => 4])}}">Đã hủy</a>
                        @endif
                    </div>
                </div>
            </td>
            
            <td><a href="{{route('order.order_detail', ['id' => $order->id])}}" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i> Chi tiết</a></td>
 
        </tr>
        @endforeach
    </tbody>
</table>


@endsection