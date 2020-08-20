@extends('index')
@section('main')
<link href="css/bootstrap.min.css" rel="stylesheet">
<!-- Fonts Icon CSS -->
<link href="css/font-awesome.min.css" rel="stylesheet">
<link href="css/et-line.css" rel="stylesheet">
<link href="css/ionicons.min.css" rel="stylesheet">
<!-- Carousel CSS -->
<link href="css/slick.css" rel="stylesheet">
<!-- Magnific-popup -->
<link rel="stylesheet" href="css/magnific-popup.css">
<!-- Animate CSS -->
<link rel="stylesheet" href="css/animate.min.css">
<!-- Custom styles for this template -->
<link href="css/main.css" rel="stylesheet">
<div class="body-container container-fluid">
    <a class="menu-btn" href="javascript:void(0)">
        <i class="ion ion-grid"></i>
    </a>
    <div class="row justify-content-center">
        <!--=================== side menu ====================-->
        <div class="col-lg-2 col-md-3 col-12 menu_block">

            <!--logo -->
            <div class="logo_box">
                <a href="#">
                    <img src="assets/profile/assets/img/logo.png" alt="cocoon">
                </a>
            </div>
            <!--logo end-->

            <!--main menu -->
            <div class="side_menu_section">
                <ul class="menu_nav">
                    <li>
                        <a href="{{asset('/')}}">
                            Trang Chủ
                        </a>
                    </li>
                    <li class="active">
                        <a href="index.html">
                            Thông Tin Cá Nhân
                        </a>
                    </li>
                    <li>
                        <a href="{{asset('showcart')}}">
                            Thông tin đơn hàng
                        </a>
                    </li>
                    <li>
                        <a href="{{asset('showwishlist')}}">
                            Sản phẩm ưa thích
                        </a>
                    </li>
                    <li>
                        <a href="{{asset('historybill')}}">
                            Lịch sử mua hàng
                        </a>
                    </li>
                    <li>
                        <a href="">
                            Khuyến mãi cho bạn
                        </a>
                    </li>
                </ul>
            </div>
            <!--main menu end -->

            <!--social and copyright -->
            <div class="side_menu_bottom">
                <div class="side_menu_bottom_inner">
                    <ul class="social_menu">
                        <li>
                            <a href="#"> <i class="ion ion-social-pinterest"></i> </a>
                        </li>
                        <li>
                            <a href="#"> <i class="ion ion-social-facebook"></i> </a>
                        </li>
                        <li>
                            <a href="#"> <i class="ion ion-social-twitter"></i> </a>
                        </li>
                        <li>
                            <a href="#"> <i class="ion ion-social-dribbble"></i> </a>
                        </li>
                    </ul>
                    <div class="copy_right">
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        <p class="copyright">Copyright &copy;<script>
                                document.write(new Date().getFullYear());
                            </script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a></p>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </div>
                </div>
            </div>
            <!--social and copyright end -->

        </div>
        <!--=================== side menu end====================-->

        <!--=================== content body ====================-->
        <div class="col-lg-10 col-md-9 col-12 body_block  align-content-center">
            <div class="portfolio">
                <div class="container-fluid">
                    <div class="col-md-6">
                        <div class="checkout-form-list">
                            <H3>Thông Tin Cá Nhân</H3>
                            @foreach($profile as $data)
                            <label>Tên <span class="required">*</span></label>
                            <p>{{$data->user_name}}</p>
                            <label>Năm Sinh <span class="required">*</span></label>
                            <p>{{$data->date}}</p>
                            <label>Địa Chỉ <span class="required">*</span></label>
                            <p>{{$data->user_andress}}</p>
                            <label>Số Điện Thoại<span class="required">*</span></label>
                            <p>{{$data->user_phone}}</p>
                            @endforeach
                        </div>
                        <button class ="btn btn-danger" >Cập Nhật Thông Tin</button>
                        <button class ="btn btn-danger" >Xoá Thông Tin</button>
                    </div>
                </div>
            </div>
        </div>
        <!--=================== content body end ====================-->
    </div>
</div>


<!-- jquery -->
<script src="js/jquery.min.js"></script>
<!-- bootstrap -->
<script src="js/popper.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/waypoints.min.js"></script>
<!--slick carousel -->
<script src="js/slick.min.js"></script>
<!--Portfolio Filter-->
<script src="js/imgloaded.js"></script>
<script src="js/isotope.js"></script>
<!-- Magnific-popup -->
<script src="js/jquery.magnific-popup.min.js"></script>
<!--Counter-->
<script src="js/jquery.counterup.min.js"></script>
<!-- WOW JS -->
<script src="js/wow.min.js"></script>
<!-- Custom js -->
<script src="js/main.js"></script>
@endsection