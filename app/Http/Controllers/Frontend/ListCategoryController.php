<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class ListCategoryController extends Controller
{
    public function show() {
        $categories = Category::all();
        
    }
}
