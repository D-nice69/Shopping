@extends('layout.admin')
@section('title')
    Trang chủ
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @include('adminPatials.content_header',['name'=>'Menu','key' =>'list'])


        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 ">
                        <a href="{{ route('menu.create') }}" class="btn btn-success float-right m-2 text-white">Add</a>
                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Menu's Name</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>

                            @foreach ($menus as $menu)
                                <tbody>
                                    <tr>
                                        <th scope="row">{{ $menu->id }}</th>
                                        <td>{{ $menu->name }}</td>
                                        <td>
                                            <a href="{{ route('menu.edit',['id'=>$menu->id]) }}" class="btn btn-default">Edit</a>
                                            <a href="{{ route('menu.delete',['id'=>$menu->id]) }}" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                </tbody>
                            @endforeach

                        </table>
                    </div>
                    <div class="col-md-12">
                        {{ $menus->links() }}
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection