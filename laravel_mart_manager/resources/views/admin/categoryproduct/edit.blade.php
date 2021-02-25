@extends('layouts.admin')
@section('content')
    
<div id="content" class="container-fluid">
    <div class="card">
        <div class="card-header font-weight-bold">
            Sửa danh mục sản phẩm
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('cate_product.update',$cate_product->id) }}">
                @csrf
                <div class="form-group">
                    <label for="name">Họ và tên</label>
                    <input class="form-control" type="text" name="name" id="name" value="{{$cate_product->name}}">
                    @error('name')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <button type="submit" name="btn-update" class="btn btn-primary" value="Thêm mới">Cập nhật</button>
            </form>
        </div>
    </div>
</div>
@endsection