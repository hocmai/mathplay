@extends('admin.layout.default')

@section('title')
{{ $title='Sửa bài tập '.$lession->title }} | Quản lý bài tập
@stop

@section('script')
{{ HTML::script('adminlte/custom/script.js') }}
{{ HTML::script('adminlte/custom/ajax.js') }}
@stop

@section('content')
@if(Admin::isAdmin())
<div class="row margin-bottom">
	<div class="col-xs-12">
		<a href="{{ action('LessionController@index') }}" class="btn btn-success">Danh sách bài tập</a>
	</div>
</div>
@endif

<?php 
// $lessionConf = !empty($lession->config) ? (array)json_decode($lession->config) : [];
?>

<div class="row">
	<div class="col-xs-12">
		<div class="box box-primary">
			<!-- form start -->
			<div class="hidden question-template-form">
				@include('admin.lession.question_form', array('lession' => $lession))
			</div>
			{{ Form::open(array('action' => array('LessionController@update', $lession->id), 'method' => 'PUT')) }}
				<div class="box-body">
					<div class="row">
						<div class="col-xs-12 col-sm-5">
							<div class="form-group">
								{{ Form::label('title', 'Tiêu đề', ['class' => 'row col-sm-6']) }}<div class="clearfix"></div>
								{{ Form::text('title', $lession->title, ['class' => 'form-control', 'required' => true, 'size' => 60]) }}
							</div>
							<div class="form-group">
								{{ Form::label('chapter_id', 'Chọn chuyên đề', ['class' => 'row col-sm-6']) }}<div class="clearfix"></div>
								{{ Form::select('chapter_id', ['' => 'Chọn'] + Common::getChapterList(), $lession->chapter_id, ['class' => 'form-control', 'row' => 10, 'required' => true] ) }}
							</div>
							<div class="form-group">
								{{ Form::label('description', 'Mô tả', ['class' => 'row col-sm-6']) }}<div class="clearfix"></div>
								{{ Form::textarea('description', $lession->description, ['class' => 'form-control', 'row' => 10]) }}
							</div>
							<div class="form-group">
								{{ Form::label('status', 'Cài đặt', ['class' => '']) }}<div class="clearfix"></div>
								<div class="">{{ Form::select('config', ['' => '-- Chọn --'] + CommonConfig::getConfigLession(), ($lession->config) ? $lession->config : '', ['class' => 'form-control', 'row' => 10]) }}</div><div class="clearfix"></div>
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
								{{ Form::label('status', 'trạng thái', ['class' => 'row col-sm-6']) }}<div class="clearfix"></div>
								{{ Form::select('status', [
									0 => 'Unpublic',
									1 => 'Public'
								], $lession->status, ['class' => 'form-control', 'row' => 10]) }}
							</div>
						</div>
						
						<!-- Form add multi question -->
						<div class="col-xs-12 col-sm-7">
							<div class="box col-sm-12 form-add-question">
								<h3>Danh sách câu hỏi</h3>

								<!-- Accordion -->
								<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
									@if( count($lession->question) == 0 )
										@include('admin.lession.question_form', array('lession' => $lession, 'key' => 1))
									@endif
									@foreach($lession->question as $key => $question)
										@include('admin.lession.question_form', array('lession' => $lession, 'question' => $question, 'key' => $key+2))
									@endforeach
								</div>
								<div class="form-group"></div>
									<button type="button" class="btn btn-success add-new-question"><i class="glyphicon glyphicon-plus"></i> Thêm mới</button>
								<div class="form-group">
								<!-- End accordion -->

							</div>
						</div>
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
