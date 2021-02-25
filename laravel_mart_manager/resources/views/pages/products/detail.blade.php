@extends('layout')
@section('content')
    <div class="breadcrumb-box">
        <a href="#">Home</a>
        <a href="#">Shop</a>
        <a href="#">T-shirts</a>
        <a href="#">Careers</a>
        <a href="#">T-shirt Stampata</a>
    </div>
    @php
        $name_cate = App\CategoryProduct::find($product->cate_product_id)->name;
    @endphp
    <div class="information-blocks">
        <div class="row">
            <div class="col-sm-5 col-md-4 col-lg-5 information-entry">
                <div class="product-preview-box">
                    <div class="swiper-container product-preview-swiper" data-autoplay="0" data-loop="1" data-speed="500"
                        data-center="0" data-slides-per-view="1">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="product-zoom-image">
                                    {{-- đổi sang big img --}}
                                    <img style="height: 650px;" src="{{asset('uploads/product/'.$product->photo)}}" alt="" data-zoom="{{asset('uploads/product/'.$product->photo)}}">
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="product-zoom-image">
                                    <img src="img\product-main-2.jpeg" alt="" data-zoom="img/product-main-2-zoom.jpg">
                                </div>
                            </div>
                           
                        </div>
                        <div class="pagination"></div>
                        <div class="product-zoom-container">
                            <div class="move-box">
                                <img class="default-image" src="{{asset('uploads/product/'.$product->photo)}}" alt="">
                                <img class="zoomed-image" src="img\product-main-1-zoom.jpeg" alt="">
                            </div>
                            <div class="zoom-area"></div>
                        </div>
                    </div>
                    <div class="swiper-hidden-edges">
                        <div class="swiper-container product-thumbnails-swiper" data-autoplay="0" data-loop="0"
                            data-speed="500" data-center="0" data-slides-per-view="responsive" data-xs-slides="3"
                            data-int-slides="3" data-sm-slides="3" data-md-slides="4" data-lg-slides="4"
                            data-add-slides="4">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide selected">
                                    <div class="paddings-container">
                                        <img src="{{asset('uploads/product/'.$product->photo)}}" alt="">
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="paddings-container">
                                        <img src="img\product-main-2.jpeg" alt="">
                                    </div>
                                </div>
                               
                            </div>
                            <div class="pagination"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-7 col-md-4 information-entry">
                <div class="product-detail-box">
                    <h1 class="product-title">{{$product->name}}</h1>
                    <h3 class="product-subtitle">Danh mục: {{$name_cate}}</h3>
                    <div class="rating-box">
                        <div class="star"><i class="fa fa-star"></i></div>
                        <div class="star"><i class="fa fa-star"></i></div>
                        <div class="star"><i class="fa fa-star"></i></div>
                        <div class="star"><i class="fa fa-star-o"></i></div>
                        <div class="star"><i class="fa fa-star-o"></i></div>
                        <div class="rating-number">25 Reviews</div>
                    </div>
                    <div class="product-description detail-info-entry">{{$product->description}}</div>
                    <div class="price detail-info-entry">
                        {{-- <div class="prev">$90,00</div> --}}
                        <div class="current">{{ number_format($product->price, 0, ',', '.') }} đ</div>
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
                    <div class="quantity-selector detail-info-entry">
                        <div class="detail-info-entry-title">Quantity</div>
                        <div class="entry number-minus">&nbsp;</div>
                        <div class="entry number">1</div>
                        <div class="entry number-plus">&nbsp;</div>
                    </div>
                    <div class="detail-info-entry">
                        <a href="{{route('cart.add',$product->id)}}" class="button style-10">Add to cart</a>
                        <a class="button style-11"><i class="fa fa-heart"></i> Add to Wishlist</a>
                        <div class="clear"></div>
                    </div>
                    <div class="share-box detail-info-entry">
                        <div class="title">Share in social media</div>
                        <div class="socials-box">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-google-plus"></i></a>
                            <a href="#"><i class="fa fa-youtube"></i></a>
                            <a href="#"><i class="fa fa-linkedin"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                        </div>
                        <div class="clear"></div>
                    </div>
                   
                   
                </div>
            </div>
            <div class="clear visible-xs visible-sm"></div>
            <div class="col-md-4 col-lg-3 information-entry product-sidebar">
                <div class="row">
                    <div class="col-md-12">
                        <div class="information-blocks production-logo">
                            <div class="background">
                                <div class="logo"><img src="{{url('public/client/img/production-logo.png')}}" alt=""></div>
                                <a href="#">Review this producent</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="information-blocks">
                            <div class="information-entry products-list">
                                <h3 class="block-title inline-product-column-title">Related products</h3>
                                @foreach ($related_products as $related_product)
                                    
                                    <div class="inline-product-entry">
                                        <a href="#" class="image"><img alt="" src="{{url('public/uploads/product/'.$related_product->photo)}}"></a>
                                        <div class="content">
                                            <div class="cell-view">
                                                <a href="#" class="title">{{$related_product->name}}</a>
                                                <div class="price">
                                                    {{-- <div class="prev">$199,99</div> --}}
                                                    <div class="current">{{ number_format($related_product->price, 0, ',', '.') }} đ</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="information-blocks">
        <div class="tabs-container style-1">
            <div class="swiper-tabs tabs-switch">
                <div class="title">Product info</div>
                <div class="list">
                    <a class="tab-switcher active">Product description</a>
                    <a class="tab-switcher">Reviews (25)</a>
                    <div class="clear"></div>
                </div>
            </div>
            <div>
                <div class="tabs-entry">
                    <div class="article-container style-1">
                        <div class="row">
                            <div class="col-md-12 information-entry">
                                <h4>Chi tiết sản phẩm</h4>
                                <p>{{$product->content}}</p>
                                
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="tabs-entry">
                    <div class="article-container style-1">
                        <div class="row">
                            <div class="col-md-12 information-entry">
                                <h4>Review</h4>
                                <p>detail 1:</p>
                                
                            </div>
                            {{-- <div class="col-md-6 information-entry">
                                <h4>SHIPPING</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                    ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                                    ullamco laboris.</p>
                                <ul>
                                    <li>Any Product types that You want - Simple, Configurable</li>
                                    <li>Downloadable/Digital Products, Virtual Products</li>
                                    <li>Inventory Management with Backordered items</li>
                                    <li>Customer Personal Products - upload text for embroidery, monogramming</li>
                                    <li>Create Store-specific attributes on the fly</li>
                                </ul>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="clear"></div>
@endsection
