@extends('layout')
@section('content')
    
<div class="breadcrumb-box">
    <a href="#">Home</a>
    <a href="#">Bags &amp; Accessories</a>
</div>

<div class="information-blocks">
    <div class="row">
        <div class="col-md-9 col-md-push-3 col-sm-8 col-sm-push-4">
            <div class="page-selector">
                <div class="pages-box hidden-xs">
                    <a href="#" class="square-button active">1</a>
                    <a href="#" class="square-button">2</a>
                    <a href="#" class="square-button">3</a>
                    <div class="divider">...</div>
                    <a href="#" class="square-button"><i class="fa fa-angle-right"></i></a>
                </div>
                <div class="shop-grid-controls">
                    <div class="entry">
                        <div class="inline-text">Sorty by</div>
                        <div class="simple-drop-down">
                            <select>
                                <option>Price</option>
                                <option>Category</option>
                            </select>
                        </div>
                        {{-- <div class="sort-button"></div> --}}
                    </div>
                    <div class="entry">
                        <div class="view-button active grid"><i class="fa fa-th"></i></div>
                        <div class="view-button list"><i class="fa fa-list"></i></div>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
            <div class="row shop-grid grid-view">

                {{-- ######## --}}
                @yield('content_cate')
                {{-- ######## --}}
                
            </div>
            <div class="page-selector">
                
                <div class="pages-box">
                    <a href="#" class="square-button active">1</a>
                    <a href="#" class="square-button">2</a>
                    <a href="#" class="square-button">3</a>
                    <div class="divider">...</div>
                    <a href="#" class="square-button"><i class="fa fa-angle-right"></i></a>
                </div>
                <div class="clear"></div>
            </div>
        </div>
        <div class="col-md-3 col-md-pull-9 col-sm-4 col-sm-pull-8 blog-sidebar">
            <div class="information-blocks categories-border-wrapper">
                <div class="block-title size-3">Categories</div>
                <div class="accordeon">
                    <div class="accordeon-title">Sweater</div>
                    <div class="accordeon-entry">
                        <div class="article-container style-1">
                            <ul>
                                <li><a href="{{url('shop/sweater/6')}}">Sweater</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="accordeon-title">Man's Products</div>
                    <div class="accordeon-entry">
                        <div class="article-container style-1">
                            <ul>
                                <li><a href="#">Man's Products</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="accordeon-title">Woman's Products</div>
                    <div class="accordeon-entry">
                        <div class="article-container style-1">
                            <ul>
                                <li><a href="#">Woman's Products</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="accordeon-title">Top Brands</div>
                    <div class="accordeon-entry">
                        <div class="article-container style-1">
                            <ul>
                                <li><a href="#">Top Brands</a></li>                            
                            </ul>
                        </div>
                    </div>
                    <div class="accordeon-title">Special Offer</div>
                    <div class="accordeon-entry">
                        <div class="article-container style-1">
                            <ul>
                                <li><a href="#">Special Offer</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="information-blocks">
                <div class="block-title size-2">Sort by price</div>
                <div class="range-wrapper">
                    <div id="prices-range"></div>
                    <div class="range-price">
                        Price: 
                        <div class="min-price"><b>&pound;<span>0</span></b></div>
                        <b>-</b>
                        <div class="max-price"><b>&pound;<span>200</span></b></div>
                    </div>
                    <a class="button style-14">filter</a>
                </div>
            </div>

            <div class="information-blocks">
                <div class="block-title size-2">Sort by sizes</div>
                <div class="size-selector">
                    <div class="entry active">xs</div>
                    <div class="entry">s</div>
                    <div class="entry">m</div>
                    <div class="entry">l</div>
                    <div class="entry">xl</div>
                    <div class="spacer"></div>
                </div>
            </div>

            <div class="information-blocks">
                <div class="block-title size-2">Sort by brands</div>
                <div class="row">
                    <div class="col-xs-6">
                        <label class="checkbox-entry">
                            <input type="checkbox"> <span class="check"></span> Armani
                        </label>
                        <label class="checkbox-entry">
                            <input type="checkbox"> <span class="check"></span> Bershka Co
                        </label>
                        <label class="checkbox-entry">
                            <input type="checkbox"> <span class="check"></span> Nelly.com
                        </label>
                        <label class="checkbox-entry">
                            <input type="checkbox"> <span class="check"></span> Zigzag Inc
                        </label>  
                    </div>
                    <div class="col-xs-6">
                        <label class="checkbox-entry">
                            <input type="checkbox"> <span class="check"></span> Armani
                        </label>
                        <label class="checkbox-entry">
                            <input type="checkbox"> <span class="check"></span> Bershka Co
                        </label>
                        <label class="checkbox-entry">
                            <input type="checkbox"> <span class="check"></span> Nelly.com
                        </label>
                        <label class="checkbox-entry">
                            <input type="checkbox"> <span class="check"></span> Zigzag Inc
                        </label> 
                    </div>
                </div>
            </div>

        
        </div>
    </div>
</div>

<div class="information-blocks">
    <div class="row">
        <div class="col-sm-4 information-entry">
            <h3 class="block-title inline-product-column-title">Featured products</h3>
            <div class="inline-product-entry">
                <a href="#" class="image"><img alt="" src="{{url('public/client/img/product-image-inline-1.jpeg')}}"></a>
                <div class="content">
                    <div class="cell-view">
                        <a href="#" class="title">Ladies Pullover Batwing Sleeve Zigzag</a>
                        <div class="price">
                            <div class="prev">$199,99</div>
                            <div class="current">$119,99</div>
                        </div>
                    </div>
                </div>
                <div class="clear"></div>
            </div>  
        </div>
        <div class="col-sm-4 information-entry">
            <h3 class="block-title inline-product-column-title">Featured products</h3>
            <div class="inline-product-entry">
                <a href="#" class="image"><img alt="" src="{{url('public/client/img/product-image-inline-2.jpeg')}}"></a>
                <div class="content">
                    <div class="cell-view">
                        <a href="#" class="title">Ladies Pullover Batwing Sleeve Zigzag</a>
                        <div class="price">
                            <div class="prev">$199,99</div>
                            <div class="current">$119,99</div>
                        </div>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
        </div>
        <div class="col-sm-4 information-entry">
            <h3 class="block-title inline-product-column-title">Featured products</h3>
            <div class="inline-product-entry">
                <a href="#" class="image"><img alt="" src="{{url('public/client/img/product-image-inline-3.jpeg')}}"></a>
                <div class="content">
                    <div class="cell-view">
                        <a href="#" class="title">Ladies Pullover Batwing Sleeve Zigzag</a>
                        <div class="price">
                            <div class="prev">$199,99</div>
                            <div class="current">$119,99</div>
                        </div>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </div>
</div>   
@endsection