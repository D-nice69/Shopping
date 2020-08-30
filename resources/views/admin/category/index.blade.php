@extends('layout.admin')
@section('title')
    Categories List
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @include('adminPatials.content_header',['name'=>'Category','key' =>'list'])


        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 ">
                        @can('category-add')
                            <a href="{{ route('category.create') }}" class="btn btn-success float-right m-2 text-white">Add</a>
                        @endcan
                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>

                            @foreach ($categories as $category)
                                <tbody>
                                    <tr>
                                        <th scope="row">{{ $category->id }}</th>
                                        <td>{{ $category->name }}</td>
                                        <td>
                                            @can('category-edit')
                                                <a href="{{ route('category.edit', ['id' => $category->id]) }}"
                                                    class="btn btn-default">Edit</a>
                                            @endcan
                                            @can('category-delete')
                                                <a href="{{ route('category.delete', ['id' => $category->id]) }}"
                                                    class="btn btn-danger">Delete</a>
                                            @endcan
                                        </td>
                                    </tr>
                                </tbody>
                            @endforeach

                        </table>
                    </div>
                    <div class="col-md-12">
                        {{ $categories->links() }}
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
