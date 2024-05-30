<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class Ordercontroller extends Controller
{
    public function index() {
        $orders = Order::all();
        return view('backend.order.index', compact('orders'));
    }

    public function updateStatus($id, $status) {
        $order = Order::find($id);
        if($order) {
            $order->status = $status;
            $order->save();
            return redirect()->back()->with('success', 'Cập nhập trạng thái thành công');
        }

        return redirect()->back()->with('error', 'Có lỗi xảy ra, thử lại sau');
    }

    public function order_detail($id) {
        $order = Order::find($id);
        return view('backend.order.order_detail', compact('order'));
    }
}
