<?php 
$config = !empty($data->data) ? json_decode($data->data, true) : [];
?>

@extends('admin.layout.default')

@section('title')
{{ $title='Sửa dạng bài "' .($config['name']). '"' }} | Quản lý dạng bài tập
@stop

@section('script')
{{ HTML::script('adminlte/custom/script.js') }}
{{ HTML::script('adminlte/custom/ajax.js') }}
@stop

@section('content')
@if(Admin::isAdmin())
<div class="row margin-bottom">
	<div class="col-xs-12">
		<a href="{{ action('QuestionTypeController@index') }}" class="btn btn-success">Danh sách dạng bài</a>
	</div>
</div>
@endif


<div class="row">
	<div class="col-xs-12">
		<div class="box box-primary">
			<div class="box-body">
				<div class="col-xs-12 col-sm-6">
					{{ Form::open(['action' => ['QuestionTypeController@update', $data->name], 'method' => 'POST', 'files' => true, 'id' => 'question-type-config-form']) }}
						{{ Form::hidden('question_type', $config['key']) }}
						<div class="form-group">
							<label>Mã dạng bài</label>
							{{ Form::text('key', !empty($config['key']) ? $config['key'] : '', ['class' => 'form-control', 'disabled' => true]) }}
							<span class="description"><i>Liên hệ với nhà phát triển để thay đổi thông số</i></span>
						</div>
						<div class="form-group">
							<label>Tên dạng bài</label>
							{{ Form::text('name', !empty($config['name']) ? $config['name'] : '', ['class' => 'form-control', 'disabled' => true]) }}
							<span class="description"><i>Liên hệ với nhà phát triển để thay đổi thông số</i></span>
						</div>
						<div class="form-group">
							<label>Mô tả</label>
							{{ Form::textarea('description', !empty($config['description']) ? $config['description'] : '', ['class' => 'form-control', 'rows' => 5]) }}
						</div>
						<div class="form-group">
							<label>Hình ảnh minh họa</label>
							{{ !empty($config['thumb_url']) ? '<p><a target="_blank" href="'.asset($config['thumb_url']).'">'.basename($config['thumb_url']).'</a></p>' : '' }}
							{{ Form::file('thumb', ['class' => 'form-control', 'accept' => ".png, .jpg, .jpeg, .gif, .svg"]) }}
						</div>
						<div class="form-group">
							<label>Thư viện hình ảnh</label>
							<?php
								$files = Common::scanDir( public_path().'/questions/'. $config['key'] .'/img' );
								$default = [];
								if( $files ){
									foreach ($files as $img){
										$default[] = [
											'image_title' => '',
											'image_url' => str_replace('\\', '/', str_replace(public_path(), '', $img))
										];
									}
								}
							?>
							{{ CommonUpload::file( 'images_new', !empty($config['images']) ? $config['images'] : $default, ['class' => 'form-control', 'accept' => ".png, .jpg, .jpeg, .gif, .svg", 'maxsize' => 1000, 'multiple' => true, 'data-target' => !empty($config['key']) ? '/questions/'.$config['key'].'/img' : '' ], ['ajax' => true, 'preview' => true] ) }}
						</div>
						<div class="form-group">
							{{ Form::submit('Lưu', ['class' => 'btn btn-primary']) }}
						</div>
					{{ Form::close() }}
				</div>
			</div> <!-- End box body -->
		</div> <!-- /.box -->
	</div>
</div> <!-- End row -->

@stop
