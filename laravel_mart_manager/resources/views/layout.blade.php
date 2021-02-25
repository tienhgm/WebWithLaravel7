<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Lavie'n Rose</title>

    <link rel="stylesheet" href="{{ asset('client/css/bootstrap.min.css') }}">
    <link href="{{ asset('client/css/idangerous.swiper.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('client/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href='http://fonts.googleapis.com/css?family=Raleway:300,400,500,600,700%7CDancing+Script%7CMontserrat:400,700%7CMerriweather:400,300italic%7CLato:400,700,900'
        rel='stylesheet' type='text/css'>
    <link href="{{ asset('client/css/style.css') }}" rel="stylesheet" type="text/css">



</head>

<body class="style-10">

    <!-- LOADER -->
    <div id="loader-wrapper">
        <div class="bubbles">
            <div class="title">loading</div>
            <span></span>
            <span id="bubble2"></span>
            <span id="bubble3"></span>
        </div>
    </div>

    <div id="content-block">

        <div class="content-center fixed-header-margin">
            <!-- HEADER -->
            <div class="header-wrapper style-10">
                <header class="type-1">

                    <div class="header-product">
                        <div class="logo-wrapper">
                            <a href="#" id="logo"><img alt="" src="{{ asset('client/img/logo-9.png') }}"></a>
                        </div>
                        <div class="product-header-message">

                        </div>
                        <div class="product-header-content">
                            <div class="line-entry">
                                <div class="menu-button responsive-menu-toggle-class"><i class="fa fa-reorder"></i>
                                </div>
                                <div class="header-top-entry increase-icon-responsive open-search-popup">
                                    <div class="title"><i class="fa fa-search"></i> <span>Tìm kiếm</span></div>
                                </div>
                            </div>
                            <div class="middle-line"></div>
                            <div class="line-entry">
                                <a href="#" class="header-functionality-entry"><i class="fa fa-heart-o"></i><span>Mục
                                        yêu thích</span></a>
                                <a href="{{url('cart')}}" class="header-functionality-entry open-cart-popup"><i
                                        class="fa fa-shopping-cart"></i><span>Giỏ hàng</span> <b> ( {{ Cart::count() }} )</b></a>
                            </div>
                        </div>
                    </div>

                    <div class="close-header-layer"></div>
                    <div class="navigation">
                        <div class="navigation-header responsive-menu-toggle-class">
                            <div class="title">Navigation</div>
                            <div class="close-menu"></div>
                        </div>
                        <div class="nav-overflow">
                            <nav>
                                <ul>
                                    <li class="full-width">
                                        <a href="{{route('home')}}" class="active">Home</a>
                                    </li>

                                    <li class="simple-list">
                                        <a href="{{route('category')}}">Sản phẩm</a><i class="fa fa-chevron-down"></i>
                                        <div class="submenu">
                                            <ul class="simple-menu-list-column">
                                                <li><a href="{{route('category')}}"><i class="fa fa-angle-right"></i>Shop</a></li>
                                                <li><a href="product.html"><i class="fa fa-angle-right"></i>Thịnh hành</a></li>
                                                <li><a href="shop.html"><i class="fa fa-angle-right"></i>Sản phẩm mới</a></li>
                                            </ul>
                                        </div>
                                    </li>

                                    <li class="column-1">
                                        <a href="blog.html">Blog</a><i class="fa fa-chevron-down"></i>
                                        <div class="submenu">
                                            <div class="full-width-menu-items-left">
                                                <img class="submenu-background"
                                                    src="{{ asset('client/img/product-menu-8.jpeg') }}" alt="">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="submenu-list-title"><a href="blog.html">Blog <span
                                                                    class="menu-label blue">new</span></a><span
                                                                class="toggle-list-button"></span></div>
                                                        <ul class="list-type-1 toggle-list-container">
                                                            <li><a href="blog.html"><i
                                                                        class="fa fa-angle-right"></i>Blog Default</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="simple-list">
                                        <a>More</a><i class="fa fa-chevron-down"></i>
                                        <div class="submenu">
                                            <ul class="simple-menu-list-column">
                                                <li><a href="wishlist.html"><i class="fa fa-angle-right"></i>Mục yêu
                                                        thích</a></li>
                                            </ul>
                                        </div>
                                    </li>
                                    @guest
                                        <li class="simple-list">
                                            <a href="{{ route('login') }}">Tài khoản</a>
                                        </li>
                                    @else
                                        <li class="simple-list">
                                            <a>{{ Auth::user()->name }}</a>
                                            <div class="submenu">
                                                <ul class="simple-menu-list-column">
                                                    <li><a href="#">Cài đặt </a></li>
                                                    <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                                            {{ __('Logout') }}
                                                        </a>

                                                        <form id="logout-form" action="{{ route('logout') }}"
                                                            method="POST" class="d-none">
                                                            @csrf
                                                        </form>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                    @endguest
                                </ul>
                                <div class="clear"></div>
                                <a class="fixed-header-visible additional-header-logo"><img
                                        src="{{ asset('client/img\logo-9.png') }}" alt=""></a>
                            </nav>
                            <div class="navigation-footer responsive-menu-toggle-class">
                                <div class="socials-box">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-google-plus"></i></a>
                                    <a href="#"><i class="fa fa-youtube"></i></a>
                                    <a href="#"><i class="fa fa-linkedin"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                    <a href="#"><i class="fa fa-pinterest-p"></i></a>
                                    <div class="clear"></div>
                                </div>
                                <div class="navigation-copyright">Created by <a href="#">8theme</a>. All rights reserved
                                </div>
                            </div>
                        </div>
                    </div>
                </header>
                <div class="clear"></div>
            </div>

            {{-- content --}}
            <div class="content-push">

                @yield('content')

            </div>
        </div>
        <!-- FOOTER -->
        <div class="footer-wrapper style-21">
            <footer class="type-2">
                <div class="position-center">
                    <img class="footer-logo" src="img\logo-23.png" alt="">
                    <div class="footer-links">
                        <a href="#">Site Map</a>
                        <a href="#">Search</a>
                        <a href="#">Terms</a>
                        <a href="#">Advanced Search</a>
                        <a href="#">Orders and Returns</a>
                        <a href="#">Contact Us</a>
                    </div>
                    <div class="copyright">Created with by <a href="#">8theme</a>. All right reserved</div>
                </div>
            </footer>
        </div>
    </div>

    
    <div class="overlay-popup" id="image-popup">
        
        <div class="overflow">
            <div class="table-view">
                <div class="cell-view">
                    <div class="close-layer"></div>
                    <div class="popup-container">
                        <img class="gallery-image" src="img\portfolio-1.jpeg" alt="">
                        <div class="close-popup"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="search-box popup">
        <form>
            <div class="search-button">
                <i class="fa fa-search"></i>
                <input type="submit">
            </div>
            <div class="search-field">
                <input type="text" value="" placeholder="Search for product">
            </div>
        </form>
    </div>

    {{-- cart hover --}}
    <div class="cart-box popup">
        <div class="popup-container">
            @foreach (Cart::content() as $row)
                <div class="cart-entry">
                    <a class="image"><img src="{{ asset('uploads/product/'.$row->options->photo) }}" alt=""></a>
                    <div class="content">
                        <a class="title" href="#">{{$row->name}}</a>
                        <div class="quantity">Quantity: 4</div>
                        <div class="price">{{ number_format($row->total,0,',','.') }}đ</div>
                    </div>
                    <div class="button-x"><a href="{{route('cart.remove',$row->rowId)}}" style="color: black;"><i class="fa fa-close"></i></a></div>
                </div>
            @endforeach
            <div class="summary">
                
                <div class="grandtotal">Grand Total <span>{{Cart::total()}}</span></div>
            </div>
            <div class="cart-buttons">
                <div class="column">
                    <a href="{{url('cart')}}" class="button style-3">view cart</a>
                    <div class="clear"></div>
                </div>
                <div class="column">
                    <a class="button style-4">checkout</a>
                    <div class="clear"></div>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </div>

    {{-- <div id="product-popup" class="overlay-popup">
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
                                            data-loop="0" data-speed="500" data-center="0"
                                            data-slides-per-view="responsive" data-xs-slides="3" data-int-slides="3"
                                            data-sm-slides="3" data-md-slides="4" data-lg-slides="4"
                                            data-add-slides="4">
                                            <div class="swiper-wrapper">
                                                <div class="swiper-slide selected">
                                                    <div class="paddings-container">
                                                        <img src="{{ asset('client/img/product-main-1.jpeg') }}"
                                                            alt="">
                                                    </div>
                                                </div>
                                                <div class="swiper-slide">
                                                    <div class="paddings-container">
                                                        <img src="{{ asset('client/img/product-main-2.jpeg') }}"
                                                            alt="">
                                                    </div>
                                                </div>
                                                <div class="swiper-slide">
                                                    <div class="paddings-container">
                                                        <img src="{{ asset('client/img/product-main-3.jpeg') }}"
                                                            alt="">
                                                    </div>
                                                </div>
                                                <div class="swiper-slide">
                                                    <div class="paddings-container">
                                                        <img src="{{ asset('client/img/product-main-4.jpeg') }}"
                                                            alt="">
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
    </div> --}}
    <script src="{{ asset('client/js/jquery-2.1.3.min.js') }}"></script>
    <script src="{{ asset('client/js/idangerous.swiper.min.js') }}"></script>
    <script src="{{ asset('client/js/global.js') }}"></script>

    <!-- custom scrollbar -->
    <script src="{{ asset('client/js/jquery.mousewheel.js') }}"></script>
    <script src="{{ asset('client/js/jquery.jscrollpane.min.js') }}"></script>
    <script src="{{ asset('client/js/jquery-ui.min.js') }}"></script>
    <script>
        $(document).ready(function(){
            var minVal = parseInt($('.min-price span').text());
            var maxVal = parseInt($('.max-price span').text());
            $( "#prices-range" ).slider({
                range: true,
                min: minVal,
                max: maxVal,
                step: 5,
                values: [ minVal, maxVal ],
                slide: function( event, ui ) {
                    $('.min-price span').text(ui.values[ 0 ]);
                    $('.max-price span').text(ui.values[ 1 ]);
                }
            });
        });
    </script>
</body>

</html>
