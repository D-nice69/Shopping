@extends('layout.admin')
@section('title')
    Add role
@endsection
@section('css')
<link rel="stylesheet" href="{{ asset('admins/role/create.css') }}">

@endsection
@section('content')


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    @include('adminPatials.content_header',['name'=>'Role','key' =>'Add'])

    <form method="POST" action="{{ route('role.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="content">
            <div class="container-fluid">
                <div class="row pl-10">

                    <div class="col-md-6 ">
                        <div class="form-group">
                            <label>Role's name</label>
                            <input type="text" class="form-control" @error('name') is-invalid @enderror name="name"
                                placeholder="Nhập tên role" value="{{ old('name') }}">
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Display name</label>
                            <input type="text" class="form-control" name="display_name" placeholder="Nhập Display name"
                                @error('display_name') is-invalid @enderror value="{{ old('display_name') }}">
                            @error('display_name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
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

