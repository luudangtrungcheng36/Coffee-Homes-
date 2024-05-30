@extends('master.admin')

@section('title', 'Danh mục')

@section('css')

<style>
.custom-width {
    max-width: 150px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.a {
    padding: 0 20px;
}

</style>

@endsection


@section('main')    
{{-- <form action="" method="POST" class="form-inline" role="form">
    @csrf
    <div class="form-group">
        <label class="sr-only" for="">label</label>
        <input type="email" class="form-control" id="" placeholder="Input field">
    </div>
</form>
    viết route POST nhưng dùng thẻ a là sai vì thẻ a gửi đi yêu cầu GET 
<a href="{{route('account.index')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Lọc</a> --}}

<form action="{{ route('account.filter') }}" method="POST" class="form-inline" role="form">
    @csrf <!-- Thêm token CSRF -->
    <div class="form-group mr-auto">
        <label class="sr-only" for="inputField">label</label>
        <select class="form-control a" name="filter" id="filter">
            <option value="asc">Sắp xếp bị khóa</option>
            <option value="desc">Giảm dần</option>
        </select>
        <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Lọc</button>
    </div>
</form>
<table class="table table-hover">
    <thead>
        <tr>
            <th>STT</th>
            <th>Tên khách hàng</th>
            <th>Email</th>
            <th>Số điện thoại</th>
            <th>Địa chỉ</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($accounts as $account)
        <tr>
            <td>{{$loop->index + 1}}</td>
            <td class="custom-width">{{$account->name}}</td>
            <td class="custom-width">{{$account->email}}</td>
            <td class="custom-width">{{$account->phonenumber ?: "Trống"}}</td>
            <td class="custom-width">{{$account->address ?: "Trống"}}</td>
            <td class="text-right">
                {{-- <a href="" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Xóa</a> --}}
                <form action="{{route('account.destroy', $account->id)}}" method="POST" >
                    @csrf @method('DELETE')
                    <a href="{{route('account.edit', $account->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i> @if ($account->role != 2) Khóa @else Mở khóa @endif</a>
                    <button onclick="confirm('Bạn có chắc muốn xóa không ?')" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Xóa</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>


@endsection