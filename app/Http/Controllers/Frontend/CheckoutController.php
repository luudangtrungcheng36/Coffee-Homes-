<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\VerifyOrder;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class CheckoutController extends Controller
{
    public function index() {
        $account = Auth::user();
        return view('frontend.checkout', compact('account'));
    }

    public function post_order(Request $request) {
        /** @var User $auth */
        $auth = Auth::user();
        // if (method_exists($auth, 'carts')) {
        //     // Xóa tất cả các cart của người dùng đã đăng nhập
        //     $auth->carts()->delete();
        //     // return redirect()->route('home.index')->with('success', 'Đặt hàng thành công. Vui lòng kiểm tra email và xác minh đơn hàng');
        // }
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phonenumber' => 'required',
            'address' => 'required',
        ]);
        
        $data = $request->only('name', 'email', 'phonenumber', 'address');
        $data['account_id'] = $auth->id;

        if($order = Order::create($data)) {
            $token = Str::random(30);
            foreach ($auth->carts as $cart) {
                $data1 = [
                    'order_id' => $order->id,
                    'product_id' => $cart->product_id,
                    'price' => $cart->price,
                    'quantity' => $cart->quantity,
                ];
                
                OrderDetail::create($data1);
            }
            $order->token = $token;
            $order->save();
            Mail::to($auth->email)->send(new VerifyOrder($order, $token));
                if (method_exists($auth, 'carts')) {
                // Xóa tất cả các cart của người dùng đã đăng nhập      
                    $auth->carts()->delete();
                // return redirect()->route('home.index')->with('success', 'Đặt hàng thành công. Vui lòng kiểm tra email và xác minh đơn hàng');
                }
            return redirect()->route('home.index')->with('success', 'Đặt hàng thành công. Vui lòng kiểm tra email và xác minh đơn hàng');
        }

        return redirect()->route('home.index')->with('error', 'Có lỗi xảy ra, thử lại sau');
    }

    public function verify($token) {
        $order = Order::where('token', $token)->first();
        if($order) {
            $order->token = 1;
            $order->status = 1;
            $order->save();
            return redirect()->route('home.index')->with('success', 'Đơn hàng sẽ sớm được giao vui lòng chú ý điện thoại');
        }

        return abort(404);
    }

    public function history() {
        $auth = Auth::user();

        return view('frontend.myorder', compact('auth'));
    }

    public function historyDetail(Order $order) {
        $auth = Auth::user();
        return view('frontend.myorder_detail', compact('order', 'auth'));
    }
}
