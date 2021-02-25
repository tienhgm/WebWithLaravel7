@extends('pages.products.index')
@section('content_cate')
    @foreach ($products as $product)
    @php
        $name_cate = App\CategoryProduct::find($product->cate_product_id)->name;
    @endphp
        <div class="col-md-3 col-sm-4 shop-grid-item">
            <div class="product-slide-entry shift-image">
                <div class="product-image">
                    <img src="{{ asset('uploads/product/'.$product->photo) }}" alt="" style="height: 280px;">
                    <img src="{{ asset('client/img/product-minimal-11.jpeg') }}" alt="">
                    <div class="bottom-line left-attached">
                        <a href="{{route('cart.add',$product->id)}}" class="bottom-line-a square"><i class="fa fa-shopping-cart"></i></a>
                        <a class="bottom-line-a square"><i class="fa fa-heart"></i></a>
                        <a href="{{ url(Str::slug('product/'.$product->name).'/'.$product->id) }}" class="bottom-line-a square"><i class="fa fa-expand"></i></a>
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
                    <div class="reviews-number">25 reviews</div>
                </div>
                <div class="article-container style-1">
                    <p></p>
                </div>
                <div class="price">
                    {{-- <div class="prev">$199,99</div> --}}
                    <div class="current">{{ number_format($product->price, 0, '.', ',') }} đ</div>
                </div>
                <div class="list-buttons">
                    <a href="{{route('cart.add',$product->id)}}" class="button style-10">Add to cart</a>
                    <a class="button style-11"><i class="fa fa-heart"></i> Add to Wishlist</a>
                </div>
            </div>
            <div class="clear"></div>
        </div>
    @endforeach
@endsection
