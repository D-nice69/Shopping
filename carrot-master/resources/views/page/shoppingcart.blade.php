@extends('index')
@section('main')
<script>
    function updateCart(qty,rowId){
        $.get(
            '{{asset('update')}}',
            {qty:qty,rowId:rowId},
            function(){
                location.reload();
            }
        );
    }
</script>
<!-- Begin Li's Breadcrumb Area -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <ul>
                <li><a href="index.html">Home</a></li>
                <li class="active">Shopping Cart</li>
            </ul>
        </div>
    </div>
</div>
<!-- Li's Breadcrumb Area End Here -->
<!--Shopping Cart Area Strat-->
<div class="Shopping-cart-area pt-60 pb-60">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="#">
                    <div class="table-content table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="li-product-remove">remove</th>
                                    <th class="li-product-thumbnail">images</th>
                                    <th class="cart-product-name">Product</th>
                                    <th class="li-product-price">Unit Price</th>
                                    <th class="li-product-quantity">Quantity</th>
                                    <th class="li-product-subtotal">Total</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($cart as $data)
                                <tr>
                                    <td class="li-product-remove"><a href="{{asset('delete/'.$data->rowId)}}"><i class="fa fa-times"></i></a></td>
                                    <td class="li-product-thumbnail"><a href="{{asset('product/'.$data->id)}}"><img style="width:300px;height:300px" src="images/product/dthoai/{{$data->options->img}}" alt="Li's Product Image"></a></td>
                                    <td class="li-product-name"><a href="#">{{$data->name}}</a></td>
                                    <td class="li-product-price"><span class="amount">{{number_format($data->price)}}</span></td>
                                    <td class="quantity">
                                        <label>Quantity</label>
                                        <div class="cart-plus-minus">
                                            <input class="cart-plus-minus-box" value="{{$data->qty}}" type="text" onchange="updateCart(this.value,'{{$data->rowId}}')">
                                            <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                            <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                        </div>
                                    </td>
                                    <td class="product-subtotal"><span class="amount">{{number_format($data->price*$data->qty)}}</span></td>
                                </tr>
                                @endforeach
                            </tbody>
                            
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="coupon-all">
                                <div class="coupon">
                                    <input class="button" name="apply_coupon" value="Xoá Giỏ Hàng" type="submit">
                                </div>
                                <div class="coupon2">
                                    <input class="button" name="update_cart" value="Update cart" type="submit">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5 ml-auto">
                            <div class="cart-page-total">
                                <h2>Cart totals</h2>
                                <ul>
                                    <li>Total <span>{{Cart::total()}}</span></li>
                                </ul>
                                <a href="#">Thanh Toán</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--Shopping Cart Area End-->
<!-- Begin Footer Area -->
@endsection