@extends('index')

@section('main')

<div class="product-area pt-60 pb-50">
    <div class="container">
        <div class="slider-with-banner">
            <div class="container">
                <div class="row">
                    <!-- Begin Slider Area -->
                    <div class="col-lg-8 col-md-8">
                        <div class="slider-area">
                            <div class="slider-active owl-carousel">
                                @foreach($product_slide as $slide)
                                <!-- Begin Single Slide Area -->
                                <div class="single-slide align-center-left ">
                                    <img src="images/product/dthoai/{{$slide->prod_img}}" style="width:366px;height:400px; margin-left:350px;margin-top:15px;">
                                    <div class="slider-progress"></div>
                                    <div class="slider-content">
                                        <h5>Giảm <span>{{$slide->sale}}%</span></h5>
                                        <h2>{{$slide->prod_name}}</h2>
                                        <h3>Giá Bắt Đầu Từ <span>{{number_format(($slide->prod_price)-(($slide->prod_price)*($slide->sale))/100)}}VND</span></h3>
                                        <div class="default-btn slide-btn">
                                            <a class="links" href="{{asset('product').'/'.$slide->prod_id}}">Mua Ngay</a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!-- Slider Area End Here -->
                    <!-- Begin Li Banner Area -->
                    <div class="col-lg-4 col-md-4 text-center pt-xs-30">
                        <img style="width:300px;height:200px" src="images/banner/sale-banner_23-2147967902.jpg">
                        <h2></h2>
                        <img style="width:300px;height:200px" src="images/banner/super-sale-banner-template-design-vector-23449650.jpg">
                    </div>
                    <!-- Li Banner Area End Here -->
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="li-product-tab">
                    <ul class="nav li-product-menu">
                        <li><a class="active" data-toggle="tab" href="#li-new-product"><span>Sản Phầm Mới</span></span></a></li>
                        <li><a data-toggle="tab" href="#li-bestseller-product"><span>Sản Phẩm Ưu Đãi</span></a></li>
                        <li><a data-toggle="tab" href="#li-featured-product"><span>Dành Cho Bạn</span></a></li>
                    </ul>
                </div>
                <!-- Begin Li's Tab Menu Content Area -->
            </div>
        </div>
        <div class="tab-content">
            <div id="li-new-product" class="tab-pane active show" role="tabpanel">
                <div class="row">
                    <div class="product-active owl-carousel">
                        @foreach($product_new as $new)
                        <div class="col-lg-12">
                            <!-- single-product-wrap start -->
                            <div class="single-product-wrap">
                                <div class="product-image">
                                    <a href="{{asset('product').'/'.$new->prod_id}}">
                                        <img src="images/product/dthoai/{{$new->prod_img}}" alt="Li's Product Image">
                                    </a>
                                    <span class="sticker">New</span>
                                </div>
                                <div class="product_desc">
                                    <div class="product_desc_info">
                                        <div class="product-review">
                                            <div class="rating-box">
                                                <ul class="rating">
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <h4><a class="product_name" href="{{asset('product').'/'.$new->prod_id}}">{{$new->prod_name}}</a></h4>
                                        <div class="price-box">
                                            @if($new->sale == 0)
                                            <span class="new-price">
                                                {{
                                                       number_format($new->prod_price) 
                                                    }}
                                            </span>
                                            @else
                                            <span class="new-price new-price-2">
                                                {{
                                                        number_format(($new->prod_price)-(($new->prod_price)*($new->sale))/100)
                                                    }}
                                            </span>
                                            <span class="old-price">{{number_format($new->prod_price)}}</span>
                                            <span class="discount-percentage">-{{number_format($new->sale)}}%</span>
                                            </span>
                                            @endif

                                        </div>
                                    </div>
                                    <div class="add-actions">
                                        <ul class="add-actions-link">
                                            <li class="add-cart active"><a href="{{route('addcart',['id' => $new->prod_id])}}">Add to cart</a></li>
                                            <li><a class="links-details" href="{{route('addwishlist',['id' => $new->prod_id])}}"><i class="fa fa-heart-o"></i></a></li>
                                            <li><a href="{{asset('product').'/'.$new->prod_id}}" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-eye"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- single-product-wrap end -->
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div id="li-bestseller-product" class="tab-pane" role="tabpanel">
                <div class="row">
                    <div class="product-active owl-carousel">
                        @foreach($product_sale as $sale)
                        <div class="col-lg-12">
                            <!-- single-product-wrap start -->
                            <div class="single-product-wrap">
                                <div class="product-image">
                                    <a href="{{asset('product').'/'.$sale->prod_id}}">
                                        <img src="images/product/dthoai/{{$sale->prod_img}}" alt="Li's Product Image">
                                    </a>
                                    <span class="sticker">New</span>
                                </div>
                                <div class="product_desc">
                                    <div class="product_desc_info">
                                        <div class="product-review">
                                            <div class="rating-box">
                                                <ul class="rating">
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <h4><a class="product_name" href="{asset('product').'/'.$sale->prod_id}}">Accusantium dolorem1</a></h4>
                                        <span class="new-price new-price-2">
                                            {{
                                                        number_format(($sale->prod_price)-(($sale->prod_price)*($sale->sale))/100)
                                                    }}
                                        </span>
                                        <span class="old-price">{{number_format($sale->prod_price)}}</span>
                                        <span class="discount-percentage">-{{number_format($sale->sale)}}%</span>
                                        </span>
                                    </div>
                                    <div class="add-actions">
                                        <ul class="add-actions-link">
                                            <li class="add-cart active"><a href="{{route('addcart',['id' => $sale->prod_id])}}">Add to cart</a></li>
                                            <li><a class="links-details" href="{{route('addwishlist',['id' => $sale->prod_id])}}"><i class="fa fa-heart-o"></i></a></li>
                                            <li><a href="{{asset('product').'/'.$sale->prod_id}}" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-eye"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- single-product-wrap end -->
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div id="li-featured-product" class="tab-pane" role="tabpanel">
                <div class="row">
                    <div class="product-active owl-carousel">
                        @foreach($product_random as $random)
                        <div class="col-lg-12">
                            <!-- single-product-wrap start -->
                            <div class="single-product-wrap">
                                <div class="product-image">
                                    <a href="{{asset('product').'/'.$random->prod_id}}">
                                        <img src="images/product/dthoai/{{$random->prod_img}}" alt="Li's Product Image">
                                    </a>
                                    <span class="sticker">New</span>
                                </div>
                                <div class="product_desc">
                                    <div class="product_desc_info">
                                        <div class="product-review">
                                            <div class="rating-box">
                                                <ul class="rating">
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <h4><a class="product_name" href="{asset('product').'/'.$random->prod_id}}">{{$random->prod_name}}</a></h4>
                                        <div class="price-box">
                                            @if($random->sale == 0)
                                            <span class="new-price">
                                                {{
                                                       number_format($random->prod_price) 
                                                    }}
                                            </span>
                                            @else
                                            <span class="new-price new-price-2">
                                                {{
                                                        number_format(($random->prod_price)-(($random->prod_price)*($random->sale))/100)
                                                    }}
                                            </span>
                                            <span class="old-price">{{number_format($random->prod_price)}}</span>
                                            <span class="discount-percentage">-{{number_format($random->sale)}}%</span>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="add-actions">
                                        <ul class="add-actions-link">
                                            <li class="add-cart active"><a href="{{route('addcart',['id' => $random->prod_id])}}">Add to cart</a></li>
                                            <li><a class="links-details" href="{{route('addwishlist',['id' => $random->prod_id])}}"><i class="fa fa-heart-o"></i></a></li>
                                            <li><a href="{{asset('product').'/'.$random->prod_id}}" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-eye"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- single-product-wrap end -->
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Product Area End Here -->
<!-- Begin Li's Static Banner Area -->
<div class="li-static-banner">
    <div class="container">
        <div class="row">
            <!-- Begin Single Banner Area -->
            <div class="col-lg-4 col-md-4 text-center">
                <div class="single-banner">
                    <a href="#">
                        <img src="images/banner/1_3.jpg" alt="Li's Static Banner">
                    </a>
                </div>
            </div>
            <!-- Single Banner Area End Here -->
            <!-- Begin Single Banner Area -->
            <div class="col-lg-4 col-md-4 text-center pt-xs-30">
                <div class="single-banner">
                    <a href="#">
                        <img src="images/banner/1_4.jpg" alt="Li's Static Banner">
                    </a>
                </div>
            </div>
            <!-- Single Banner Area End Here -->
            <!-- Begin Single Banner Area -->
            <div class="col-lg-4 col-md-4 text-center pt-xs-30">
                <div class="single-banner">
                    <a href="#">
                        <img src="images/banner/1_5.jpg" alt="Li's Static Banner">
                    </a>
                </div>
            </div>
            <!-- Single Banner Area End Here -->
        </div>
    </div>
