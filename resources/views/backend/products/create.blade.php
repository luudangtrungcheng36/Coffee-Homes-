@extends('master.admin')

@section('title', 'Sản phẩm')

@section('main')    
<div class="container">
    <h2>Nhập Sản Phẩm</h2>
    <form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Tên Sản Phẩm:</label>
            <input type="text" id="name" name="name" required>
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
            <input type="number" id="price" name="price" required>
        </div>
        <div class="form-group">
            <label for="salePrice">Giá Khuyến Mãi:</label>
            <input type="number" id="salePrice" name="salePrice">
        </div>
        <div class="form-group hot-Product">
            <label for="hotProduct" class="checkbox-label">Sản Phẩm Hot:</label>
            <input type="checkbox" id="hotProduct" name="hotProduct">
        </div>
        <div class="form-group">
            <label for="status">Trạng Thái Sản Phẩm:</label>
            <select id="status" name="status">
                <option value="available">Có Sẵn</option>
                <option value="outOfStock">Hết Hàng</option>
            </select>
        </div>
        <div class="form-group">
            <label for="image">Chọn Ảnh:</label>
            <input type="file" id="image" name="image" onchange="showImage(this)">
            <img src="#" id="img_show" alt="">
        </div>
        <div class="form-group">
            <label for="des">Mô tả:</label>
            <textarea name="description" cols="30" rows="10" class="description"></textarea>
        </div>
        <button type="submit">Submit</button>
    </form>
</div>

@endsection

@section('css')
<link rel="stylesheet" href="../ad_assets/summernote/summernote.min.css">

@endsection

@section('js')
<script src="../ad_assets/summernote/summernote.min.js"></script>
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