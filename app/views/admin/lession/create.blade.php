@extends('admin.layout.default')

@section('title')
{{ $title='Tạo bài tập' }} | Quản lý bài tập
@stop

@section('content')

@section('script')
{{ HTML::script('adminlte/custom/script.js') }}
{{ HTML::script('adminlte/custom/ajax.js') }}
@stop

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
			<div class="hidden question-template-form">
				@include('admin.lession.question_form')
			</div>
			{{ Form::open(['action' => ['LessionController@store'], 'method' => 'POST']) }}
				<div class="box-body">
					<div class="row">
						<div class="col-xs-12 col-sm-5">
							<div class="form-group">
								{{ Form::label('title', 'Tiêu đề', ['class' => '']) }}<div class="clearfix"></div>
								<div class="">{{ Form::text('title', '', ['class' => 'form-control', 'required' => true, 'size' => 60]) }}</div><div class="clearfix"></div>
							</div>
							<div class="form-group">
								{{ Form::label('chapter_id', 'Chọn chuyên đề', ['class' => '']) }}<div class="clearfix"></div>
								<div class="">{{ Form::select('chapter_id', ['' => 'Chọn'] + Common::getChapterList(), '', ['class' => 'form-control', 'row' => 10, 'required' => true] ) }}</div><div class="clearfix"></div>
							</div>
							<div class="form-group">
								{{ Form::label('description', 'Mô tả') }}<div class="clearfix"></div>
								<div class="">{{ Form::textarea('description', '', ['class' => 'form-control', 'row' => 5]) }}</div><div class="clearfix"></div>
							</div>

							<div class="form-group">
								{{ Form::label('status', 'Cài đặt', ['class' => '']) }}
								{{ Form::select('config', ['' => '-- Chọn --'] + CommonConfig::getConfigLession(), '', ['class' => 'form-control', 'row' => 10]) }}
								<span class="description"><a href="{{ action('ConfLessionController@index') }}">Cài đặt độ khó</a></span>
							</div>

							<!-- <div class="form-group">
								{{ Form::label('config[num_question]', 'Số câu hỏi', ['class' => '']) }}<div class="clearfix"></div>
								<div class="">{{ Form::number('config[num_question]', 20, ['class' => 'form-control', 'required' => true, 'size' => 60]) }}</div><div class="clearfix"></div>
							</div>
							<div class="form-group">
								{{ Form::label('config[score_limit]', 'Thang điểm', ['class' => '']) }}<div class="clearfix"></div>
								<div class="">{{ Form::number('config[score_limit]', 100, ['class' => 'form-control', 'required' => true, 'size' => 60]) }}</div><div class="clearfix"></div>
								<span class="help">Số điểm tối đa nên chia hết cho tổng số câu hỏi</span>
							</div> -->
							<div class="form-group">
								{{ Form::label('status', 'Trạng thái', ['class' => '']) }}<div class="clearfix"></div>
								<div class="">{{ Form::select('status', [
									0 => 'Unpublic',
									1 => 'Public'
								], '1', ['class' => 'form-control', 'row' => 10]) }}</div><div class="clearfix"></div>
							</div>

							<input type="submit" class="btn btn-primary" value="Lưu lại" />
							<input type="button" class="btn btn-default" value="Hủy" />
						</div> <!-- End Lession form -->

						<!-- Form add multi question -->
						<div class="col-xs-12 col-sm-7">
							<div class="box col-sm-12 form-add-question">
								<h3>Danh sách câu hỏi</h3>
								<!-- Accordion -->
								<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
									@include('admin.lession.question_form', array('key' => 1))
								</div>
								<div class="form-group">
									<button type="button" class="btn btn-success add-new-question"><i class="glyphicon glyphicon-plus"></i> Thêm mới</button>
								</div>
							</div>
							<!-- End accordion -->

						</div>
					</div>
				</div>
			{{ Form::close() }}
			</div>
		</div>
		<!-- /.box -->
	</div>
</div>

@stop