</div>
<!-- Li's Static Banner Area End Here -->
<!-- Begin Li's Laptop Product Area -->
<section class="product-area li-laptop-product pt-60 pb-45">
    <div class="container">
        <div class="row">
            <!-- Begin Li's Section Area -->
            <div class="col-lg-12">
                <div class="li-section-title">
                    <h2>
                        <span>Laptop</span>
                    </h2>
                    <ul class="li-sub-category-list">
                        @foreach($category_laptop as $lap)
                        <li><a href="{{asset('category').'/'.$lap->cate_id}}">{{$lap->cate_name}}</a></li>
                        @endforeach
                    </ul>
                </div>
                <div class="row">
                    <div class="product-active owl-carousel">
                        @foreach($product_laptop as $laptop)
                        <div class="col-lg-12">
                            <!-- single-product-wrap start -->
                            <div class="single-product-wrap">
                                <div class="product-image">
                                    <a href="{{asset('product').'/'.$laptop->prod_id}}">
                                        <img src="images/product/dthoai/{{$laptop->prod_img}}" alt="Li's Product Image">
                                    </a>
                                    <span class="sticker">New</span>
                                </div>
                                <div class="product_desc">
                                    <div class="product_desc_info">
                                        <div class="product-review">
                                            <div class="rating-box">
                                                <ul class="rating">
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <h4><a class="product_name" href="{{asset('product').'/'.$laptop->prod_id}}">{{$laptop->prod_name}}"</a></h4>
                                        <div class="price-box">
                                            @if($laptop->sale == 0)
                                            <span class="new-price">
                                                {{
                                                       number_format($laptop->prod_price) 
                                                    }}
                                            </span>
                                            @else
                                            <span class="new-price new-price-2">
                                                {{
                                                        number_format(($laptop->prod_price)-(($laptop->prod_price)*($laptop->sale))/100)
                                                    }}
                                            </span>
                                            <span class="old-price">{{number_format($laptop->prod_price)}}</span>
                                            <span class="discount-percentage">-{{number_format($laptop->sale)}}%</span>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="add-actions">
                                        <ul class="add-actions-link">
                                            <li class="add-cart active"><a href="{{route('addcart',['id' => $laptop->prod_id])}}">Add to cart</a></li>
                                            <li><a class="links-details" href="{{route('addwishlist',['id' => $laptop->prod_id])}}"><i class="fa fa-heart-o"></i></a></li>
                                            <li><a href="{{asset('product').'/'.$laptop->prod_id}}" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-eye"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- single-product-wrap end -->
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- Li's Section Area End Here -->
        </div>
    </div>
