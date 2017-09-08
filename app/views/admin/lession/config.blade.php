@extends('admin.layout.default')
@if(Admin::isAdmin())
@section('title')
{{ $title='Cấu hình độ khó bài tập' }}
@stop

@section('content')
	<!-- inclue Search form -->
	<!-- @include('admin.grade.search') -->

	<div class="row margin-bottom">
		<div class="col-xs-12">
			<a href="{{ action('LessionController@create') }}" class="btn btn-primary">Thêm bài tập</a>
		</div>
	</div>

	<div class="row">
		<div class="col-xs-12">
		  <div class="box">
			<div class="box-header">
			  <h3 class="box-title">Danh sách bài tập</h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body table-responsive no-padding">
			  <table class="table table-hover">
				<tr>
				  <th>STT</th>
				  <th>Tên cài đặt</th>
				  <th>Mô tả</th>
				</tr>
				@foreach($data as $key => $value)
				<tr>
				  <td>#{{ $key + 1 }}</td>
				  <td>{{ $value->title }}</td>
				  <td>{{ $value->description }}</td>
				</tr>
				@endforeach
			  </table>
			</div>
			<!-- /.box-body -->
		  </div>
		  <!-- /.box -->
		</div>
	</div>

@stop
@endif
