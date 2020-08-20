<header>
    <!-- Begin Header Top Area -->
    <div class="header-top">
        <div class="container">
            <div class="row">
                <!-- Begin Header Top Left Area -->
                <div class="col-lg-3 col-md-4">
                    <div class="header-top-left">
                        <ul class="phone-wrap">
                            <li><span>Telephone Enquiry:</span><a href="#">(+123) 123 321 345</a></li>
                        </ul>
                    </div>
                </div>
                <!-- Header Top Left Area End Here -->
                <!-- Begin Header Top Right Area -->
                <div class="col-lg-9 col-md-8">
                    <div class="header-top-right">
                        <ul class="ht-menu">
                            <!-- Begin Setting Area -->
                            <li>
                                <div class="ht-setting-trigger"><span>Account</span></div>
                                <div class="setting ht-setting">
                                    <ul class="ht-setting-list">
                                        @if(Auth::check())
                                        <li><a href="#">{{$email = Auth::user()->email}}</a></li>
                                        <li><a href="{{asset('profile')}}">My Account</a></li>
                                        <li><a href="{{asset('logout')}}">Đăng Xuất</a></li>

                                        @else
                                        <li><a href="{{asset('register')}}">Đăng Ký</a></li>
                                        <li><a href="{{asset('loginn')}}">Đăng Nhập</a></li>

                                        @endif

                                    </ul>
                                </div>
                            </li>
                            <!-- Setting Area End Here -->
                            <!-- Begin Currency Area -->
                            <li>
                                <span class="currency-selector-wrapper">Currency :</span>
                                <div class="ht-currency-trigger"><span>USD $</span></div>
                                <div class="currency ht-currency">
                                    <ul class="ht-setting-list">
                                        <li><a href="#">EUR €</a></li>
                                        <li class="active"><a href="#">USD $</a></li>
                                    </ul>
                                </div>
                            </li>
                            <!-- Currency Area End Here -->
                            <!-- Begin Language Area -->
                            <li>
                                <span class="language-selector-wrapper">Language :</span>
                                <div class="ht-language-trigger"><span>English</span></div>
                                <div class="language ht-language">
                                    <ul class="ht-setting-list">
                                        <li class="active"><a href="#"><img src="images/menu/flag-icon/1.jpg" alt="">English</a></li>
                                        <li><a href="#"><img src="images/menu/flag-icon/2.jpg" alt="">Français</a></li>
                                    </ul>
                                </div>
                            </li>
                            <!-- Language Area End Here -->
                        </ul>
                    </div>
                </div>
                <!-- Header Top Right Area End Here -->
            </div>
        </div>
    </div>
    <!-- Header Top Area End Here -->
    <!-- Begin Header Middle Area -->
    <div class="header-middle pl-sm-0 pr-sm-0 pl-xs-0 pr-xs-0">
        <div class="container">
            <div class="row">
                <!-- Begin Header Logo Area -->
                <div class="col-lg-3">
                    <div class="logo pb-sm-30 pb-xs-30">
                        <a href="index.html">
                            <img src="images/menu/logo/1.jpg" alt="">
                        </a>
                    </div>
                </div>
                <!-- Header Logo Area End Here -->
                <!-- Begin Header Middle Right Area -->
                <div class="col-lg-9 pl-0 ml-sm-15 ml-xs-15">
                    <!-- Begin Header Middle Searchbox Area -->
                    <form action="{{asset('search')}}" method="post" class="hm-searchbox">     
                        <input type="text" name='search' placeholder="Enter your search key ...">
                        <button class="li-btn" type="submit"><i class="fa fa-search"></i></button>
                        {{csrf_field()}}
                    </form>
                    <!-- Header Middle Searchbox Area End Here -->
                    <!-- Begin Header Middle Right Area -->
                    <div class="header-middle-right">
                        <ul class="hm-menu">
                            <!-- Begin Header Middle Wishlist Area -->
                            <li class="hm-wishlist">
                                <a href="{{asset('showwishlist')}}">
                                    <span class="cart-item-count wishlist-item-count">{{Cart::instance('wishlist')->count()}}</span>
                                    <i class="fa fa-heart-o"></i>
                                </a>
                            </li>
                            <!-- Header Middle Wishlist Area End Here -->
                            <!-- Begin Header Mini Cart Area -->
                            @if(Auth::check())
                            <li class="hm-minicart">
                                <div class="hm-minicart-trigger">
                                    <span class="item-icon"></span>
                                    <h6 class="item-text">{{Cart::instance('shopping')->total()}}
                                        <p class="cart-item-count">{{Cart::instance('shopping')->count()}}</p>
                                    </h6>
                                </div>
                                <span></span>
                                <div class="minicart">
                                    <ul class="minicart-product-list">
                                        @foreach($cart as $content)
                                        <li>
                                            <a href="{{asset('showcart')}}" class="minicart-product-image">
                                                <img src="images/product/dthoai/{{$content->options->img}}" alt="cart products">
                                            </a>
                                            <div class="minicart-product-details">
                                                <h6><a href="single-product.html">{{$content->name}}</a></h6>
                                                <span>{{$content->qty}}</span>
                                            </div>
                                            <button class="close" title="Remove">
                                                <a href="{{asset('delete/'.$content->rowId)}}" class="fa fa-close"></a>
                                            </button>
                                        </li>
                                        @endforeach
                                    </ul>
                                    <p class="minicart-total">SUBTOTAL:{{Cart::instance('shopping')->total()}} <span></span></p>
                                    <div class="minicart-button">
                                        <a href="{{asset('showcart/')}}" class="li-button li-button-fullwidth li-button-dark">
                                            <span>Giỏ Hàng</span>
                                        </a>
                                        <a href="{{asset('checkout/')}}" class="li-button li-button-fullwidth">
                                            <span>Thanh Toán</span>
                                        </a>
                                    </div>
                                </div>
                            </li>         
                            @else
                                <li class="hm-minicart">
                                <div class="hm-minicart-trigger">
                                    <span class="item-icon"></span>
                                    <h6 class="item-text"> 0
                                        <p class="cart-item-count">0</p>
                                    </h6>
                                </div>
                                <span></span>
                            </li>
                            
                            @endif
                            <!-- Header Mini Cart Area End Here -->
                        </ul>
                    </div>
                    <!-- Header Middle Right Area End Here -->
                </div>
                <!-- Header Middle Right Area End Here -->
            </div>
        </div>
    </div>
    <!-- Header Middle Area End Here -->
    <!-- Begin Header Bottom Area -->
    <div class="header-bottom header-sticky d-none d-lg-block d-xl-block">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Begin Header Bottom Menu Area -->
                    <div class="hb-menu">
                        <nav>
                            <ul>
                                <li class="dropdown-holder"><a href="{{asset('index')}}">Trang Chủ</a>
                                </li>
                                @foreach($prod as $pro)
                                <li class="megamenu-holder"><a href="{{asset('category'.'/'.$pro->id_ptye)}}">{{$pro->name}}</a>
                                </li>
                                @endforeach
                            </ul>
                        </nav>
                    </div>
                    <!-- Header Bottom Menu Area End Here -->
                </div>
            </div>
        </div>
    </div>
    <!-- Header Bottom Area End Here -->
    <!-- Begin Mobile Menu Area -->
    <div class="mobile-menu-area d-lg-none d-xl-none col-12">
        <div class="container">
            <div class="row">
                <div class="mobile-menu">
                </div>
            </div>
        </div>
    </div>
    <!-- Mobile Menu Area End Here -->
</header>
<!-- Header Area End Here -->
<!-- Begin Slider With Banner Area -->