@extends('layouts.admin')
@section('content')

<div id="content" class="container-fluid">
    <div class="card">
        <div class="card-header font-weight-bold">
            Sửa sản phẩm
        </div>
        <div class="card-body">
            <form method="POST" action="{{route('product.update',$product->id)}}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="name">Tên sản phẩm</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{$product->name}}">
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="price">Giá</label>
                                    <input class="form-control" type="text" name="price" id="price" value="{{$product->price}}">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="qty">Số lượng</label>
                                    <input class="form-control" type="number" name="quantity" id="qty" value="{{$product->quantity}}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="intro">Mô tả sản phẩm</label>
                            <textarea name="description" class="form-control" id="intro" cols="30" rows="5">{{$product->description}}</textarea>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="detail">Chi tiết sản phẩm</label>
                    <textarea name="content" class="form-control" id="detail" cols="30" rows="5">{{$product->content}}</textarea>
                </div>

                <div class="form-group">
                    <label for="anh">Ảnh sản phẩm</label>
                    <input class="form-control" type="file" name="file" id="anh">
                    <img src="{{url('public/uploads/product/'.$product->photo)}}" height="100" width="100" alt="">
                </div>

                <div class="form-group">
                    <label for="">Danh mục</label>
                    <select class="form-control" id="" name="cate">
                        @foreach ($categories as $category) 
                            <option value="{{$category->id}}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Trạng thái</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="exampleRadios1" value="0" checked>
                        <label class="form-check-label" for="exampleRadios1">
                            Chờ duyệt
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="exampleRadios2" value="1">
                        <label class="form-check-label" for="exampleRadios2">
                            Công khai
                        </label>
                    </div>
                </div>
                
                <button type="submit" class="btn btn-primary">Thêm mới</button>
            </form>
        </div>
    </div>
</div>
@endsection