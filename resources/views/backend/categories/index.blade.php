@extends('master.admin')

@section('title', 'Danh mục')

@section('main')    
<form action="" method="POST" class="form-inline" role="form">

    <div class="form-group">
        <label class="sr-only" for="">label</label>
        <input type="email" class="form-control" id="" placeholder="Input field">
    </div>

    

    <button type="submit" class="btn btn-primary">Submit</button>
    <a href="{{route('category.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Add new</a>
</form>


<table class="table table-hover">
    <thead>
        <tr>
            <th>STT</th>
            <th>Tên Danh Mục</th>
            <th>Trạng thái</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>1</td>
            <td>Trà sữa</td>
            <td>Hidden</td>
            <td class="text-right">
                <a href="" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i> Sửa</a>
                <a href="" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Xóa</a>
            </td>
        </tr>
        <tr>
            <td>1</td>
            <td>Trà sữa</td>
            <td>Hidden</td>
            <td class="text-right">
                <a href="" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i> Sửa</a>
                <a href="" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Xóa</a>
            </td>
        </tr>        <tr>
            <td>1</td>
            <td>Trà sữa</td>
            <td>Hidden</td>
            <td class="text-right">
                <a href="" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i> Sửa</a>
                <a href="" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Xóa</a>
            </td>
        </tr>
    </tbody>
</table>


@endsection