<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index() {
        $products = Product::all();
        $saleProducts = Product::whereNotNull('sale_price')->get();
        $hotProducts = Product::where('hot_product', 1)->get();
        return view('frontend.home', compact('saleProducts', 'hotProducts'));
    }

    public function productDetail(Product $oneProduct) {
        // $oneProduct = Product::where('id', $id)->get(); get là lấy ra 1 collection phải dùng foreach. 0 dùng trực tiếp được 
        // $oneProduct = Product::findOrFail($id);
        // dd($oneProduct);
        $account = null;
        if(Auth::user()) {
            $account = Auth::user();
        }
        $comments = Review::where('product_id', $oneProduct->id)->get();
        $categories = Category::with('products')->get();
        return view('frontend.product_detail', compact('categories', 'oneProduct', 'account', 'comments'));
    }

    public function allNews() {
        return view('frontend.allNews');
    } 

}
