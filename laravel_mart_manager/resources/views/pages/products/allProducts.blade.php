@extends('pages.products.index')
@section('content_cate')
    @foreach ($products as $product)
        @php
            $name_cate = App\CategoryProduct::find($product->cate_product_id)->name;
        @endphp
        <div class="col-md-3 col-sm-4 shop-grid-item">
            <div class="product-slide-entry shift-image">
                <div class="product-image">
                    <img src="{{ asset('uploads/product/' . $product->photo) }}" alt="" style="height: 280px;">
                    {{-- <img src="{{ asset('client/img/product-minimal-12.jpeg') }}"
                        alt=""> --}}

                    <div class="bottom-line">
                        <div class="right-align">
                            <a class="bottom-line-a square"><i class="fa fa-heart"></i></a>
                            <a href="{{ url('product/'.Str::slug($product->name).'/'.$product->id) }}" class="bottom-line-a square"><i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                        </div>
                        <div class="left-align">
                            <a href="{{route('cart.add',$product->id)}}" class="bottom-line-a"><i class="fa fa-shopping-cart"></i> Add to
                                cart</a>
                        </div>
                    </div>
                </div>
                <a class="tag" href="#">{{ $name_cate }}</a>
                <a class="title" href="{{ url('product/'.Str::slug($product->name).'/'.$product->id) }}">{{ $product->name }}</a>
                <div class="rating-box">
                    <div class="star"><i class="fa fa-star"></i></div>
                    <div class="star"><i class="fa fa-star"></i></div>
                    <div class="star"><i class="fa fa-star"></i></div>
                    <div class="star"><i class="fa fa-star"></i></div>
                    <div class="star"><i class="fa fa-star"></i></div>
                </div>
                <div class="price">
                    {{-- <div class="prev">$199,99</div> --}}
                    <div class="current">{{ number_format($product->price, 0, '.', ',') }} đ</div>
                </div>
            </div>
            <div class="clear"></div>
        </div>
    @endforeach

@endsection
