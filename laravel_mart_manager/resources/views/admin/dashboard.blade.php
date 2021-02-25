@extends('layouts.admin')
@section('content')
    
<div class="container-fluid py-5">
    <div class="row">
        <div class="col">
            <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                <div class="card-header">ĐƠN HÀNG THÀNH CÔNG</div>
                <div class="card-body">
                    <h5 class="card-title">{{$success_orders}}</h5>
                    <p class="card-text">Đơn hàng giao dịch thành công</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                <div class="card-header">ĐANG XỬ LÝ</div>
                <div class="card-body">
                    <h5 class="card-title">{{$processing_orders}}</h5>
                    <p class="card-text">Số lượng đơn hàng đang xử lý</p>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                <div class="card-header">DOANH SỐ</div>
                <div class="card-body">
                    <h5 class="card-title">{{ number_format($total_price,'0',',','.') }} đ</h5>
                    <p class="card-text">Doanh số hệ thống</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
                <div class="card-header">ĐƠN HÀNG HỦY</div>
                <div class="card-body">
                    <h5 class="card-title">{{$unset_orders}}</h5>
                    <p class="card-text">Số đơn bị hủy trong hệ thống</p>
                </div>
            </div>
        </div>
    </div>
    <!-- end analytic  -->
    <div class="card">
        <div class="card-header font-weight-bold">
            ĐƠN HÀNG MỚI
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                       
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
                    @php
                    $t =0;
                @endphp
                @foreach ($new_orders as $order)
                @php
                    $t++;
                    $name_user = App\User::find($order->user_id)->name;
                    $phone_user = App\User::find($order->user_id)->phone;
                    $address_user = App\User::find($order->user_id)->address;
                @endphp
                    <tr>
                       
                        <td>{{$t}}</td>
                        <td>{{$order->id}}</td>
                        <td>
                            {{$name_user}}
                        </td>
                        <td>+{{$phone_user}}</td>
                        
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
                            <a href="{{ route('order.delete',$order->id) }}" class="btn btn-danger btn-sm rounded-0 text-white" type="button"
                                onclick="return confirm('Bạn chắc chắn xóa đơn này?!');" data-toggle="tooltip" data-placement="top" title="Delete"><i
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
            
        </div>
    </div>

</div>
@endsection