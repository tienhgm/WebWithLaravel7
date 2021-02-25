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
                <h5 class="m-0 ">Danh sách đơn hàng</h5>
                <div class="form-search form-inline">
                    <form action="#">
                        <input type="text" name="keyword" value="{{ request()->input('keyword') }}"
                            class="form-control form-search" placeholder="Tìm kiếm">
                        <input type="submit" name="btn-search" value="Tìm kiếm" class="btn btn-primary">
                    </form>
                </div>
            </div>
            <div class="card-body">
                <div class="analytic">
                    <a href="{{ request()->fullUrlWithQuery(['status'=>'process']) }}" class="text-primary">Đang xử lý<span class="text-muted"> ({{ $count[0] }}) </span></a> 
                    <a href="{{ request()->fullUrlWithQuery(['status'=>'success']) }}" class="text-primary"> Đã hoàn thành<span class="text-muted"> ({{ $count[1] }})</span></a>
                    <a href="{{ request()->fullUrlWithQuery(['status'=>'trash']) }}" class="text-primary">Đã hủy<span class="text-muted"> ({{ $count[2] }})</span></a>
                </div>
            <form action="{{ url('admin/order/action') }}" method="">
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
                            <th>
                                <input type="checkbox" name="checkall">
                            </th>
                            <th scope="col">STT</th>
                            <th scope="col">Mã</th>
                            <th scope="col">Khách hàng</th>
                            <th scope="col">Số điện thoại</th>
                            <th scope="col">Giá trị đơn hàng</th>
                            <th scope="col">Trạng thái</th>
                            <th scope="col">Thời gian</th>
                            <th scope="col">Tác vụ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($all_orders->total()>0)
                            
                            @php
                                $t =0;
                            @endphp
                            @foreach ($all_orders as $order)
                                @php
                                    $t++;
                                    $name_user = App\User::find($order->user_id)->name;
                                    $phone_user = App\User::find($order->user_id)->phone;
                                    $address_user = App\User::find($order->user_id)->address;
                                @endphp
                                <tr>
                                    <td>
                                        <input type="checkbox" name="list_check[]" value="{{ $order->id }}">
                                    </td>
                                    <td>{{$t}}</td>
                                    <td>{{$order->id}}</td>
                                    <td>
                                        {{ $name_user}}
                                    </td>
                                    <td>{{$phone_user}}</td>
                                    
                                    <td>{{ number_format($order->order_total, 0, '.', '.') }} đ</td>
                                    <td>
                                    
                                            @if ($order->order_status==0)
                                                <a href="{{ route('set_status_order', $order->id) }}" class="badge badge-warning" style="cursor: pointer;">Đang xử lý</a>
                                            @elseif($order->order_status==1)
                                                <span class="badge badge-success">Đã hoàn thành</span>
                                            @endif
                                        
                                    </td>
                                    <td>{{$order->created_at}}</td>
                                    <td>
                                        <a href="{{ route('order.detail',$order->id) }}" class="btn btn-success btn-sm rounded-0 text-white" type="button"
                                            data-toggle="tooltip" data-placement="top" title="Detail"><i class="fa fa-th-large"></i></a>
                                        @if ($order->deleted_at ==null)
                                            <a href="{{ route('order.delete',$order->id) }}" class="btn btn-danger btn-sm rounded-0 text-white" type="button"
                                                onclick="return confirm('Bạn chắc chắn xóa đơn này?!');" data-toggle="tooltip" data-placement="top" title="Delete"><i
                                                    class="fa fa-trash"></i></a>
                                        @else
                                            <a href="{{ route('order.restore',$order->id) }}" class="btn btn-info btn-sm rounded-0 text-white" type="button"
                                                data-toggle="tooltip" data-placement="top" title="Restore"><i class="fa fa-undo" aria-hidden="true"></i></a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @else
                        <tr>
                            <td colspan="7" class="bg-white" style="font-weight: bold; font-size:17px;">Không có đơn nào </td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </form>
                {{ $all_orders->links() }}
            </div>
        </div>
    </div>
@endsection