</section>
<!-- Li's Laptop Product Area End Here -->
<!-- Begin Li's TV & Audio Product Area -->
<section class="product-area li-laptop-product li-tv-audio-product pb-45">
    <div class="container">
        <div class="row">
            <!-- Begin Li's Section Area -->
            <div class="col-lg-12">
                <div class="li-section-title">
                    <h2>
                        <span>TV & Smath TV</span>
                    </h2>
                </div>
                <div class="row">
                    <div class="product-active owl-carousel">
                        @foreach($product_tv as $tv)
                        <div class="col-lg-12">
                            <!-- single-product-wrap start -->
                            <div class="single-product-wrap">
                                <div class="product-image">
                                    <a href="{{asset('product').'/'.$tv->prod_id}}">
                                        <img src="images/product/dthoai/{{$tv->prod_img}}" alt="Li's Product Image">
                                    </a>
                                    <span class="sticker">New</span>
                                </div>
                                <div class="product_desc">
                                    <div class="product_desc_info">
                                        <div class="product-review">
                                            <div class="rating-box">
                                                <ul class="rating">
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <h4><a class="product_name" href="{{asset('product').'/'.$tv->prod_id}}">{{$tv->prod_name}}</a></h4>
                                        <div class="price-box">
                                            @if($tv->sale == 0)
                                            <span class="new-price">
                                                {{
                                                       number_format($tv->prod_price) 
                                                    }}
                                            </span>
                                            @else
                                            <span class="new-price new-price-2">
                                                {{
                                                        number_format(($tv->prod_price)-(($tv->prod_price)*($tv->sale))/100)
                                                    }}
                                            </span>
                                            <span class="old-price">{{number_format($tv->prod_price)}}</span>
                                            <span class="discount-percentage">-{{number_format($tv->sale)}}%</span>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="add-actions">
                                        <ul class="add-actions-link">
                                            <li class="add-cart active"><a href="{{route('addcart',['id' => $tv->prod_id])}}">Add to cart</a></li>
                                            <li><a class="links-details" href="{{route('addwishlist',['id' => $tv->prod_id])}}"><i class="fa fa-heart-o"></i></a></li>
                                            <li><a href="{{asset('product').'/'.$tv->prod_id}}" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-eye"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- single-product-wrap end -->
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- Li's Section Area End Here -->
        </div>
    </div>
