@extends('layout.admin')
@section('title')
    Thêm sản phẩm
@endsection
@section('content')
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('admins/slider/create.css') }}">

    <style>

    </style>
@endsection

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    @include('adminPatials.content_header',['name'=>'Slider','key' =>'Add'])

    <form method="POST" action="{{ route('slider.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="content">
            <div class="container-fluid">
                <div class="row pl-10">
                    <div class="col-md-6 ">
                        <div class="form-group">
                            <label>Tên Slider</label>
                            <input type="text" name="name" class="form-control" @error('name') is-invalid @enderror
                                placeholder="Nhập tên sản phẩm" value="{{ old('name') }}">
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Thêm ảnh slider</label>
                            <input type="file" class="form-control-file" name="image_path">
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Nội dung Slider</label>
                        <br />
                        <textarea name="description" class="form-comtrol tinymce_editor_init" id="" rows="8"
                            @error('description') is-invalid @enderror>
                        {{ old('description') }}
                        </textarea>
                    </div>
                    @error('description')
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
