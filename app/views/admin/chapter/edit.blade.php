@extends('admin.layout.default')

@section('title')
{{ $title='Sửa chuyên đề '.$data->title }} | Quản lý chuyên đề
@stop

@section('content')

@if(Admin::isAdmin())
<div class="row margin-bottom">
	<div class="col-xs-12">
		<a href="{{ action('ChapterController@index') }}" class="btn btn-success">Danh sách chuyên đề</a>
		<a href="{{ action('ChapterController@create') }}" class="btn btn-primary">Thêm mới</a>
	</div>
</div>
@endif

<div class="row">
	<div class="col-xs-12">
		<div class="box box-primary">
			<!-- form start -->
			{{ Form::open(array('action' => array('ChapterController@update', $data->id), 'method' => 'PUT')) }}
				<div class="box-body">
					<div class="form-group">
						{{ Form::label('title', 'Tiêu đề', ['class' => 'row col-sm-6']) }}<div class="clearfix"></div>
						<div class="row col-sm-6">{{ Form::text('title', $data->title, ['class' => 'form-control', 'required' => true, 'size' => 60]) }}</div><div class="clearfix"></div>
					</div>
					<div class="form-group">
						{{ Form::label('subject_id', 'Chọn môn', ['class' => 'row col-sm-6']) }}<div class="clearfix"></div>
						<div class="row col-sm-6">{{ Form::select('subject_id', ['' => 'Chọn môn'] + Common::getSubjectList(), $data->subject_id, ['class' => 'form-control', 'row' => 10, 'required' => true] ) }}</div><div class="clearfix"></div>
					</div>
					<div class="form-group">
						{{ Form::label('description', 'Mô tả', ['class' => 'row col-sm-6']) }}<div class="clearfix"></div>
						<div class="row col-sm-6">{{ Form::textarea('description', $data->description, ['class' => 'form-control', 'row' => 10]) }}</div><div class="clearfix"></div>
					</div>
					<div class="form-group">
						{{ Form::label('status', 'trạng thái', ['class' => 'row col-sm-6']) }}<div class="clearfix"></div>
						<div class="row col-sm-6">{{ Form::select('status', [
							0 => 'Unpublic',
							1 => 'Public'
						], $data->status, ['class' => 'form-control', 'row' => 10]) }}</div><div class="clearfix"></div>
					</div>
				</div>
				<!-- /.box-body -->

				<div class="box-footer">
					<input type="submit" class="btn btn-primary" value="Lưu lại" />
					<input type="button" class="btn btn-default" value="Hủy" />
				</div>
			{{ Form::close() }}
		</div>
		<!-- /.box -->
	</div>
</div>

@stop
