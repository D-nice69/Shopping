@extends('layout.admin')
@section('title')
    Thêm sản phẩm
@endsection
@section('content')
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
     <link rel="stylesheet" href="{{ asset('admins/product/edit.css') }}">

@endsection

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    @include('adminPatials.content_header',['name'=>'product','key' =>'Edit'])


    <!-- Main content -->
    <form method="POST" action="{{ route('product.update', ['id' => $product->id]) }}" enctype="multipart/form-data">
        @csrf
        <div class="content">
            <div class="container-fluid">
                <div class="row pl-10">
                    <div class="col-md-6 ">
                        <div class="form-group">
                            <label>Tên sản phẩm</label>
                            <input type="text" class="form-control" name="name" placeholder="Nhập tên sản phẩm"
                                value="{{ $product->name }}">
                        </div>
                        <div class="form-group">
                            <label>Giá sản phẩm</label>
                            <input type="text" class="form-control" name="price" placeholder="Nhập giá sản phẩm"
                                value="{{ $product->price }}">
                        </div>
                        <div class="form-group">
                            <label>Thêm ảnh đại diện</label>
                            <input type="file" class="form-control-file" name="feature_image_path">
                            <div class="col-md-12 image_container">
                                <div class="row">
                                    <img class="" src="{{ $product->feature_image_path }}" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Thêm ảnh chi tiết</label>
                            <input type="file" class="form-control-file" multiple name="image_path[]">
                            <div class="col-md-12 image_container">
                                <div class="row">
                                    @foreach ($product->productImage as $productImageItem)
                                        <div class="col-md-3">
                                            <img class="image_detail_product" src="{{ $productImageItem->image_path }}"
                                                alt="">
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                        </div>
                        <div class="form-group">
                            <label>Chọn tag sản phẩm</label>
                            <br />
                            <select class="form-control tags-select-choose" multiple="multiple" name="tags[]">
                                @foreach ($product->tags as $tagItem)
                                    <option class="" value="{{ $tagItem->name }}" selected>{{ $tagItem->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Chọn sản phẩm cha</label>
                            <select class="form-control " name="category_id">
                                <option value="">Chọn sản phẩm cha</option>
                                {!! $htmlOption !!}
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Nội dung sản phẩm</label>
                            <br />
                            <textarea name="contents" class="form-comtrol tinymce_editor_init" id="" cols="72" rows="8">
                            {{ $product->content }}
                            </textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>

                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
    </form>

    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
@section('js')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script src="{{ asset('admins/textarea/textarea.js') }}"> </script>
@endsection
