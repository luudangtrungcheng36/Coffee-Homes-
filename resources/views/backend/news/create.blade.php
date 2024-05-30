@extends('master.admin')

@section('title', 'Sản phẩm')

@section('main')    
<div class="container">
    <h2>Nhập Tin Tức </h2>
    <form action="{{route('new.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Tiêu đề tin tức:</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="des">Mô tả ngắn gọn</label>
            <textarea name="des" cols="30" rows="10" class="des" required></textarea>
        </div>
        <div class="form-group">
            <label for="image">Ảnh minh họa</label>
            <input type="file" id="image" name="image" onchange="showImage(this)">
            <img src="#" id="img_show" alt="">
        </div>
        <div class="form-group">
            <label for="content-new">Nội dung chi tiết:</label>
            <textarea name="content-new" cols="30" rows="10" class="content-new"></textarea>
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
    $('.content-new').summernote({
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