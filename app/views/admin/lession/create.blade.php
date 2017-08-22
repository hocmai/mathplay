@extends('admin.layout.default')

@section('title')
{{ $title='Tạo bài tập' }} | Quản lý bài tập
@stop

@section('content')

@if(Admin::isAdmin())
<div class="row margin-bottom">
	<div class="col-xs-12">
		<a href="{{ action('LessionController@index') }}" class="btn btn-success">Danh sách bài tập</a>
	</div>
</div>
@endif

<div class="row">
	<div class="col-xs-12">
		<div class="box box-primary">
			<!-- form start -->
			<div class="box-body">
				<div class="row">
					<div class="col-xs-12 col-sm-5">
						{{ Form::open(['action' => ['LessionController@store'], 'method' => 'POST']) }}
							<div class="form-group">
								{{ Form::label('title', 'Tiêu đề', ['class' => '']) }}<div class="clearfix"></div>
								<div class="">{{ Form::text('title', '', ['class' => 'form-control', 'required' => true, 'size' => 60]) }}</div><div class="clearfix"></div>
							</div>
							<div class="form-group">
								{{ Form::label('chapter_id', 'Chọn chuyên đề', ['class' => '']) }}<div class="clearfix"></div>
								<div class="">{{ Form::select('chapter_id', ['' => 'Chọn'] + Common::getChapterList(), '', ['class' => 'form-control', 'row' => 10, 'required' => true] ) }}</div><div class="clearfix"></div>
							</div>
							<div class="form-group">
								{{ Form::label('description', 'Mô tả', ['class' => '']) }}<div class="clearfix"></div>
								<div class="">{{ Form::textarea('description', '', ['class' => 'form-control', 'row' => 10]) }}</div><div class="clearfix"></div>
							</div>
							<div class="form-group">
								{{ Form::label('status', 'trạng thái', ['class' => '']) }}<div class="clearfix"></div>
								<div class="">{{ Form::select('status', [
									0 => 'Unpublic',
									1 => 'Public'
								], '1', ['class' => 'form-control', 'row' => 10]) }}</div><div class="clearfix"></div>
							</div>

							<input type="submit" class="btn btn-primary" value="Lưu lại" />
							<input type="button" class="btn btn-default" value="Hủy" />
						{{ Form::close() }}
					</div> <!-- End Lession form -->

					<div class="col-xs-12 col-sm-7">
						<div class="box">
							tset
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /.box -->
	</div>
</div>

@stop
