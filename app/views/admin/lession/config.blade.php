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
			<a href="{{ action('ConfLessionController@create') }}" class="btn btn-primary">Thêm độ khó</a>
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
					<th>Mã cài đặt</th>
					<th>Tên cài đặt</th>
					<th>Số câu</th>
					<th>Thang điểm</th>
					<th>Điểm trừ</th>
					<th>Mô tả</th>
					<th style="width:150px;">Action</th>
				</tr>
				@foreach($data as $key => $value)
					<?php
						$config = Common::getObject($value, 'data');
					?>
					<tr>
						<td>#{{ $key+1 }}</td>
						<td>{{ $value->name }}</td>
						<td>{{ !empty($config['name']) ? $config['name'] : '' }}</td>
						<td>{{ !empty($config['number_ques']) ? $config['number_ques'] : '' }}</td>
						<td>{{ !empty($config['max_score']) ? $config['max_score'] : '' }}</td>
						<td>{{ !empty($config['minus_score']) ? $config['minus_score'] : '' }}</td>
						<td>{{ !empty($config['description']) ? $config['description'] : '' }}</td>
						<td>
							<a href="{{ action('ConfLessionController@edit', $value->name) }}" class="btn btn-primary">Sửa</a>
							{{ Form::open(array('method'=>'DELETE', 'action' => array('ConfLessionController@destroy', $value->name), 'style' => 'display: inline-block;')) }}
								<button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?');">Xóa</button>
							{{ Form::close() }}
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

@stop
@endif
