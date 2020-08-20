@extends('index')
@section('main')
<div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <ul>
                <li><a href="index.html">Home</a></li>
                <li class="active">Checkout</li>
            </ul>
        </div>
    </div>
</div>
<!-- Li's Breadcrumb Area End Here -->
<!--Checkout Area Strat-->
<div class="checkout-area pt-60 pb-30">

    <div class="container">
        @if(Auth::check())
        <h2>Xin chào {{$email = Auth::user()->email}}</h2>
        @else
        <div class="row">
            <div class="col-12">
                <div class="coupon-accordion">
                    <!--Accordion Start-->
                    <h3>Bạn Chưa Đăng Nhập<span id="showlogin">Click here to login</span></h3>
                    <div id="checkout-login" class="coupon-content">
                        <div class="coupon-info">
                            <form action="#" method="post">
                                <p class="form-row-first">
                                    <label>Username or email <span class="required">*</span></label>
                                    <input type="text">
                                </p>
                                <p class="form-row-last">
                                    <label>Password <span class="required">*</span></label>
                                    <input type="text">
                                </p>
                                <p class="form-row">
                                    <input value="Login" type="submit">
                                    <label>
                                        <input type="checkbox">
                                        Remember me
                                    </label>
                                </p>
                                <p class="lost-password"><a href="#">Lost your password?</a></p>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        @endif
        <div class="row">
            <div class="col-lg-6 col-12">
                <form method="post">
                    <div class="checkbox-form">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label>Tên <span class="required">*</span></label>
                                    <input name="name" placeholder="nhâp tên người nhận hàng" type="text">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="checkout-form-list">
                                    <label>Địa Chỉ <span class="required">*</span></label>
                                    <input name="andress" placeholder="Nhập địa chỉ giao hàng" type="text">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label>Email<span class="required">*</span></label>
                                    <input name="email" placeholder="nhập email khách hàng" type="email">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label>Điện Thoại <span class="required">*</span></label>
                                    <input name="phone" placeholder="nhập điện thoại người nhận hàng" type="text">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="checkout-form-list">
                                    <label>Ghi Chú <span class="required">*</span></label>
                                    <input name="note" type="text">
                                </div>
                            </div> <button class="btn btn-info btn-block" value="submit">Thanh Toán</button>
                        </div>
                    </div>

                    {!!csrf_field()!!}
                </form>

            </div>
            <div class="col-lg-6 col-12">
                <div class="your-order">
                    <h3>Hoá Đơn</h3>
                    <div class="your-order-table table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="cart-product-name">Tên Sản Phẩm</th>
                                    <th class="cart-product-total">Số Lượng</th>
                                    <th class="cart-product-total">Giá Tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cart as $data)
                                <tr class="cart_item">
                                    <td class="cart-product-name">{{$data->name}}</td>
                                    <td class="cart-product-total"><span class="amount">{{ $data->qty}}</span></td>
                                    <td class="cart-product-total">{{number_format($data->price) }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr class="order-total">
                                    <th>Tổng Đơn Hàng</th>
                                    <td><strong><span class="amount">{{Cart::total()}}</span></strong></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="payment-method">
                        <div class="payment-accordion">
                            <div id="accordion">
                                <div class="card">
                                    <div class="card-header" id="#payment-1">
                                        <h5 class="panel-title">
                                            <a class="" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                Thanh Toán Chuyển Khoản ngân hàng
                                            </a>
                                        </h5>
                                    </div>
                                    <div id="collapseOne" class="collapse show" data-parent="#accordion">
                                        <div class="card-body">
                                            <p>Chuyển tiền vào tài khoản số</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="#payment-2">
                                        <h5 class="panel-title">
                                            <a class="collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                Thanh toán qua paypal
                                            </a>
                                        </h5>
                                    </div>
                                    <div id="collapseTwo" class="collapse" data-parent="#accordion">
                                        <div class="card-body">
                                            <p>đăng nhập vào paypal để thanh toán</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="#payment-3">
                                        <h5 class="panel-title">
                                            <a class="collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                Thanh toán khi nhận hàng
                                            </a>
                                        </h5>
                                    </div>
                                    <div id="collapseThree" class="collapse" data-parent="#accordion">
                                        <div class="card-body">
                                            <p>Quá trình giao hàng từ 3-5 ngày.Giao các ngày trong tuần</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Checkout Area End-->
@endsection