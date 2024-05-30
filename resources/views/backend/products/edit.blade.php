@extends('master.admin')

@section('title', 'Sửa Sản phẩm')

@section('main')    
<div class="container">
    <h2>Sửa Sản Phẩm</h2>
    <form action="{{route('product.update', $product->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Tên Sản Phẩm:</label>
            <input type="text" id="name" name="name" value="{{$product->name}}" required>
        </div>
        <div class="form-group">
            <label for="category">Danh Mục:</label>
            <select id="category" name="category">
            @foreach ($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="price">Giá:</label>
            <input type="number" id="price" name="price" value="{{$product->price}}" required>
        </div>
        <div class="form-group">
            <label for="sale_price">Giá Khuyến Mãi:</label>
            <input type="number" id="sale_price" name="sale_price" value="{{$product->sale_price}}">
        </div>
        <div class="form-group hot-Product">
            <label for="hot_product" class="checkbox-label">Sản Phẩm Hot:</label>
            <input type="checkbox" id="hot_product" name="hot_product" @if($product->hot_product == 1) checked @endif>
        </div>
        <div class="form-group">
            <label for="status">Trạng Thái Sản Phẩm:</label>
            <select id="status" name="status">
                <option value="0" @if ($product->status == 0) selected @endif>Có Sẵn</option>
                <option value="1" @if ($product->status == 1) selected @endif>Hết Hàng</option>
            </select>
        </div>
        <div class="form-group">
            <label for="image">Chọn Ảnh:</label>
            <input type="file" id="image" name="image" onchange="showImage(this)">
            <img src="{{asset('uploads/products/' . $product->image)}}" id="img_show" alt="" style="width: 150px">
        </div>
        <div class="form-group">
            <label for="des">Mô tả:</label>
            <textarea name="description" cols="30" rows="10" class="description">{!! $product->description !!}</textarea>
        </div>
        <button type="submit">Submit</button>
    </form> 
</div>

@endsection

@section('css')
<link rel="stylesheet" href="/ad_assets/summernote/summernote.min.css">

@endsection

@section('js')
<script src="/ad_assets/summernote/summernote.min.js"></script>
<script>
    $('.description').summernote({
        height: 250
    });

    function showImage(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#img_show')
                        .attr('src', e.target.result)
                        .width(150);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
</script>
@endsection