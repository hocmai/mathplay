@extends('admin.layout.default')

@section('title')
{{ $title='Tạo chuyên đề' }} | Quản lý chuyên đề
@stop

@section('content')

@if(Admin::isAdmin())
<div class="row margin-bottom">
	<div class="col-xs-12">
		<a href="{{ action('ChapterController@index') }}" class="btn btn-success">Danh sách chuyên đề</a>
	</div>
</div>
@endif

<div class="row">
	<div class="col-xs-12">
		<div class="box box-primary">
			<!-- form start -->
			{{ Form::open(array('action' => array('ChapterController@store'))) }}
				<div class="box-body">
					<div class="form-group">
						{{ Form::label('title', 'Tiêu đề', ['class' => 'row col-sm-6']) }}<div class="clearfix"></div>
						<div class="row col-sm-6">{{ Form::text('title', '', ['class' => 'form-control', 'required' => true, 'size' => 60]) }}</div><div class="clearfix"></div>
					</div>
					<div class="form-group">
						{{ Form::label('grade_id', 'Chọn Môn', ['class' => 'row col-sm-6']) }}<div class="clearfix"></div>
						<div class="row col-sm-6">{{ Form::select('subject_id', ['' => 'Chọn môn'] + Common::getSubjectList(), '', ['class' => 'form-control', 'row' => 10, 'required' => true] ) }}</div><div class="clearfix"></div>
					</div>
					<div class="form-group">
						{{ Form::label('description', 'Mô tả', ['class' => 'row col-sm-6']) }}<div class="clearfix"></div>
						<div class="row col-sm-6">{{ Form::textarea('description', '', ['class' => 'form-control', 'row' => 10]) }}</div><div class="clearfix"></div>
					</div>
					<div class="form-group">
						{{ Form::label('status', 'trạng thái', ['class' => 'row col-sm-6']) }}<div class="clearfix"></div>
						<div class="row col-sm-6">{{ Form::select('status', [
							0 => 'Unpublic',
							1 => 'Public'
						], '1', ['class' => 'form-control', 'row' => 10]) }}</div><div class="clearfix"></div>
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
