@extends('admin.layout.default')
@if(Admin::isAdmin())
@section('title')
{{ $title='Danh sách các dạng câu hỏi' }}
@stop


@section('content')
	<!-- inclue Search form -->
	<!-- @include('admin.grade.search') -->

	<div class="row margin-bottom">
		<div class="col-xs-12">
			<a href="{{ action('QuestionTypeController@refresh') }}" class="btn btn-primary">Làm mới danh sách</a>
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
				  <th style="width: 60px">STT</th>
				  <th>Mã dạng bài</th>
				  <th>Tên</th>
				  <th>Mô tả</th>
				  <th>Action</th>
				</tr>
				@foreach($data as $key => $value)
					<?php $config = !empty($value->data) ? json_decode($value->data, true) : []; ?>
					<tr>
					  <td>#{{ $key + 1 + ($data->getPerPage() * ($data->getCurrentPage() - 1)) }}</td>
					  <td>{{ $config['key'] or '' }}</td>
					  <td>{{ $config['name'] or '' }}</td>
					  <td>{{ $config['description'] or '' }}</td>
					  <td>
						<a href="{{ action('QuestionTypeController@edit', !empty($config['key']) ? $config['key'] : 'none') }}" class="btn btn-primary">Sửa</a>
					  </td>
					</tr>
				@endforeach
			  </table>
			</div>
			<!-- /.box-body -->
		  </div>
		  <!-- /.box -->
		</div>
	</div>

	<div class="row">
		<div class="col-xs-12 text-center">
			{{ $data->appends(Request::except('page'))->links() }}
		</div>
	</div>

@stop
@endif
