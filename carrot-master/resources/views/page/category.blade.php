@extends('index')
@section('main')
<div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <ul>
                <li><a href="index.html">Home</a></li>
                <li class="active">Shop List</li>
            </ul>
        </div>
    </div>
</div>
<!-- Li's Breadcrumb Area End Here -->
<!-- Begin Li's Content Wraper Area -->
<div class="content-wraper pt-60 pb-60">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 order-1 order-lg-2">
                <!-- Begin Li's Banner Area -->
                <div class="single-banner shop-page-banner">
                    <a href="#">
                        <img src="images/bg-banner/2.jpg" alt="Li's Static Banner">
                    </a>
                </div>
                <!-- Li's Banner Area End Here -->
                <!-- shop-top-bar start -->
                <div class="shop-top-bar mt-30">
                    <div class="shop-bar-inner">
                        <div class="product-view-mode">
                            <!-- shop-item-filter-list start -->
                            <ul class="nav shop-item-filter-list" role="tablist">
                                <li role="presentation"><a data-toggle="tab" role="tab" aria-controls="grid-view" href="#grid-view"><i class="fa fa-th"></i></a></li>
                                <li class="active" role="presentation"><a aria-selected="true" class="active show" data-toggle="tab" role="tab" aria-controls="list-view" href="#list-view"><i class="fa fa-th-list"></i></a></li>
                            </ul>
                            <!-- shop-item-filter-list end -->
                        </div>
                    </div>
                    <!-- product-select-box start -->
                    <div class="product-select-box">
                        <div class="product-short">
                            <p>Sort By:</p>
                            <select name = "sorf" class="nice-select">
                                <option value="trending">giá thấp tới cao</option>
                                <option value="trending">giá cao tới thấp</option>
                            </select>
                        </div>
                    </div>
                    <!-- product-select-box end -->
                </div>
                <!-- shop-top-bar end -->
                <!-- shop-products-wrapper start -->
                <div class="shop-products-wrapper">
                    <div class="tab-content">
                        <div id="grid-view" class="tab-pane fade" role="tabpanel">
                            <div class="product-area shop-product-area">
                                <div class="row">
                                    @foreach($product_category as $cate)
                                    <div class="col-lg-4 col-md-4 col-sm-6 mt-40">
                                        <!-- single-product-wrap start -->
                                        <div class="single-product-wrap">
                                            <div class="product-image">
                                                <a href="{{asset('product').'/'.$cate->prod_id}}">
                                                    <img src="images/product/dthoai/{{$cate->prod_img}}" alt="Li's Product Image">
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
                                                    <h4><a class="product_name" href="{{asset('product').'/'.$cate->prod_id}}">{{$cate->prod_name}}</a></h4>
                                                    <div class="price-box">
                                                        @if($cate->sale == 0)
                                                        <span class="new-price">
                                                            {{ number_format($cate->prod_price) }}
                                                        </span>
                                                        @else
                                                        <span class="new-price new-price-2">
                                                            {{ number_format(($cate->prod_price)-(($cate->prod_price)*($cate->sale))/100) }}
                                                        </span>
                                                        <span class="old-price">{{number_format($cate->prod_price)}}</span>
                                                        <span class="discount-percentage">-{{number_format($cate->sale)}}%</span>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="add-actions">
                                                    <ul class="add-actions-link">
                                                        <li class="add-cart active"><a href="{{route('addcart',['id' => $cate->prod_id])}}">Add to cart</a></li>
                                                        <li><a href="{{asset('product').'/'.$cate->prod_id}}" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-eye"></i></a></li>
                                                        <li><a class="links-details" href="{{route('addwishlist',['id' => $cate->prod_id])}}"><i class="fa fa-heart-o"></i></a></li>
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
                        <div id="list-view" class="tab-pane fade product-list-view active show" role="tabpanel">
                            <div class="row">
                                <div class="col">
                                    @foreach($product_category as $data)
                                    <div class="row product-layout-list">
                                        <div class="col-lg-3 col-md-5 ">
                                            <div class="product-image">
                                                <a href="{{asset('product/'.$data->prod_id)}}">
                                                    <img src="images/product/dthoai/{{$data->prod_img}}" alt="Li's Product Image">
                                                </a>
                                                <span class="sticker">New</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-5 col-md-7">
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
                                                    <h4><a class="product_name" href="">{{$data->prod_name}}</a></h4>
                                                    <div class="price-box">
                                                        @if($data->sale == 0)
                                                        <span class="new-price">
                                                            {{ number_format($data->prod_price) }}
                                                        </span>
                                                        @else
                                                        <span class="new-price new-price-2">
                                                            {{ number_format(($data->prod_price)-(($data->prod_price)*($data->sale))/100) }}
                                                        </span>
                                                        <span class="old-price">{{number_format($data->prod_price)}}</span>
                                                        <span class="discount-percentage">-{{number_format($data->sale)}}%</span>
                                                        </span>
                                                        @endif
                                                    </div>
                                                    <p> {{$data->prod_products}}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="shop-add-action mb-xs-30">
                                                <ul class="add-actions-link">
                                                    <li class="add-cart"><a href="{{route('addcart',['id' => $data->prod_id])}}">Add to cart</a></li>
                                                    <li class="wishlist"><a href="{{route('addwishlist',['id' => $data->prod_id])}}"><i class="fa fa-heart-o"></i>Add to wishlist</a></li>
                                                    <li><a class="quick-view"  href="{{asset('product').'/'.$data->prod_id}}"><i class="fa fa-eye"></i>Quick view</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="paginatoin-area">
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <ul class="pagination-box">
                                        <li class="active">{!! $product_category->links() !!}</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- shop-products-wrapper end -->
            </div>
            <div class="col-lg-3 order-2 order-lg-1">
                <!--sidebar-categores-box start  -->
                <div class="sidebar-categores-box mt-sm-30 mt-xs-30">
                    <div class="sidebar-title">
                        <h2>Danh Mục</h2>
                    </div>
                    <!-- category-sub-menu start -->
                    <div class="category-sub-menu">
                        <ul>
                            <li class="has-sub"><a href="# ">LapTop</a>
                                <ul>
                                    @foreach($category_laptop as $laptop)
                                    <li><a href="{{asset('category').'/'.$laptop->cate_id}}">{{$laptop->cate_name}}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            <li class="has-sub"><a href="#">Sách</a>
                                <ul>
                                    @foreach($category_sach as $sach)
                                    <li><a href="{{asset('category').'/'.$sach->cate_id}}">{{$sach->cate_name}}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            <li class="has-sub"><a href="#">Điện Thoại</a>
                                <ul>
                                    @foreach($category_dienthoai as $dienthoai)
                                    <li><a href="{{asset('category').'/'.$dienthoai->cate_id}}">{{$dienthoai->cate_name}}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!-- category-sub-menu end -->
                </div>
                <!--sidebar-categores-box end  -->
                <!--sidebar-categores-box start  -->
                <div class="sidebar-categores-box">
                    <div class="sidebar-title">
                        <h2>Filter By</h2>
                    </div>
                    <!-- btn-clear-all start -->
                    <button class="btn-clear-all mb-sm-30 mb-xs-30">Clear all</button>
                    <!-- btn-clear-all end -->
                    <!-- filter-sub-area start -->
                    <div class="filter-sub-area">
                        <h5 class="filter-sub-titel">Brand</h5>
                        <div class="categori-checkbox">
                            <form action="#">
                                <ul>
                                    <li><input type="checkbox" name="product-categori"><a href="#">Prime Video (13)</a></li>
                                    <li><input type="checkbox" name="product-categori"><a href="#">Computers (12)</a></li>
                                    <li><input type="checkbox" name="product-categori"><a href="#">Electronics (11)</a></li>
                                </ul>
                            </form>
                        </div>
                    </div>
                    <!-- filter-sub-area end -->
                    <!-- filter-sub-area start -->
                    <div class="filter-sub-area pt-sm-10 pt-xs-10">
                        <h5 class="filter-sub-titel">Categories</h5>
                        <div class="categori-checkbox">
                            <form action="#">
                                <ul>
                                    <li><input type="checkbox" name="product-categori"><a href="#">Graphic Corner (10)</a></li>
                                    <li><input type="checkbox" name="product-categori"><a href="#"> Studio Design (6)</a></li>
                                </ul>
                            </form>
                        </div>
                    </div>
                    <!-- filter-sub-area end -->
                    <!-- filter-sub-area start -->
                    <div class="filter-sub-area pt-sm-10 pt-xs-10">
                        <h5 class="filter-sub-titel">Size</h5>
                        <div class="size-checkbox">
                            <form action="#">
                                <ul>
                                    <li><input type="checkbox" name="product-size"><a href="#">S (3)</a></li>
                                    <li><input type="checkbox" name="product-size"><a href="#">M (3)</a></li>
                                    <li><input type="checkbox" name="product-size"><a href="#">L (3)</a></li>
                                    <li><input type="checkbox" name="product-size"><a href="#">XL (3)</a></li>
                                </ul>
                            </form>
                        </div>
                    </div>
                    <!-- filter-sub-area end -->
                    <!-- filter-sub-area start -->
                    <div class="filter-sub-area pt-sm-10 pt-xs-10">
                        <h5 class="filter-sub-titel">Color</h5>
                        <div class="color-categoriy">
                            <form action="#">
                                <ul>
                                    <li><span class="white"></span><a href="#">White (1)</a></li>
                                    <li><span class="black"></span><a href="#">Black (1)</a></li>
                                    <li><span class="Orange"></span><a href="#">Orange (3) </a></li>
                                    <li><span class="Blue"></span><a href="#">Blue (2) </a></li>
                                </ul>
                            </form>
                        </div>
                    </div>
                    <!-- filter-sub-area end -->
                    <!-- filter-sub-area start -->
                    <div class="filter-sub-area pt-sm-10 pb-sm-15 pb-xs-15">
                        <h5 class="filter-sub-titel">Dimension</h5>
                        <div class="categori-checkbox">
                            <form action="#">
                                <ul>
                                    <li><input type="checkbox" name="product-categori"><a href="#">40x60cm (6)</a></li>
                                    <li><input type="checkbox" name="product-categori"><a href="#">60x90cm (6)</a></li>
                                    <li><input type="checkbox" name="product-categori"><a href="#">80x120cm (6)</a></li>
                                </ul>
                            </form>
                        </div>
                    </div>
                    <!-- filter-sub-area end -->
                </div>
                <!--sidebar-categores-box end  -->
                <!-- category-sub-menu start -->
                <div class="sidebar-categores-box mb-sm-0">
                    <div class="sidebar-title">
                        <h2>Laptop</h2>
                    </div>
                    <div class="category-tags">
                        <ul>
                            <li><a href="# ">Devita</a></li>
                            <li><a href="# ">Cameras</a></li>
                            <li><a href="# ">Sony</a></li>
                            <li><a href="# ">Computer</a></li>
                            <li><a href="# ">Big Sale</a></li>
                            <li><a href="# ">Accessories</a></li>
                        </ul>
                    </div>
                    <!-- category-sub-menu end -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Content Wraper Area End Here -->
<!-- Begin Footer Area -->
@endsection