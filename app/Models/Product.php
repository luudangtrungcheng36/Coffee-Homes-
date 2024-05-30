<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
class Product extends Model
{
    use HasFactory;

    //từ bảng sản phẩm lấy ra tên danh mục (join bảng)
    public function category() {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function carts() {
        return $this->hasMany(Cart::class, 'product_id', 'id');
    }
}
