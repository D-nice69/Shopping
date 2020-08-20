@extends('admin.index')
@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Danh mục sản phẩm</h1>
		</div>
	</div>
	<!--/.row-->

	<div class="row">
		<div class="col-xs-12 col-md-5 col-lg-5">
			<div class="panel panel-primary">
				<div class="panel-heading">
					Sửa danh mục
				</div>
				@if ( Session::has('success') )
				<div class="alert alert-success alert-dismissible" role="alert">
					<strong>{{ Session::get('success') }}</strong>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						<span class="sr-only">Close</span>
					</button>
				</div>
				@endif
				<?php //Hiển thị thông báo lỗi
				?>
				@if ( Session::has('error') )
				<div class="alert alert-danger alert-dismissible" role="alert">
					<strong>{{ Session::get('error') }}</strong>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						<span class="sr-only">Close</span>
					</button>
				</div>
				@endif
				@if ($errors->any())
				<div class="alert alert-danger alert-dismissible" role="alert">
					<ul>
						@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
						@endforeach
					</ul>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						<span class="sr-only">Close</span>
					</button>
				</div>
				@endif
				<form method="post">
					<div class="form-group">
						<label>Cate_id</label>
						<input type="text" name="id" class="form-control" value="{{$category_edit->cate_id}}">
					</div>
					<div class="form-group">
						<label>id_ptye</label>
						<input type="text" name="id_pye" class="form-control" value="{{$category_edit->id_ptye}}">
					</div>
					<div class="form-group">
						<label>Cate_name</label>
						<input type="text" name="name" class="form-control" value="{{$category_edit->cate_name}}">
					</div>
					<div class="form-group">
						<label>cate_slug</label>
						<input type="text" name="slug" class="form-control" value="{{$category_edit->cate_slug}}">
					</div>
					<div class="form-group">
						<label>parent</label>
						<input type="text" name="parent" class="form-control" value="{{$category_edit->cate_parent}}">
					</div>

					<div class="form-group">
						<input type="submit" name="subit" class="form-control btn btn-primary" value="Sửa">
					</div>
					<div class="form-group">
						<a href="{{asset('admin/category')}}" class="form-control btn btn-danger"> Huỷ Bỏ</a>
					</div>
			</div>
			{{csrf_field()}}
			</form>
		</div>
	</div>
</div>
<!--/.row-->
</div>
<!--/.main-->
@endsection