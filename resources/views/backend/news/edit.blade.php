@extends('master.admin')

@section('title', 'Sản phẩm')

@section('main')    
<div class="container">
    <h2>Nhập Tin Tức </h2>
    <form action="{{route('new.update', $newdetail->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Tiêu đề tin tức:</label>
            <input type="text" id="name" name="name" value="{{$newdetail->name}}" required>
        </div>
        <div class="form-group">
            <label for="des">Mô tả ngắn gọn</label>
            <textarea name="des" cols="30" rows="10" class="des" required>{{$newdetail->description}}</textarea>
        </div>
        <div class="form-group">
            <label for="image">Ảnh minh họa</label>
            <input type="file" id="image" name="image" onchange="showImage(this)">
            <img src="{{asset('uploads/news/' . $newdetail->image)}}" id="img_show" alt="" style="width: 150px">
        </div>
        <div class="form-group">
            <label for="content-new">Nội dung chi tiết:</label>
            <textarea name="content-new" cols="30" rows="10" class="content-new">{!! $newdetail->content !!}</textarea>
        </div>
        <button type="submit">Cập nhập</button>
    </form>
</div>

@endsection

@section('css')
<link rel="stylesheet" href="/ad_assets/summernote/summernote.min.css">

@endsection

@section('js')
<script src="/ad_assets/summernote/summernote.min.js"></script>
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