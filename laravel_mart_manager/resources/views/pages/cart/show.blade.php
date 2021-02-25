@extends('layout')
@section('content')
    <div class="breadcrumb-box">
        <a href="#">Home</a>
        <a href="#">Shop</a>
        <a href="#">Shopping Cart Traditional</a>
    </div>
    <div class="information-blocks">
        <form action="{{ route('cart.update') }}" method="POST">
            @csrf
            @if (Cart::count() > 0)
                <div class="table-responsive">
                    <table class="cart-table">
                        <tr>
                            <th class="column-1">Tên sản phẩm</th>
                            <th class="column-2">Giá</th>
                            <th class="column-3">Số lượng</th>
                            <th class="column-4">Thành tiền</th>
                            <th class="column-5"></th>
                        </tr>

                        @foreach (Cart::content() as $row)
                            <tr>
                                <td>
                                    <div class="traditional-cart-entry">
                                        <a class="image"><img src="{{ asset('uploads/product/' . $row->options->photo) }}"
                                                alt=""></a>
                                        <div class="content">
                                            <div class="cell-view">

                                                <a href="#" class="title">{{ $row->name }}</a>
                                                {{-- <div class="inline-description">S / Dirty Pink</div> --}}
                                                {{-- <div class="inline-description">Zigzag Clothing</div> --}}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ number_format($row->price, 0, ',', '.') }} đ</td>
                                <td>
                                    <div class="">

                                        <div class="entry number"><input type="number" value="{{ $row->qty }}"  name="qty[{{$row->rowId}}]" min="1"></div>

                                    </div>
                                </td>
                                <td>
                                    <div class="subtotal">{{ number_format($row->total, 0, ',', '.') }}đ</div>
                                </td>
                                <td><a href="{{ route('cart.remove', $row->rowId) }}" class="remove-button"><i
                                            class="fa fa-times"></i></a></td>
                            </tr>
                        @endforeach
                    </table>
                </div>

                <div class="cart-submit-buttons-box">
                    <a href="{{ url('shop') }}" class="button style-15">Tiếp tục mua sắm</a>
                    <a class="button style-15"><input type="submit" name="btn-update">Update</a>
                    <a href="{{ route('cart.destroy') }}" class="button style-15">Xóa toàn bộ </a>
                    {{-- <a href="{{ route('cart.destroy') }}" class="button style-15">Xóa toàn bộ</a> --}}
                </div>
        </form>
                <div class="row">
                    <div class="col-md-4 information-entry">
                        <h3 class="cart-column-title">Get shipping Estimates</h3>
                        <form>
                            <label>Zip Code</label>
                            <input type="text" value="" placeholder="Zip Code" class="simple-field size-1">
                            <div class="button style-16" style="margin-top: 10px;">calculate shipping<input type="submit">
                            </div>
                        </form>
                    </div>
                    <div class="col-md-4 information-entry">
                        <h3 class="cart-column-title">Discount Codes <span class="inline-label red">Promotion</span></h3>
                        <form>
                            <label>Enter your coupon code if you have one.</label>
                            <input type="text" value="" placeholder="" class="simple-field size-1">
                            <div class="button style-16" style="margin-top: 10px;">Apply Coupon<input type="submit"></div>
                        </form>
                    </div>
                    <div class="col-md-4 information-entry">
                        <div class="cart-summary-box">
                            <div style="font-size:18px;">Tổng tiền</div>
                            <div class="grand-total">{{ number_format(Cart::total(), 0, ',', '.') }} đ</div>
                            <a class="button style-10" href="{{route('checkout')}}">Đặt hàng </a>
                            <a class="simple-link" href="#">Checkout with Multiple Addresses</a>
                        </div>
                    </div>
                </div>
            @else
                <div>
                    <h1 style="font-weight:bold; font-size:22px;">Không có sản phẩm nào trong giỏ hàng </h1><br><br>
                    <h1 style="font-weight:bold; font-size:24px;"><a href="{{ url('shop') }}">Tiếp tục mua sắm</a></h1>
                </div>
            @endif
        
    </div>
    <div class="clear"></div>

@endsection
