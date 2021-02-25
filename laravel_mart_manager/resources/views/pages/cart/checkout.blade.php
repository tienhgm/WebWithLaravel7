@extends('layout')
@section('content')
    <div class="breadcrumb-box">
        <a href="#">Home</a>
        <a href="#">Shop</a>
        <a href="#">Shopping Cart Traditional</a>
    </div>
    <div class="information-blocks">
        <div style="text-align:center;">
            <i class="fa fa-check-circle" aria-hidden="true" style="margin: auto; font-size: 110px;color:#7CFC00;"></i>
            <h1 style="font-size: 18px; font-weight:bold;">Cảm ơn bạn đã mua hàng!</h1><br><br>
            <h1 style="font-weight:bold; font-size:24px;"><a href="{{ url('shop') }}">Tiếp tục mua sắm</a></h1>
        </div>
    </div>
    <br>
    <div class="clear"></div>

@endsection
