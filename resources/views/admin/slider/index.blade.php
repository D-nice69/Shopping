@extends('layout.admin')
@section('title')
    Sliders list
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('admins/create_index_image_css/index_image.css') }}">
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @include('adminPatials.content_header',['name'=>'Slider','key' =>'list'])


        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 ">
                        <a href="{{ route('slider.create') }}" class="btn btn-success float-right m-2 text-white">Add</a>
                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Slider's Name</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>

                            @foreach ($sliders as $slider)
                                <tbody>
                                    <tr>
                                        <th scope="row">{{ $slider->id }}</th>
                                        <td>{{ $slider->name }}</td>
                                        <td><?php echo strip_tags($slider->description); ?>
                                        </td>
                                        <td><img class="index_image" src="{{ $slider->image_path }}" alt=""></td>
                                        <td>
                                            <a href="{{ route('slider.edit',['id'=>$slider->id]) }}" class="btn btn-default">Edit</a>
                                            <a href="" data-url="{{ route('slider.delete', ['id' => $slider->id]) }}"
                                                class="btn btn-danger action_delete">Delete</a>
                                        </td>
                                    </tr>
                                </tbody>
                            @endforeach

                        </table>
                    </div>
                    <div class="col-md-12">
                        {{ $sliders->links() }}
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="{{ asset('admins/delete_index/delete_index.js') }}"></script>
@endsection
