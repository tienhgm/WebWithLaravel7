@extends('layouts.admin')
@section('content')

<div id="content" class="container-fluid">
    <div class="card">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <div class="card-header font-weight-bold d-flex justify-content-between align-items-center">
            <h5 class="m-0 ">Danh sách bài viết</h5>
            <div class="form-search form-inline">
                <form action="#">
                    <input type="" class="form-control form-search" placeholder="Tìm kiếm">
                    <input type="submit" name="btn-search" value="Tìm kiếm" class="btn btn-primary">
                </form>
            </div>
        </div>
        <div class="card-body">
            <div class="analytic">
                <a href="" class="text-primary">Trạng thái 1<span class="text-muted">(10)</span></a>
                <a href="" class="text-primary">Trạng thái 2<span class="text-muted">(5)</span></a>
                <a href="" class="text-primary">Trạng thái 3<span class="text-muted">(20)</span></a>
            </div>
            <div class="form-action form-inline py-3">
                <select class="form-control mr-1" id="">
                    <option>Chọn</option>
                    <option>Tác vụ 1</option>
                    <option>Tác vụ 2</option>
                </select>
                <input type="submit" name="btn-search" value="Áp dụng" class="btn btn-primary">
            </div>
            <table class="table table-striped table-checkall">
                <thead>
                    <tr>
                        <th scope="col">
                            <input name="checkall" type="checkbox">
                        </th>
                        <th scope="col">#</th>
                        <th scope="col">Ảnh</th>
                        <th scope="col">Tiêu đề</th>
                        <th scope="col">Danh mục</th>
                        <th scope="col">Ngày tạo</th>
                        <th scope="col">Trạng thái</th>
                        <th scope="col">Tác vụ</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i=0;
                    @endphp
                    @foreach ($posts as $post)
                    
                    @php
                        $name_cate = App\CategoryPost::find($post->cate_id)->name;
                        $i++;
                    @endphp
                    <tr>
                        <td>
                            <input type="checkbox">
                        </td>
                        <td scope="row">{{$i}}</td>
                        <td>
                            @if ($post->thumbnail != null)
                                <img style="width: 80px; height:80px;" src="{{url('public/uploads/post/'.$post->thumbnail)}}" alt="">
                            @else
                                <img  src="http://via.placeholder.com/80X80" alt="" >
                            @endif
                        </td>
                        <td><a href="">{{$post->title}}</a></td>
                        <td>{{$name_cate}}</td>
                        <td>{{$post->created_at}}</td>
                        <td>
                            @if ($post->status==0)
                                <a href="{{route('set_status',$post->id)}}" class="badge badge-warning" style="cursor: pointer;">Đang chờ duyệt</a>
                            @elseif($post->status==1)
                                <span class="badge badge-success"  style="color:white">Đã công khai</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{route('post.edit', $post->id) }}" class="btn btn-success btn-sm rounded-0 text-white" type="button"
                                data-toggle="tooltip" data-placement="top" title="Edit"><i
                                    class="fa fa-edit"></i></a>
                            <a href="{{route('post.delete',$post->id)}}"
                                class="btn btn-danger btn-sm rounded-0 text-white" type="button"
                                data-toggle="tooltip" data-placement="top" title="Delete"
                                onclick="return confirm('Bạn chắc chắn xóa bản ghi này?!');"><i
                                    class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{-- <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">Trước</span>
                            <span class="sr-only">Sau</span>
                        </a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                            <span class="sr-only">Next</span>
                        </a>
                    </li>
                </ul>
            </nav> --}}
            {{ $posts->links() }}
        </div>
    </div>
</div>
@endsection