</section>
<!-- Li's TV & Audio Product Area End Here -->
<!-- Begin Li's Static Home Area -->
<div class="li-static-home">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- Begin Li's Static Home Image Area -->
                <div class="li-static-home-image"></div>
                <!-- Li's Static Home Image Area End Here -->
                <!-- Begin Li's Static Home Content Area -->
                <div class="li-static-home-content">
                    <p>Sale Offer<span>-20% Off</span>This Week</p>
                    <h2>Featured Product</h2>
                    <h2>Meito Accessories 2018</h2>
                    <p class="schedule">
                        Starting at
                        <span> $1209.00</span>
                    </p>
                    <div class="default-btn">
                        <a href="shop-left-sidebar.html" class="links">Shopping Now</a>
                    </div>
                </div>
                <!-- Li's Static Home Content Area End Here -->
            </div>
        </div>
    </div>
</div>
<!-- Li's Static Home Area End Here -->
<!-- Begin Li's Trending Product Area -->
<section class="product-area li-trending-product pt-60 pb-45">
    <div class="container">
        <div class="row">
            <!-- Begin Li's Tab Menu Area -->
            <div class="col-lg-12">
                <div class="li-product-tab li-trending-product-tab">
                    <h2>
                        <span>Điện Thoại</span>
                    </h2>
                    <ul class="nav li-product-menu li-trending-product-menu">
                        <li><a data-toggle="tab" href="#home1"><span>Tableb</span></a></li>
                        <li><a data-toggle="tab" href="#home2"><span>Đồng Hồ Thông Minh</span></a></li>
                        <li><a data-toggle="tab" href="#home3"><span>Phụ Kiện</span></a></li>
                    </ul>
                </div>
                <!-- Begin Li's Tab Menu Content Area -->
                <div class="tab-content li-tab-content li-trending-product-content">
                    <div id="home1" class="tab-pane show fade in active">
                        <div class="row">
                            <div class="product-active owl-carousel">
                                @foreach($product_dienthoai as $dienthoai)
                                <div class="col-lg-12">
                                    <!-- single-product-wrap start -->
                                    <div class="single-product-wrap">
                                        <div class="product-image">
                                            <a href="{{asset('product').'/'.$dienthoai->prod_id}}">
                                                <img src="images/product/dthoai/{{$dienthoai->prod_img}}" alt="Li's Product Image">
                                            </a>
                                            <span class="sticker">New</span>
                                        </div>
                                        <div class="product_desc">
                                            <div class="product_desc_info">
                                                <div class="product-review">
                                                    <div class="rating-box">
                                                        <ul class="rating">
                                                            <li><i class="fa fa-star-o"></i></li>
                                                            <li><i class="fa fa-star-o"></i></li>
                                                            <li><i class="fa fa-star-o"></i></li>
                                                            <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                            <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <h4><a class="product_name" href="{{asset('product').'/'.$dienthoai->prod_id}}">{{$dienthoai->prod_name}}</a></h4>
                                                <div class="price-box">
                                                    @if($dienthoai->sale == 0)
                                                    <span class="new-price">
                                                        {{
                                                            number_format($dienthoai->prod_price) 
                                                            }}
                                                    </span>
                                                    @else
                                                    <span class="new-price new-price-2">
                                                        {{
                                                                number_format(($dienthoai->prod_price)-(($dienthoai->prod_price)*($dienthoai->sale))/100)
                                                            }}
                                                    </span>
                                                    <span class="old-price">{{number_format($dienthoai->prod_price)}}</span>
                                                    <span class="discount-percentage">-{{number_format($dienthoai->sale)}}%</span>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="add-actions">
                                                <ul class="add-actions-link">
                                                    <li class="add-cart active"><a href="{{route('addcart',['id' => $dienthoai->prod_id])}}">Add to cart</a></li>
                                                    <li><a class="links-details" href="{{route('addwishlist',['id' => $dienthoai->prod_id])}}"><i class="fa fa-heart-o"></i></a></li>
                                                    <li><a href="{{asset('product').'/'.$dienthoai->prod_id}}" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-eye"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- single-product-wrap end -->
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Tab Menu Content Area End Here -->
            </div>
            <!-- Tab Menu Area End Here -->
        </div>
    </div>
