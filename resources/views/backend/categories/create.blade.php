@extends('master.admin')

@section('title', 'Danh Mục')

@section('main')    
<div class="container">
    <h2>Nhập Danh Mục</h2>
    <form action="{{route('category.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Tên Danh Mục:</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="des">Mô tả:</label>
            <textarea name="description" cols="30" rows="10" class="description"></textarea>
        </div>
        <button type="submit">Submit</button>
    </form>
</div>

@endsection