@extends('layout.admin')
@section('title')
    Thêm sản phẩm
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @include('adminPatials.content_header',['name'=>'Category','key' =>'add'])


        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row pl-10">
                    <div class="col-md-6 ">
                        <form method="POST" action="{{ route('menu.update',['id'=>$menuEdit->id]) }}">
                            @csrf
                            <div class="form-group">
                                <label>Tên Menu</label>
                                <input type="text" class="form-control" name="name" value="{{ $menuEdit->name }}">
                            </div>
                            <div class="form-group">
                                <label>Chọn Menu cha</label>
                                <select class="form-control" name="parent_id">
                                    <option value="0">Chọn Menu cha</option>
                                    {!! $htmlOption !!}
                                </select>
                                <br>
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
