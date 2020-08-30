@extends('layout.admin')
@section('title')
    Add permission
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @include('adminPatials.content_header',['name'=>'Permission','key' =>'Add'])
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row pl-10">
                    <div class="col-md-12 ">
                        <form method="POST" action="{{ route('permission.store') }}">
                            @csrf
                            <div class="form-group">
                                <label>Chọn tên module</label>
                                <select class="form-control" name="module_parent">
                                    <option value="">Chọn tên module</option>
                                    @foreach (config('permissions.table_module') as $moduleItem)
                                        <option value="{{ $moduleItem }}">{{ $moduleItem }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    @foreach(config('permissions.module_childrent') as $moduleChildrent)
                                    <div class="col-md-3">
                                        <label for="">
                                            <input type="checkbox" name="module_childrent[]" value="{{ $moduleChildrent }}">
                                            {{ $moduleChildrent }}
                                        </label>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
