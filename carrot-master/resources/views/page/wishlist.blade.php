@extends('index')
@section('main')

<!-- Header Area End Here -->
<!-- Begin Li's Breadcrumb Area -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <ul>
                <li><a href="index.html">Home</a></li>
                <li class="active">Wishlist</li>
            </ul>
        </div>
    </div>
</div>
<!-- Li's Breadcrumb Area End Here -->
<!--Wishlist Area Strat-->
<div class="wishlist-area pt-60 pb-60">
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
                                    <th class="li-product-add-cart">add to cart</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cart as $data)
                                <tr>
                                    <td class="li-product-remove"><a href="{{asset('delete/'.$data->id)}}"><i class="fa fa-times"></i></a></td>
                                    <td class="li-product-thumbnail"><a href="{{asset('product/'.$data->id)}}"><img style="width:300px;height:300px" src="images/product/dthoai/{{$data->options->img}}" alt=""></a></td>
                                    <td class="li-product-name"><a href="{{asset('product/'.$data->id)}}">{{$data->name}}</a></td>
                                    <td class="li-product-price"><span class="amount">{{$data->price}}</span></td>
                                    <td class="li-product-add-cart"><a href="{{asset('addcart/'.$data->id)}}">add to cart</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--Wishlist Area End-->
@endsection