</section>
<!-- Li's Trending Product Area End Here -->
<!-- Begin Li's Trendding Products Area -->
<section class="product-area li-laptop-product li-trendding-products best-sellers pb-45">
    <div class="container">
        <div class="row">
            <!-- Begin Li's Section Area -->
            <div class="col-lg-12">
                <div class="li-section-title">
                    <h2>
                        <span>Sách</span>
                    </h2>
                </div>
                <div class="row">
                    <div class="product-active owl-carousel">
                        @foreach($product_sach as $sach)
                        <div class="col-lg-12">
                            <!-- single-product-wrap start -->
                            <div class="single-product-wrap">
                                <div class="product-image">
                                    <a href="{{asset('product').'/'.$sach->prod_id}}">
                                        <img src="images/product/dthoai/{{$sach->prod_img}}" alt="Li's Product Image">
                                    </a>
                                    <span class="sticker">New</span>
                                </div>
                                <div class="product_desc">
                                    <div class="product_desc_info">
                                        <div class="product-review">
                                            <div class="rating-box">
                                                <ul class="rating">
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <h4><a class="product_name" href="{{asset('product').'/'.$sach->prod_id}}">{{$sach->prod_name}}</a></h4>
                                        <div class="price-box">
                                            @if($sach->sale == 0)
                                            <span class="new-price">
                                                {{
                                                    number_format($sach->prod_price) 
                                                    }}
                                            </span>
                                            @else
                                            <span class="new-price new-price-2">
                                                {{
                                                        number_format(($sach->prod_price)-(($sach->prod_price)*($sach->sale))/100)
                                                    }}
                                            </span>
                                            <span class="old-price">{{number_format($sach->prod_price)}}</span>
                                            <span class="discount-percentage">-{{number_format($sach->sale)}}%</span>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="add-actions">
                                        <ul class="add-actions-link">
                                            <li class="add-cart active"><a href="{{route('addcart',['id' => $sach->prod_id])}}">Add to cart</a></li>
                                            <li><a class="links-details" href="{{route('addwishlist',['id' => $sach->prod_id])}}"><i class="fa fa-heart-o"></i></a></li>
                                            <li><a href="{{asset('product').'/'.$sach->prod_id}}" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-eye"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- single-product-wrap end -->
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- Li's Section Area End Here -->
        </div>
    </div>
</section>
</div>
@endsection