<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('backend.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('backend.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'name' => 'required',
            'price' => 'required', 
        ]); 

        $product = new Product();

        $product->name = $request->name;
        $product->price = $request->price;
        $product->sale_price = $request->sale_price; 
        $product->category_id = $request->category;
        $product->hot_product = $request->has('hot_product') ? 1 : 0;
        $product->status = $request->status;
        $product->description = $request->description;
        if($request->image) {
            $image = $request->image->hashName();
            $request->image->move(public_path('uploads/products'), $image);
            $product->image = $image;
        }
        

        $product->save();

        return redirect()->route('product.index')->with('message', 'Product added successfully!');

    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('backend.products.edit', compact('categories', 'product'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string',
            'category' => 'required|exists:categories,id', // Make sure category exists in categories table
            'price' => 'required|numeric',
            'sale_price' => 'nullable|numeric',
            // 'hot_product' => 'nullable|boolean',
            'status' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Max size 2MB for image
            'description' => 'nullable|string',
        ]);

        $product->name = $request->input('name');
        $product->category_id = $request->input('category');
        $product->price = $request->input('price');
        $product->sale_price = $request->input('sale_price');
        $product->hot_product = $request->has('hot_product') ? 1 : 0;
        $product->status = $request->input('status');
        $product->description = $request->input('description');

        if($request->image) {
            $image = $request->image->hashName();
            $request->image->move(public_path('uploads/products'), $image);
            $product->image = $image;
        }

        $product->save();
        return redirect()->route('product.index')->with('success', 'Cập nhập sản phẩm thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->carts()->delete();

        $product->delete();
        return redirect()->route('product.index')->with('message', 'xoa successfully!');
    }
}
