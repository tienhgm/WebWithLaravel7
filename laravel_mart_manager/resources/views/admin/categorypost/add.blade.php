@extends('layouts.admin')
@section('content')
    
<div id="content" class="container-fluid">
    <div class="card">
        <div class="card-header font-weight-bold">
            Thêm danh mục bài viết
        </div>
        <div class="card-body">
            <form method="POST" action="{{url('admin/post/category/store')}}">
                @csrf
                <div class="form-group">
                    <label for="name">Tên danh mục</label>
                    <input class="form-control" type="text" name="name" id="name">
                    @error('name')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Thêm mới</button>
            </form>
        </div>
    </div>
</div>
@endsection