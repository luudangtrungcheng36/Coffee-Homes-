@extends('master.admin')

@section('title', 'Sản phẩm')

@section('main')    
<form action="" method="POST" class="form-inline" role="form">

    <div class="form-group">
        <label class="sr-only" for="">label</label>
        <input type="email" class="form-control" id="" placeholder="Input field">
    </div>

    

    <a href="{{route('product.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Add new</a>
</form>


<table class="table table-hover">
    <thead>
        <tr>
            <th>STT</th>
            <th>Tên sản phẩm</th>
            <th>Hình ảnh</th>
            <th>Giá bán</th>
            <th>Mô tả</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
        <tr>
            <td>{{$loop->index + 1}}</td>
            <td>{{$product->name}}</td>
            <td><img src="{{asset('uploads/products/' . $product->image)}}" alt="" class="small-image"></td>
            <td>{{$product->price}}</td>
            <td>lor</td>
            <td class="text-right">
                <form action="{{route('product.destroy', $product->id)}}" method="POST" >
                    @csrf @method('DELETE')
                    <a href="{{route('product.edit', $product->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i> Sửa</a>
                    <button onclick="confirm('Bạn có chắc muốn xóa không ?')" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Xóa</button>
                </form>
            </td>
        </tr>
        @endforeach
        {{-- <tr>
            <td>1</td>
            <td>Trà sữa</td>
            <td>Hidden</td>
            <td>Hidden</td>
            <td>lor</td>
            <td class="text-right">
                <a href="" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i> Sửa</a>
                <a href="" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Xóa</a>
            </td>
        </tr> --}}
    </tbody>
</table>


@endsection