@extends('admin.layout.default')

@section('title')
{{ $title='Sửa bài tập '.$lession->title }} | Quản lý bài tập
@stop

@section('script')
{{ HTML::script('adminlte/custom/ajax.js') }}
@stop

@section('content')
@if(Admin::isAdmin())
<div class="row margin-bottom">
	<div class="col-xs-12">
		<a href="{{ action('SiteLessionController@show', ['lession_slug' => $lession->slug, 'subject_slug' => Common::getObject( Common::getValueOfObject($lession, 'chapter', 'subject'), 'slug'), 'grade_slug' => Common::getValueOfObject( Common::getValueOfObject($lession, 'chapter', 'subject'), 'grade', 'slug')]) }}" class="btn btn-success" target="_blank">Xem</a>
		<a href="{{ action('LessionController@index') }}" class="btn btn-success">Danh sách bài tập</a>
		<a href="{{ action('LessionController@create') }}" class="btn btn-primary">Thêm mới</a>
	</div>
</div>
@endif
<?php $uique = str_random(10); ?>

<div class="row">
	<div class="col-xs-12">
		<div class="box box-primary">
			<!-- form start -->
			<div class="hidden question-template-form">
				@include('admin.lession.question_form', array('lession' => $lession))
			</div>
			{{ Form::open(array('action' => array('LessionController@update', $lession->id), 'files' => true, 'method' => 'PUT')) }}
				<div class="box-body">
					<div class="row">
						<div class="col-xs-12 col-sm-5">
							<div class="form-group">
								{{ Form::label('title', 'Tiêu đề', ['class' => 'row col-sm-6']) }}<div class="clearfix"></div>
								{{ Form::text('title', $lession->title, ['class' => 'form-control', 'required' => true, 'size' => 60]) }}
							</div>
							<div class="form-group">
								{{ Form::label('chapter_id', 'Chọn chuyên đề', ['class' => '']) }}
								<select name="chapter_id" class="form-control selectpicker" data-live-search="1" required="true">{{ Common::getChapterSelect($lession->chapter_id) }}</select>
							</div>
							<div class="form-group">
								{{ Form::label('description', 'Mô tả') }}<div class="clearfix"></div>
								<div class="">{{ Form::textarea('description', $lession->description, ['class' => 'form-control editor', 'row' => 5, 'id' => 'editor-'.$uique]) }}</div><div class="clearfix"></div>
								<script type="text/javascript">
									CKEDITOR.replace( 'editor-{{ $uique }}', ckeditor_config );
									CKEDITOR.add
								</script>
							</div>
							<div class="form-group">
								{{ Form::label('status', 'Cài đặt', ['class' => '']) }}
								{{ Form::select('config', ['' => '-- Chọn --'] + CommonConfig::getConfigLession(), ($lession->config) ? $lession->config : '', ['class' => 'form-control', 'row' => 10]) }}
								<span class="description"><a href="{{ action('ConfLessionController@index') }}">Cài đặt độ khó</a></span>
							</div>
							<div class="form-group">
								{{ Form::label('status', 'trạng thái', ['class' => 'row col-sm-6']) }}<div class="clearfix"></div>
								{{ Form::select('status', [
									0 => 'Unpublic',
									1 => 'Public'
								], $lession->status, ['class' => 'form-control']) }}
							</div>
							<div class="form-group">
								<?php $weight_options = [];
								for( $i = -99; $i < 100; $i++ ){
									$weight_options[$i] = $i;
								}?>
								{{ Form::label('weight', 'Thứ tự', ['class' => 'row col-sm-6']) }}<div class="clearfix"></div>
								{{ Form::select('weight', $weight_options, $lession->weight, ['class' => 'form-control']) }}
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
