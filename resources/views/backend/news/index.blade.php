@extends('master.admin')

@section('title', 'Tin tức')

@section('css')

<style>

.img-custom {
    object-fit: cover;
    width: 80px;
    height: 50px;
}

</style>

@endsection

@section('main')    




<table class="table table-hover">
    <thead>
        <tr>
            <th>STT</th>
            <th>Tiêu đề</th>
            <th>Ảnh minh họa</th>
            <th>Mô tả</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($news as $new)
        <tr>
            <td>{{$loop->index + 1}}</td>
            <td>{{$new->name}}</td>
            <td><img src="{{asset('uploads/news/' . $new->image)}}" alt="" class="img-custom"></td>
            <td>{{$new->description}}</td>
            <td><a href="{{route('new.edit', $new->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i> Chi tiết</a></td>
        </tr>
        @endforeach
    </tbody>
</table>


@endsection