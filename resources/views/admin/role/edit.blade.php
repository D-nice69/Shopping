@extends('layout.admin')
@section('title')
    Add role
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('admins/role/create.css') }}">
@endsection
@section('js')
    <script src="{{ asset('admins/role/create.js') }}"> </script>
@endsection
@section('content')


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @include('adminPatials.content_header',['name'=>'Role','key' =>'Edit'])

        <form method="POST" action="{{ route('role.update', ['id' => $roles->id]) }}" enctype="multipart/form-data">
            @csrf
            <div class="content">
                <div class="container-fluid">
                    <div class="row pl-10">

                        <div class="col-md-6 ">
                            <div class="form-group">
                                <label>Tên vai trò</label>
                                <input type="text" class="form-control" @error('name') is-invalid @enderror name="name"
                                    placeholder="Nhập tên vai trò" value="{{ $roles->name }}">
                                @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Mô tả vai trò</label>
                                <textarea type="text" class="form-control" name="display_name"
                                    placeholder="Nhập mô tả vai trò" @error('display_name') is-invalid @enderror
                                    rows="4">{{ $roles->display_name }}</textarea>
                                @error('display_name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="">
                                        <input type="checkbox" class="check_all">
                                        check all
                                    </label>
                                </div>
                                @foreach ($permissionParent as $permissionParentItem)
                                    <div class="card border-primary mb-3 col-md-12">
                                        <div class="card-header ">
                                            <label for="">
                                                <input type="checkbox" value="" class="checkbox_parent">
                                            </label>
                                            Module {{ $permissionParentItem->name }}
                                        </div>
                                        <div class="row">
                                            @foreach ($permissionParentItem->permissionChildrent as $permissionChildrentItem)
                                                <div class="card-body text-primary col-md-3">
                                                    <h5 class="card-title">
                                                        <label>
                                                            <input name="permission_id[]" type="checkbox"
                                                                {{ $permissionChecked->contains('id', $permissionChildrentItem->id) ? 'checked' : '' }}
                                                                value="{{ $permissionChildrentItem->id }}"
                                                                class="checkbox_childrent">
                                                        </label>
                                                        {{ $permissionChildrentItem->name }}
                                                    </h5>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach
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
