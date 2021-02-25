@extends('layout')
@section('content')

    <div class="parallax-slide fullwidth-block small-slide" style="margin-bottom: 30px; margin-top: -25px;">
        <div class="swiper-container" data-autoplay="5000" data-loop="1" data-speed="500" data-center="0"
            data-slides-per-view="1">
            <div class="swiper-wrapper">
                <div class="swiper-slide active" data-val="0"
                    style="background-image: url({{ asset('client/img/parallax-3.jpeg') }});">
                    <div class="parallax-vertical-align" style="margin-top: 0;">
                        <div class="parallax-article">
                            <h2 class="subtitle">Check out this weekend</h2>
                            <h1 class="title">Big sale</h1>
                            <div class="description">Lorem ipsum dolor sit amet, consectetur adipisicing
                                elit, sed do eiusmod tempor incididunt ut labore et dolore.</div>
                            <div class="info">
                                <a href="#" class="button style-8">shop now</a>
                                <a href="#" class="button style-8">features</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide no-shadow" data-val="1"
                    style="background-image: url({{ asset('client/img/fullwidth-2.jpeg') }});">
                    <div class="parallax-vertical-align" style="margin-top: 0;">
                        <div class="parallax-article left-align">
                            <h2 class="subtitle">Check out this weekend</h2>
                            <h1 class="title">Big sale</h1>
                            <div class="description">Lorem ipsum dolor sit amet, consectetur adipisicing
                                elit, sed do eiusmod tempor incididunt ut labore et dolore.</div>
                            <div class="info">
                                <a href="#" class="button style-8">shop now</a>
                                <a href="#" class="button style-8">features</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pagination"></div>
        </div>
    </div>

    <div class="information-blocks">
        <div class="row">
            <div class="col-sm-4 information-entry">
                <div class="special-item-entry">
                    <img src="{{ asset('client/img/special-item-1.jpeg') }}" alt="">
                    <h3 class="title">Check out this weekend <span>Jackets</span></h3>
                    <a class="button style-6" href="#">shop now</a>
                </div>
            </div>
            <div class="col-sm-4 information-entry">
                <div class="special-item-entry">
                    <img src="{{ asset('client/img/special-item-2.jpeg') }}" alt="">
                    <h3 class="title">Check out this weekend <span>Jackets</span></h3>
                    <a class="button style-6" href="#">shop now</a>
                </div>
            </div>
            <div class="col-sm-4 information-entry">
                <div class="special-item-entry">
                    <img src="{{ asset('client/img/special-item-3.jpeg') }}" alt="">
                    <h3 class="title">Check out this weekend <span>Jackets</span></h3>
                    <a class="button style-6" href="#">shop now</a>
                </div>
            </div>
        </div>
    </div>

    <div class="information-blocks">
        <div class="tabs-container">
            <div class="swiper-tabs tabs-switch">
                <div class="title">Products</div>
                <div class="list">
                    <a class="block-title tab-switcher active">Featured Products</a>
                    {{-- <a class="block-title tab-switcher">Popular Products</a>
                <a class="block-title tab-switcher">New Arrivals</a> --}}
                    <div class="clear"></div>
                </div>
            </div>
            <div>
                <div class="tabs-entry">
                    <div class="products-swiper">
                        <div class="swiper-container" data-autoplay="0" data-loop="0" data-speed="500" data-center="0"
                            data-slides-per-view="responsive" data-xs-slides="2" data-int-slides="2" data-sm-slides="3"
                            data-md-slides="4" data-lg-slides="5" data-add-slides="5">
                            <div class="swiper-wrapper">
                                @foreach ($products as $product)
                                    @php
                                        $name_cate = App\CategoryProduct::find($product->cate_product_id)->name;
                                    @endphp
                                    <div class="swiper-slide">
                                        <div class="paddings-container">
                                            <div class="product-slide-entry shift-image">
                                                <div class="product-image">
                                                    <img src="{{ asset('uploads/product/' . $product->photo) }}" alt=""
                                                        style="height: 280px;">
                                                    {{-- <img src="{{ asset('client/img/product-minimal-12.jpeg') }}"
                                                    alt=""> --}}

                                                    <div class="bottom-line">
                                                        <div class="right-align">
                                                            <a class="bottom-line-a square"><i class="fa fa-heart"></i></a>
                                                            <a href="{{ url('product/'.Str::slug($product->name).'/'.$product->id) }}" class="bottom-line-a square"><i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                                                        </div>
                                                        <div class="left-align">
                                                            <a href="{{route('cart.add',$product->id)}}" class="bottom-line-a"><i class="fa fa-shopping-cart"></i> Add
                                                                to
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
                                                    <div class="current">{{ number_format($product->price, 0, '.', ',') }}
                                                        đ</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="pagination"></div>
                        </div>
                    </div>
                </div>
                {{-- popular products --}}
                {{-- <div class="tabs-entry">
                <div class="products-swiper">
                    <div class="swiper-container" data-autoplay="0" data-loop="0" data-speed="500"
                        data-center="0" data-slides-per-view="responsive" data-xs-slides="2"
                        data-int-slides="2" data-sm-slides="3" data-md-slides="4" data-lg-slides="5"
                        data-add-slides="5">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="paddings-container">
                                    <div class="product-slide-entry shift-image">
                                        <div class="product-image">
                                            <img src="{{ asset('client/img/product-minimal-7.jpeg') }}"
                                                alt="">
                                            <img src="{{ asset('client/img/product-minimal-11.jpeg') }}"
                                                alt="">
                                            <a class="top-line-a right open-product"><i
                                                    class="fa fa-expand"></i> <span>Quick
                                                    View</span></a>
                                            <div class="bottom-line">
                                                <div class="right-align">
                                                    <a class="bottom-line-a square"><i
                                                            class="fa fa-retweet"></i></a>
                                                    <a class="bottom-line-a square"><i
                                                            class="fa fa-heart"></i></a>
                                                </div>
                                                <div class="left-align">
                                                    <a class="bottom-line-a"><i
                                                            class="fa fa-shopping-cart"></i> Add to
                                                        cart</a>
                                                </div>
                                            </div>
                                        </div>
                                        <a class="tag" href="#">Men clothing</a>
                                        <a class="title" href="#">Blue Pullover Batwing Sleeve
                                            Zigzag</a>
                                        <div class="rating-box">
                                            <div class="star"><i class="fa fa-star"></i></div>
                                            <div class="star"><i class="fa fa-star"></i></div>
                                            <div class="star"><i class="fa fa-star"></i></div>
                                            <div class="star"><i class="fa fa-star"></i></div>
                                            <div class="star"><i class="fa fa-star"></i></div>
                                        </div>
                                        <div class="price">
                                            <div class="prev">$199,99</div>
                                            <div class="current">$119,99</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="pagination"></div>
                    </div>
                </div>
            </div> --}}
                {{-- new arrivals --}}
                {{-- <div class="tabs-entry">
                <div class="products-swiper">
                    <div class="swiper-container" data-autoplay="0" data-loop="0" data-speed="500"
                        data-center="0" data-slides-per-view="responsive" data-xs-slides="2"
                        data-int-slides="2" data-sm-slides="3" data-md-slides="4" data-lg-slides="5"
                        data-add-slides="5">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="paddings-container">
                                    <div class="product-slide-entry shift-image">
                                        <div class="product-image">
                                            <img src="{{ asset('client/img/product-minimal-3.jpeg') }}"
                                                alt="">
                                            <img src="{{ asset('client/img/product-minimal-11.jpeg') }}"
                                                alt="">
                                            <a class="top-line-a right open-product"><i
                                                    class="fa fa-expand"></i> <span>Quick
                                                    View</span></a>
                                            <div class="bottom-line">
                                                <div class="right-align">
                                                    <a class="bottom-line-a square"><i
                                                            class="fa fa-retweet"></i></a>
                                                    <a class="bottom-line-a square"><i
                                                            class="fa fa-heart"></i></a>
                                                </div>
                                                <div class="left-align">
                                                    <a class="bottom-line-a"><i
                                                            class="fa fa-shopping-cart"></i> Add to
                                                        cart</a>
                                                </div>
                                            </div>
                                        </div>
                                        <a class="tag" href="#">Men clothing</a>
                                        <a class="title" href="#">Blue Pullover Batwing Sleeve
                                            Zigzag</a>
                                        <div class="rating-box">
                                            <div class="star"><i class="fa fa-star"></i></div>
                                            <div class="star"><i class="fa fa-star"></i></div>
                                            <div class="star"><i class="fa fa-star"></i></div>
                                            <div class="star"><i class="fa fa-star"></i></div>
                                            <div class="star"><i class="fa fa-star"></i></div>
                                        </div>
                                        <div class="price">
                                            <div class="prev">$199,99</div>
                                            <div class="current">$119,99</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="pagination"></div>
                    </div>
                </div>
            </div> --}}
            </div>
        </div>
    </div>
    {{-- banner big img --}}
    <div class="parallax-slide auto-slide fullwidth-block">
        <div class="parallax-clip">
            <div style="background-image: url({{ asset('client/img/fullwidth-1.jpeg') }});"
                class="fixed-parallax parallax-fullwidth">

            </div>
        </div>
        <div class="position-center">

            <div class="parallax-article">
                <h2 class="subtitle">Check out this weekend</h2>
                <h1 class="title">BEST SELLING PRODUCTS</h1>
                <div class="description">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                    eiusmod tempor incididunt ut labore et dolore.</div>
                <div class="info">
                    <a href="#" class="button style-6">shop now</a>
                    <a href="#" class="button style-19">features</a>
                </div>
            </div>

        </div>
    </div>
    <br>
    {{-- end of blog --}}
    <div class="information-blocks">
        <div class="latest-entries-heading">
            <h3 class="title">Blog</h3>
            <a class="latest-more">Show more posts <i class="fa fa-angle-right"></i><i class="fa fa-angle-right"></i></a>
        </div>
        <div class="products-swiper">
            <div class="swiper-container" data-autoplay="0" data-loop="0" data-speed="500" data-center="0"
                data-slides-per-view="responsive" data-xs-slides="2" data-int-slides="2" data-sm-slides="3"
                data-md-slides="4" data-lg-slides="4" data-add-slides="4">
                <div class="swiper-wrapper">
                    @foreach ($posts as $post)

                        <div class="swiper-slide">
                            <div class="paddings-container">
                                <div class="product-slide-entry" style="max-width: 310px;">
                                    <a class="product-image hover-class-1" href="#">
                                        <img src="{{ asset('uploads/post/' . $post->thumbnail) }}" alt="">
                                        <span class="hover-label">Read More</span>
                                    </a>
                                    <a class="subtitle" href="#">{{ $post->title }}</a>
                                    <div class="date">Posted {{ $post->created_at }}</div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="pagination"></div>
            </div>
        </div>
    </div>
    <div class="clear"></div>
    <div id="product-popup" class="overlay-popup">
        <div class="overflow">
            <div class="table-view">
                <div class="cell-view">
                    <div class="close-layer"></div>
                    <div class="popup-container">

                        <div class="row">
                            <div class="col-sm-6 information-entry">
                                <div class="product-preview-box">
                                    <div class="swiper-container product-preview-swiper" data-autoplay="0" data-loop="1"
                                        data-speed="500" data-center="0" data-slides-per-view="1">
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide">
                                                <div class="product-zoom-image">
                                                    <img src="{{ asset('client/img/product-main-1.jpeg') }}" alt=""
                                                        data-zoom="img/product-main-1-zoom.jpg">
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="product-zoom-image">
                                                    <img src="{{ asset('client/img/product-main-2.jpeg') }}" alt=""
                                                        data-zoom="img/product-main-2-zoom.jpg">
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="product-zoom-image">
                                                    <img src="{{ asset('client/img/product-main-3.jpeg') }}" alt=""
                                                        data-zoom="img/product-main-3-zoom.jpg">
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="product-zoom-image">
                                                    <img src="{{ asset('client/img/product-main-4.jpeg') }}" alt=""
                                                        data-zoom="img/product-main-4-zoom.jpg">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="pagination"></div>
                                        <div class="product-zoom-container">
                                            <div class="move-box">
                                                <img class="default-image" src="img\product-main-1.jpeg" alt="">
                                                <img class="zoomed-image" src="img\product-main-1-zoom.jpeg" alt="">
                                            </div>
                                            <div class="zoom-area"></div>
                                        </div>
                                    </div>
                                    <div class="swiper-hidden-edges">
                                        <div class="swiper-container product-thumbnails-swiper" data-autoplay="0"
                                            data-loop="0" data-speed="500" data-center="0" data-slides-per-view="responsive"
                                            data-xs-slides="3" data-int-slides="3" data-sm-slides="3" data-md-slides="4"
                                            data-lg-slides="4" data-add-slides="4">
                                            <div class="swiper-wrapper">
                                                <div class="swiper-slide selected">
                                                    <div class="paddings-container">
                                                        <img src="{{ asset('client/img/product-main-1.jpeg') }}" alt="">
                                                    </div>
                                                </div>
                                                <div class="swiper-slide">
                                                    <div class="paddings-container">
                                                        <img src="{{ asset('client/img/product-main-2.jpeg') }}" alt="">
                                                    </div>
                                                </div>
                                                <div class="swiper-slide">
                                                    <div class="paddings-container">
                                                        <img src="{{ asset('client/img/product-main-3.jpeg') }}" alt="">
                                                    </div>
                                                </div>
                                                <div class="swiper-slide">
                                                    <div class="paddings-container">
                                                        <img src="{{ asset('client/img/product-main-4.jpeg') }}" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="pagination"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 information-entry">
                                <div class="product-detail-box">
                                    <h1 class="product-title">T-shirt Basic Stampata</h1>
                                    <h3 class="product-subtitle">Loremous Clothing</h3>
                                    <div class="rating-box">
                                        <div class="star"><i class="fa fa-star"></i></div>
                                        <div class="star"><i class="fa fa-star"></i></div>
                                        <div class="star"><i class="fa fa-star"></i></div>
                                        <div class="star"><i class="fa fa-star-o"></i></div>
                                        <div class="star"><i class="fa fa-star-o"></i></div>
                                        <div class="rating-number">25 Reviews</div>
                                    </div>
                                    <div class="product-description detail-info-entry">Lorem ipsum dolor sit amet,
                                        consectetur adipiscing elit, eiusmod tempor incididunt ut labore et dolore magna
                                        aliqua. Lorem ipsum dolor sit amet, consectetur.</div>
                                    <div class="price detail-info-entry">
                                        <div class="prev">$90,00</div>
                                        <div class="current">$70,00</div>
                                    </div>
                                    <div class="size-selector detail-info-entry">
                                        <div class="detail-info-entry-title">Size</div>
                                        <div class="entry active">xs</div>
                                        <div class="entry">s</div>
                                        <div class="entry">m</div>
                                        <div class="entry">l</div>
                                        <div class="entry">xl</div>
                                        <div class="spacer"></div>
                                    </div>
                                    <div class="color-selector detail-info-entry">
                                        <div class="detail-info-entry-title">Color</div>
                                        <div class="entry active" style="background-color: #d23118;">&nbsp;</div>
                                        <div class="entry" style="background-color: #2a84c9;">&nbsp;</div>
                                        <div class="entry" style="background-color: #000;">&nbsp;</div>
                                        <div class="entry" style="background-color: #d1d1d1;">&nbsp;</div>
                                        <div class="spacer"></div>
                                    </div>
                                    <div class="quantity-selector detail-info-entry">
                                        <div class="detail-info-entry-title">Quantity</div>
                                        <div class="entry number-minus">&nbsp;</div>
                                        <div class="entry number">10</div>
                                        <div class="entry number-plus">&nbsp;</div>
                                    </div>
                                    <div class="detail-info-entry">
                                        <a class="button style-10">Add to cart</a>
                                        <a class="button style-11"><i class="fa fa-heart"></i> Add to Wishlist</a>
                                        <div class="clear"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="close-popup"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
