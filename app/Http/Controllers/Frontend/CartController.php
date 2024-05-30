<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index() {
        // if(Auth::check()) 
        //     $carts = Cart::where('account_id', Auth::user()->id)->orderBy('created_at')->get();
        // else    
        //     $carts = false;
        $carts = Auth::check() ? Cart::where('account_id', Auth::user()->id)->orderBy('created_at')->get() : false;
        return view('frontend.cart', compact('carts'));
    }

    public function create($productId, Request $request) {

        $product = Product::findOrFail($productId);
        $quantity = $request->quantity ? $request->quantity : 1;

        $cartExist = Cart::where([
            'account_id' => Auth::user()->id,
            'product_id' => $product->id,
        ])->first();

        if($cartExist) {

            Cart::where([
                'account_id' => Auth::user()->id,
                'product_id' => $product->id,
            ])->increment('quantity', $quantity);
            // $cartExist->update([
            //     'quantity' => $cartExist->quantity + $quantity
            // ]);
            return redirect()->route('cart.index')->with('success', 'Thêm sản phẩm vào giỏ thành công');
        } else {
            $data = [
                'account_id' => Auth::user()->id,
                'product_id' => $product->id,
                'price' => $product->sale_price ? $product->sale_price : $product->price,
                'quantity' => $quantity,
            ];
            if(Cart::create($data)) {
                return redirect()->route('cart.index')->with('success', 'Thêm sản phẩm vào giỏ thành công');
            }
        }
        
        return back()->with('error', 'Có lỗi xảy ra, thử lại sau ');
    }

    public function update($productId, Request $request) {
        $product = Product::findOrFail($productId);
        $quantity = $request->quantity ? $request->quantity : 1;

        $cartExist = Cart::where([
            'account_id' => Auth::user()->id,
            'product_id' => $product->id,
        ])->first();

        if($cartExist) {
            Cart::where([
                'account_id' => Auth::user()->id,
                'product_id' => $product->id,
            ])->update([
                'quantity' => $quantity,
            ]);
            return redirect()->route('cart.index')->with('success', 'Cập nhập số lượng sản phẩm thành công');
        } 

        return back()->with('error', 'Có lỗi xảy ra, thử lại sau ');

    }

    public function delete($product_id) {
        Cart::where([
            'account_id' => Auth::user()->id,
            'product_id' => $product_id,
        ])->delete();
        return back()->with('success', 'Xóa thành công ');
    }
}
