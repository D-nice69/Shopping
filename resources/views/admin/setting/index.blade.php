@extends('layout.admin')
@section('title')
    Trang chủ
@endsection
@section('css')
<link rel="stylesheet" href="{{ asset('admins/setting/index.css') }}">

@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @include('adminPatials.content_header',['name'=>'Setting','key' =>'list'])


        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 ">
                        <div class="btn-group float-right">
                            <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                                Action
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ route('setting.create').'?type=Text' }}">text</a></li>
                                <li><a href="{{ route('setting.create').'?type=Textarea' }}">textarea</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Config key</th>
                                    <th scope="col">Config value</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>

                            {{-- @foreach ($menus as $menu) --}}
                                <tbody>
                                    <tr>
                                        <th scope="row"></th>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <a href="" class="btn btn-default">Edit</a>
                                            <a href="" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                </tbody>
                            {{-- @endforeach --}}

                        </table>
                    </div>
                    <div class="col-md-12">
                        {{-- {{ $menus->links() }} --}}
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
