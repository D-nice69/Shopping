@extends('layout.admin')
@section('title')
    Thêm sản phẩm
@endsection
@section('content')
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('admins/product/create.css') }}">

    <style>

    </style>
@endsection

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    @include('adminPatials.content_header',['name'=>'product','key' =>'Add'])

    <form method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="content">
            <div class="container-fluid">
                <div class="row pl-10">

                    <div class="col-md-6 ">
                        <div class="form-group">
                            <label>Tên sản phẩm</label>
                            <input type="text" class="form-control" @error('name') is-invalid @enderror name="name"
                                placeholder="Nhập tên sản phẩm" value="{{ old('name') }}">
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Giá sản phẩm</label>
                            <input type="text" class="form-control" name="price" placeholder="Nhập giá sản phẩm"
                                @error('price') is-invalid @enderror value="{{ old('price') }}">
                            @error('price')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Thêm ảnh đại diện</label>
                            <input type="file" class="form-control-file" name="feature_image_path">
                        </div>
                        <div class="form-group">
                            <label>Thêm ảnh chi tiết</label>
                            <input type="file" class="form-control-file" multiple name="image_path[]">
                        </div>
                        <div class="form-group">
                            <label>Chọn tag sản phẩm</label>
                            <br />
                            <select class="form-control tags-select-choose" multiple="multiple" name="tags[]"
                                @error('tags') is-invalid @enderror>
                                <option class="" value=""></option>
                            </select>
                            @error('tags')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Chọn sản phẩm cha</label>
                            <select class="form-control " name="category_id" @error('category_id') is-invalid @enderror>
                                <option value="">Chọn sản phẩm cha</option>
                                {!! $htmlOption !!}
                            </select>
                            @error('category_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Nội dung sản phẩm</label>
                            <br />
                            <textarea name="contents" class="form-comtrol tinymce_editor_init" id=""
                                rows="8" @error('contents') is-invalid @enderror>
                            {{ old('contents') }}
                            </textarea>
                        </div>
                        @error('contents')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
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
