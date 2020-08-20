@extends('index')
@section('main')
<h2 style="margin-left:45%">Lịch Sử Mua Hàng</h2>
</br>
<div class="container">
        <div class="row">
            <div class="col-12">
                <form action="#">
                    <div class="table-content table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="li-product-thumbnail">Tên Sản Phẩm</th>
                                    <th class="cart-product-price">Số Lượng</th>
                                    <th class="li-product-price">Đơn Giá</th>
                                    <th class="li-product-add-cart">Thời Gian</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($historybill as $data)
                                <tr>
                                    <td class="li-product-name">{{$data->product_name}}</td>
                                    <td class="li-product-price"><span class="amount">{{$data->quantity}}</span></td>
                                    <td class="li-product-price">{{$data->price}}</td>
                                    <td class="li-product-price">{{$data->created_at}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection