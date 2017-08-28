@extends('admin.layout.default')

@section('title')
{{ $title='Tạo bài tập' }} | Quản lý bài tập
@stop

@section('content')

@section('script')
{{ HTML::script('adminlte/custom/script.js') }}
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
			<div class="box-body">
				<div class="row">
					{{ Form::open(['action' => ['LessionController@store'], 'method' => 'POST']) }}
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
						</div> <!-- End Lession form -->

						<!-- Form add multi question -->
						<div class="col-xs-12 col-sm-7">
							<div class="box col-sm-12 form-add-question">
								<h3>Danh sách câu hỏi</h3>

								<!-- Accordion -->
								<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
								  
									<div class="panel panel-default" id="1">
									    <div class="panel-heading" role="tab" id="heading-1">
									    	<h4 class="panel-title">
										        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse-1" aria-expanded="true" aria-controls="collapse-1">
										        	#Tạo mới câu hỏi
										        </a>
										        <button type="button" class="close"><span aria-hidden="true">&times;</span></button>
									    	</h4>
									    </div>
									    <div id="collapse-1" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading-1">
									    	<div class="panel-body">
								    			<div class="form-group">
								    				<label>Tiêu đề</label>
								    				{{ Form::text('question[title][]', '', ['class' => 'form-control', 'required' => true]) }}
								    			</div>
								    			<div class="form-group">
								    				<label>Dạng câu hỏi</label>
								    				{{ Form::select('question[type][]', ['' => '-- Chọn --'] + CommonQuestion::getAllType(), '', ['class' => 'form-control', 'required' => true]) }}
								    			</div>
								    			<div class="form-group">
								    				<label>Nội dung</label>
								    				{{ Form::textarea('question[content][]', '', ['class' => 'form-control', 'rows' => 5]) }}
								    			</div>
								    			<div id="get-config-form"></div>
									    	</div>
									    </div>
									</div>
								</div>
								<button type="button" class="btn btn-success add-new-question"><i class="glyphicon glyphicon-plus"></i> Thêm mới</button>
								<!-- End accordion -->

							</div>
						</div>
					{{ Form::close() }}
				</div>
			</div>
		</div>
		<!-- /.box -->
	</div>
</div>

@stop
