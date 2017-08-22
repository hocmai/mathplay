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
								  
									<div class="panel panel-default">
									    <div class="panel-heading" role="tab" id="headingOne">
									    	<h4 class="panel-title">
										        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
										        	#Tạo mới câu hỏi
										        </a>
										        <button type="button" class="close"><span aria-hidden="true">&times;</span></button>
									    	</h4>
									    </div>
									    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
									    	<div class="panel-body">
								    			<div class="form-group">
								    				<label>Tiêu đề</label>
								    				{{ Form::text('question[][title]', '', ['class' => 'form-control', 'required' => true]) }}
								    			</div>
								    			<div class="form-group">
								    				<label>Dạng câu hỏi</label>
								    				{{ Form::select('question[][type]', [
								    					'' => 'Chọn',
								    					'1' => 'Tập đếm'
								    				], '', ['class' => 'form-control', 'required' => true]) }}
								    			</div>
								    			<div class="form-group">
								    				<label>Nội dung</label>
								    				{{ Form::textarea('question[][content]', '', ['class' => 'form-control', 'rows' => 5]) }}
								    			</div>
									    	</div>
									    </div>
									</div>

								  <!-- <div class="panel panel-default">
								    <div class="panel-heading" role="tab" id="headingTwo">
								      <h4 class="panel-title">
								        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
								          Collapsible Group Item #2
								        </a>
								      </h4>
								    </div>
								    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
								      <div class="panel-body">
								        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
								      </div>
								    </div>
								  </div> -->
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
