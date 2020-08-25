@extends('layout.admin')
@section('title')
    Roles list
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('admins/create_index_image_css/index_image.css') }}">
@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="{{ asset('admins/delete_index/delete_index.js') }}"></script>
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @include('adminPatials.content_header',['name'=>'Role','key' =>'list'])


        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 ">
                        <a href="{{ route('role.create') }}" class="btn btn-success float-right m-2 text-white">Add</a>
                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Display Name</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>

                            @foreach ($roles as $role)
                                <tbody>
                                    <tr>
                                        <th scope="row"> {{ $role->id }} </th>
                                        <td>{{ $role->name }}</td>
                                        <td>{{ $role->display_name }}</td>
                                        <td>
                                            <a href="{{ route('role.edit', ['id' => $role->id]) }}"
                                                class="btn btn-default">Edit</a>
                                            {{-- <a href="" data-url="{{ route('product.delete', ['id' => $product->id]) }}"
                                                class="btn btn-danger action_delete">Delete</a> --}}
                                        </td>
                                    </tr>
                                </tbody>
                            @endforeach

                        </table>
                    </div>
                    <div class="col-md-12">
                        {{ $roles->links() }}
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
