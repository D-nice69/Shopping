@extends('layout.admin')
@section('title')
    Thêm sản phẩm
@endsection
@section('content')
@section('css')
    <link rel="stylesheet" href="{{ asset('admins/setting/create.css') }}">
@endsection
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    @include('adminPatials.content_header',['name'=>'Setting','key' =>'Edit'])


    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row pl-10">
                <div class="col-md-6 ">
                    <form method="POST" action="{{ route('setting.update',['id'=>$setting->id]) }}">
                        @csrf
                        <div class="form-group">
                            <label>Tên Config key</label>
                            <input type="text" class="form-control" name="config_key" value="{{ $setting->config_key }}"
                                @error('config_key') is-invalid @enderror>
                            @error('config_key')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        @if (request()->type === 'Text')
                            <div class="form-group">
                                <label>Tên Config value</label>
                                <input type="text" class="form-control" name="config_value"
                                    value="{{ $setting->config_value }}" @error('config_value') is-invalid @enderror>
                                @error('config_value')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        @elseif(request()->type === 'Textarea')
                            <div class="form-group">
                                <label>Tên Config value</label>
                                <textarea class="form-control" name="config_value" rows="5" @error('config_value')
                                    is-invalid @enderror>{{ $setting->config_value }}</textarea>
                                @error('config_value')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
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
