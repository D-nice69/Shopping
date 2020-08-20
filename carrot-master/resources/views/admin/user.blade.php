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
                            <th>id</th>
                            <th>email</th>
                            <th>password</th>
                            <th>level</th>
                            <th>remember_token</th>
                            <th>created_at</th>
                            <th>updated_at</th>
                            <th>Sửa</th>
                            <th>Xoá</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($user as $data)
                        <tr>
                            <td>{{$data->id}}</td>
                            <td>{{$data->email}}</td>
                            <td>{{$data->password}}</td>
                            <td>{{$data->level}}</td>
                            <td>{{$data->remember_token}}</td>
                            <td>{{$data->created_at}}</td>
                            <td>{{$data->updated_at}}</td>
                            <td><button id="show" class="btn btn-outline-warning"><a href="{{asset('admin/user/edit/'.$data->id)}}">Sửa</a></button></td>
                            <td><button class="btn btn-outline-danger"><a href="{{asset('admin/user/delete/'.$data->id)}}">Xoá</a></button></td>
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