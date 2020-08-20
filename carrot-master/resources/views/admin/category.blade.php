@extends('admin.index')
@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tables vp_Categories</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables</h6>
         </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>cate_id</th>
                            <th>id_ptye</th>
                            <th>cate_name</th>
                            <th>cate_slug</th>
                            <th>parent</th>
                            <th>created_at</th>
                            <th>updated_at</th>
                            <th>Sửa</th>
                           <th>Xoá</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($category as $data)
                        <tr>
                            <td>{{$data->cate_id}}</td>
                            <td>{{$data->id_ptye}}</td>
                            <td>{{$data->cate_name}}</td>
                            <td>{{$data->cate_slug}}</td>
                            <td>{{$data->parent}}</td>
                            <td>{{$data->created_at}}</td>
                            <td>{{$data->updated_at}}</td>
                            <td><button id="show" class="btn btn-outline-warning"><a href="{{asset('admin/category/edit/'.$data->cate_id)}}">Sửa</a></button></td>
                            <td><button class="btn btn-outline-danger"><a href="{{asset('admin/category/delete/'.$data->cate_id)}}">Xoá</a></button></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection