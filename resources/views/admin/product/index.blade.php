@extends('layout.admin')
@section('title')
    Add Product
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('admins/product/index.css') }}">
@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="{{ asset('admins/product/index.js') }}"></script>
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @include('adminPatials.content_header',['name'=>'Product','key' =>'list'])


        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 ">
                        <a href="{{ route('product.create') }}" class="btn btn-success float-right m-2 text-white">Add</a>
                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>

                            @foreach ($products as $product)
                                <tbody>
                                    <tr>
                                        <th scope="row"> {{ $product->id }} </th>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ number_format($product->price) }}</td>
                                        <td>
                                            <img class="product_image" src="{{ $product->feature_image_path }}" alt="">
                                        </td>
                                        <td>{{ $product->category->name }}</td>
                                        <td>
                                            <a href="{{ route('product.edit', ['id' => $product->id]) }}"
                                                class="btn btn-default">Edit</a>
                                            <a href="" data-url="{{ route('product.delete', ['id' => $product->id]) }}"
                                                class="btn btn-danger action_delete">Delete</a>
                                        </td>
                                    </tr>
                                </tbody>
                            @endforeach

                        </table>
                    </div>
                    <div class="col-md-12">
                        {{ $products->links() }}
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
