@extends('layouts.admin')
@section('content')
    
<div id="content" class="container-fluid">
    <div class="card">
        <div class="card-header font-weight-bold">
            Thêm bài viết
        </div>
        <div class="card-body"> 
            <form method="POST" action="{{ route('post.update',$post->id) }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">Tiêu đề bài viết</label>
                    <input class="form-control" type="text" name="title" id="title" value="{{$post->title}}">
                </div>
                <div class="form-group">
                    <label for="content">Nội dung bài viết</label>
                    <textarea name="content"  class="form-control" id="content" cols="30" rows="5">{{$post->content}}</textarea>
                </div>
                <div class="form-group">
                    <label for="anh">Ảnh</label>
                    <input class="form-control" type="file" name="file" id="anh">
                    <img src="{{url('public/uploads/post/'.$post->thumbnail)}}" height="100" width="100" alt="">
                </div>

                <div class="form-group">
                    <label for="">Danh mục bài viết</label>
                    <select class="form-control" id="" name="cate">
                        
                        @foreach ($categories as $category) 
                            <option value="{{$category->id}}">{{ $category->name }}</option>
                        @endforeach
                      
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Trạng thái</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="0" checked>
                        <label class="form-check-label" for="exampleRadios1">
                          Chờ duyệt
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="1">
                        <label class="form-check-label" for="exampleRadios2">
                          Công khai
                        </label>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Cập nhật</button>
            </form>
        </div>
    </div>
</div>
@endsection