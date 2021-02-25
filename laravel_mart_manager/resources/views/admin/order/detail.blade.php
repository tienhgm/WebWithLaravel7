@extends('layouts.admin')
@section('content')
<div id="content" class="container-fluid">
    <div class="card">
       
        <div class="card-header font-weight-bold">
            <input onclick="history.go(-1);" type="button" value="Back" class="btn btn-danger">
            Chi tiết Order
        </div>
        <div class="card-body">
            <div class="row">
                <span class="col-md-3"><span class="font-weight-bold">Tên khách hàng: </span>{{$info_user->name}}</span> <span class="col-md-4" ><span class="font-weight-bold">Số điện thoại:</span>  +{{$info_user->phone}} </span>
            </div><br>
            <div class="row">
                <span class="col-md-6"><span class="font-weight-bold">Địa chỉ giao hàng: </span>{{$info_user->address}} </span>
            </div><br>
            <div class="row">
                <span class="col-md-6"><span class="font-weight-bold">Ngày đặt: </span> {{$info_user->created_at}} </span>
            </div><br>
            <div class="row">
                <span class="col-md-6"><span class="font-weight-bold">Ngày xác nhận đơn: </span>{{$info_user->updated_at}} </span>
            </div>
            <br><br>

            <table class="table">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Ảnh</th>
                    <th scope="col">Tên sản phẩm</th>
                    <th scope="col">Giá</th>
                    <th scope="col">Số lượng</th>
                    <th scope="col">Thành tiền</th>
                  </tr>
                </thead>
                <tbody>
                    @php
                        $i = 0;
                    @endphp
                    @foreach ($all_orders as $detail)
                    @php
                        $i++;
                    @endphp
                        <tr>
                            <th scope="row">{{$i}}</th>
                            <td ><img src="{{ asset('uploads/product/'.$detail->product_photo) }}" alt="" style="width:80px;height:90px;"></td>
                            <td>{{ $detail->product_name }}</td>
                            <td>{{ number_format($detail->price,'0',',','.') }}đ</td>
                            <td>{{ $detail->quantity }}</td>
                            <td>{{ number_format($detail->price*$detail->quantity,'0',',','.') }}đ</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="row">
                <span class="col-md-2 alert alert-success">Tổng tiền: <span style="font-weight:bold;">{{ number_format($info_user->order_total,'0',',','.') }}đ</span></span>
            </div>
        </div>
    </div>
</div>
@endsection
