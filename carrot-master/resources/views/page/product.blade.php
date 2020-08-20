@extends('index')
@section('main')
<div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <ul>
                <li><a href="index.html">Home</a></li>
                <li class="active">Single Product</li>
            </ul>
        </div>
    </div>
</div>
<!-- Li's Breadcrumb Area End Here -->
<!-- content-wraper start -->
<div class="content-wraper">
    <div class="container">
        <div class="row single-product-area">
            @foreach($product as $dt)
            <div class="col-lg-5 col-md-6">
                <!-- Product Details Left -->
                <div class="product-details-left">
                    <div class="product-details-images slider-navigation-1">

                        <div class="lg-image">
                            <a class="popup-img venobox vbox-item" href="images/product/dthoai/{{$dt->prod_img}}" data-gall="myGallery">
                                <img src="images/product/dthoai/{{$dt->prod_img}}" alt="product image">
                            </a>
                        </div>

                    </div>
                </div>
                <!--// Product Details Left -->
            </div>
            <div class="col-lg-7 col-md-6">
                <div class="product-details-view-content pt-60">
                    <div class="product-info">
                        <h2>{{$dt->prod_name}}</h2>
                        <div class="rating-box pt-20">
                            <ul class="rating rating-with-review-item">
                                <li><i class="fa fa-star-o"></i></li>
                                <li><i class="fa fa-star-o"></i></li>
                                <li><i class="fa fa-star-o"></i></li>
                                <li class="no-star"><i class="fa fa-star-o"></i></li>
                                <li class="no-star"><i class="fa fa-star-o"></i></li>
                                <li class="review-item"><a href="#">Read Review</a></li>
                                <li class="review-item"><a href="#">Write Review</a></li>
                            </ul>
                        </div>
                        <div class="price-box ">
                            @if($dt->sale == 0)
                            <span class="new-price">
                                {{number_format($dt->prod_price)}}
                            </span>
                            @else
                            <span class="new-price new-price-2">
                                {{number_format(($dt->prod_price)-(($dt->prod_price)*($dt->sale))/100)}}
                            </span>
                            <span class="discount-percentage">-{{number_format($dt->sale)}}%</span>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="product-desc">
                            <p>Bảo Hành : {{!!$dt->prod_warranty}}</p>
                            <p>Tình Trạng Máy : {{!!$dt->prod_condition}}</p>
                            <p>Quà Tặng Kèm : {{!!$dt->prod_accessories}}</p>
                        
                    </div>
                    <div class="product-variants">
                        <div class="produt-variants-size">
                            <label>Dimension</label>
                            <select class="nice-select">
                                <option value="1" title="S" selected="selected">40x60cm</option>
                                <option value="2" title="M">60x90cm</option>
                                <option value="3" title="L">80x120cm</option>
                            </select>
                        </div>
                    </div>
                    <div class="single-add-to-cart">
                        <form action="#" class="cart-quantity">
                            <div class="quantity">
                                <label>Quantity</label>
                                <div class="cart-plus-minus">
                                    <input class="cart-plus-minus-box" value="1" type="text">
                                    <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                    <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                </div>
                            </div>
                            <button class="add-to-cart" type="submit">Add to cart</button>
                        </form>
                    </div>
                    <div class="product-additional-info pt-25">
                        <a class="wishlist-btn" href="wishlist.html"><i class="fa fa-heart-o"></i>Add to wishlist</a>
                        <div class="product-social-sharing pt-25">
                            <ul>
                                <li class="facebook"><a href="#"><i class="fa fa-facebook"></i>Facebook</a></li>
                                <li class="twitter"><a href="#"><i class="fa fa-twitter"></i>Twitter</a></li>
                                <li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i>Google +</a></li>
                                <li class="instagram"><a href="#"><i class="fa fa-instagram"></i>Instagram</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="block-reassurance">
                        <ul>
                            <li>
                                <div class="reassurance-item">
                                    <div class="reassurance-icon">
                                        <i class="fa fa-check-square-o"></i>
                                    </div>
                                    <p>Chính sách bảo mật (chỉnh sửa với mô-đun đảm bảo khách hàng)</p>
                                </div>
                            </li>
                            <li>
                                <div class="reassurance-item">
                                    <div class="reassurance-icon">
                                        <i class="fa fa-truck"></i>
                                    </div>
                                    <p>Chính sách giao hàng (chỉnh sửa với mô-đun đảm bảo khách hàng)</p>
                                </div>
                            </li>
                            <li>
                                <div class="reassurance-item">
                                    <div class="reassurance-icon">
                                        <i class="fa fa-exchange"></i>
                                    </div>
                                    <p> Chính sách hoàn trả (chỉnh sửa với mô đun đảm bảo khách hàng)</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
</div>
<!-- content-wraper end -->
<!-- Begin Product Area -->
@foreach($product as $data)
<div class="product-area pt-35">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="li-product-tab">
                    <ul class="nav li-product-menu">
                        <li><a class="active" data-toggle="tab" href="#description"><span>Thông Tin về Sản Phẩm</span></a></li>
                        <li><a data-toggle="tab" href="#product-details"><span>Chi Tiết Sản Phẩm</span></a></li>
                    </ul>
                </div>
                <!-- Begin Li's Tab Menu Content Area -->
            </div>
        </div>
        <div class="tab-content">
            <div id="description" class="tab-pane active show" role="tabpanel">
                <div class="product-description">
                    {{!!$data->prod_description}}
                </div>
            </div>
            <div id="product-details" class="tab-pane" role="tabpanel">
                <div class="product-details-manufacturer">
                    {{!!$data->prod_products}}
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
<!-- Product Area End Here -->
<!-- Begin Li's Laptop Product Area -->
<section class="product-area li-laptop-product pt-30 pb-50">
    <div class="container">
        <div class="row">
            <!-- Begin Li's Section Area -->
            <div class="col-lg-12">
                <div class="li-section-title">
                    <h2>
                        <span>Sản Phẩm Gợi Ý</span>
                    </h2>
                </div>
                <div class="row">
                    <div class="product-active owl-carousel">
                        @foreach($product_suggestions as $random)
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
                                        <h4><a class="product_name" href="{{asset('product').'/'.$random->prod_id}}">Accusantium dolorem1</a></h4>
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
                                            <li class="add-cart active"><a href="#">Add to cart</a></li>
                                            <li><a href="{{asset('product').'/'.$random->prod_id}}" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-eye"></i></a></li>
                                            <li><a class="links-details" href="wishlist.html"><i class="fa fa-heart-o"></i></a></li>
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
@endsection