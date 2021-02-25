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
                <h5 class="m-0 ">Danh sách sản phẩm</h5>
                <div class="form-search form-inline">
                    <form action="#">
                        <input type="" class="form-control form-search" placeholder="Tìm kiếm">
                        <input type="submit" name="btn-search" value="Tìm kiếm" class="btn btn-primary">
                    </form>
                </div>
            </div>
            <div class="card-body">
                <div class="analytic">
                    <a href="{{ request()->fullUrlWithQuery(['status'=>'process']) }}" class="text-primary">Chờ duyệt<span class="text-muted">({{$count[0]}})</span></a>
                    <a href="{{ request()->fullUrlWithQuery(['status'=>'public']) }}" class="text-primary">Công khai<span class="text-muted">({{$count[1]}})</span></a>
                    <a href="{{ request()->fullUrlWithQuery(['status'=>'trash']) }}" class="text-primary">Đã xóa<span class="text-muted">({{$count[2]}})</span></a>
                </div>
            <form action="{{ url('admin/product/action') }}" method="">    
                <div class="form-action form-inline py-3">
                    <select class="form-control mr-1" id="" name="act">
                        @foreach ($list_act as $k => $act)
                            <option value="{{$k}}">{{$act}}</option>
                        @endforeach
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
                            <th scope="col">Tên sản phẩm</th>
                            <th scope="col">Giá</th>
                            <th scope="col">Thương hiệu</th>
                            <th scope="col">Ngày tạo</th>
                            <th scope="col">Trạng thái</th>
                            <th scope="col">Tác vụ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 0;
                            
                        @endphp
                        @foreach ($products as $product)
                            @php
                                $i++;
                                $name_cate = App\CategoryProduct::find($product->cate_product_id)->name;
                            @endphp
                            <tr class="">
                                <td>
                                    <input type="checkbox" name="list_check[]" value="{{$product->id}}">
                                </td>
                                <td>{{ $i }}</td>
                                <td>
                                    @if ($product->photo != null)
                                        <img src="{{ url('public/uploads/product/' . $product->photo) }}" alt="" width="80" height="80">
                                    @else
                                        <img src="http://via.placeholder.com/80X80" alt="">
                                    @endif
                                </td>
                                <td><a href="#">{{ $product->name }}</a></td>
                                <td>{{ number_format($product->price, 0, ',', '.') }} đ</td>
                                <td>{{ $name_cate }}</td>
                                <td>{{ $product->created_at }}</td>

                                <td>
                                    @if ($product->status == 0)
                                        <a href="{{ route('set_status_product', $product->id) }}" class="badge badge-warning"
                                            style="cursor: pointer;">Đang chờ duyệt</a>
                                    @elseif($product->status==1)
                                        <span class="badge badge-success" style="color:white">Đã công khai</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('product.edit',$product->id)}}" class="btn btn-success btn-sm rounded-0 text-white" type="button"
                                        data-toggle="tooltip" data-placement="top" title="Edit"><i
                                            class="fa fa-edit"></i></a>
                                    <a href="{{route('product.delete',$product->id)}}" class="btn btn-danger btn-sm rounded-0 text-white" type="button"
                                        onclick="return confirm('Bạn chắc chắn xóa sản phẩm này?!');" data-toggle="tooltip" data-placement="top" title="Delete"><i
                                            class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </form>
                {{ $products->links() }}
            </div>
        </div>
    </div>
@endsection
