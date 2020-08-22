@extends('layout.admin')
@section('title')
    Thêm sản phẩm
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @include('adminPatials.content_header',['name'=>'Menu','key' =>'Add'])


        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row pl-10">
                    <div class="col-md-6 ">
                        <form method="POST" action="">
                            @csrf
                            <div class="form-group">
                                <label>Tên Config key</label>
                                <input type="text" class="form-control" name="config_key" placeholder="Nhập config key">
                            </div>
                            @if (request()->type === 'Text')
                                <div class="form-group">
                                    <label>Tên Config value</label>
                                    <input type="text" class="form-control" name="config_value"
                                        placeholder="Nhập config value">
                                </div>
                            @elseif(request()->type === 'Textarea')
                                <div class="form-group">
                                    <label>Tên Config value</label>
                                    <textarea class="form-control" name="config_value" placeholder="Nhập config value"
                                        rows="5"></textarea>
                                </div>
                            @endif
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                    </div>
                    </form>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
