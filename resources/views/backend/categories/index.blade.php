@extends('master.admin')

@section('title', 'Danh mục')

@section('main')    

<table class="table table-hover">
    <thead>
        <tr>
            <th>STT</th>
            <th>Tên Danh Mục</th>
            <th>Mô tả</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($categories as $category)
        <tr>
            <td>{{$loop->index + 1}}</td>
            <td>{{$category->name}}</td>
            <td>{{$category->description}}</td>
            <td class="text-right">
                <a href="{{route('category.edit', $category->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i> Sửa</a>
                <a href="" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Xóa</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>


@endsection