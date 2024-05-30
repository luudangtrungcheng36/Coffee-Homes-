<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ListProductController extends Controller
{
    public function show($id) {
        $titleCategory = Category::find($id);
        $products = Product::where('category_id', $id)->get();
        $categories = Category::with('products')->get();
        return view('frontend.list_product', compact('categories', 'products', 'titleCategory'));
    }
}
