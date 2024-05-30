@extends('master.admin')

@section('title', 'Sửa Danh Mục')

@section('main')    
<div class="container">
    <h2>Nhập Danh Mục</h2>
    <form action="{{route('category.update', $category->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Tên Danh Mục:</label>
            <input type="text" id="name" name="name" value="{{$category->name}}" required>
        </div>
        <div class="form-group">
            <label for="des">Mô tả:</label>
            <textarea name="description" cols="30" rows="10" class="description">{{$category->description}}</textarea>
        </div>
        <button type="submit">Submit</button>
    </form>
</div>

@endsection