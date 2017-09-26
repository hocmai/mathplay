@extends('admin.layout.default')
@if(Admin::isAdmin())
@section('title')
{{ $title='Danh sách bài tập' }}
@stop

<?php $input['order'] = 'desc'; ?>
@section('content')

	<div class="row margin-bottom">
		<div class="col-xs-12">
			<a href="{{ action('LessionController@create') }}" class="btn btn-primary">Thêm bài tập</a>
		</div>
	</div>

	<!-- inclue Search form -->
	@include('admin.lession.filter')

	<div class="row">
		<div class="col-xs-12">
		 	<div class="box">
				<div class="box-header">
					@if($data->count())
						<h3 class="box-title">Danh sách bài tập</h3>
						<p><em>
							Hiển thị {{ 1 + ($data->getPerPage() * ($data->getCurrentPage() -1)) }} - {{ ( $data->getTotal() <= ($data->getPerPage() * $data->getCurrentPage() ) ) ? $data->getTotal() : $data->getPerPage() + ($data->getPerPage() * ($data->getCurrentPage() -1) ) }} trong tổng số {{ ($data->getTotal()) }} kết quả
						</em></p>
						{{ Form::open(['action' => 'AdminController@operation', 'method' => 'POST', 'id' => 'bulk-operation-form']) }}
							{{ Form::hidden('model', 'Lession') }}
							{{ Form::hidden('data') }}
							<div class="inline-block input-group">
								{{ Form::select('action', ['' => '- Thao tác -', 'delete' => 'Xóa', 'unpublic' => 'Bỏ công bố', 'public' => 'Công bố'], '', ['class' => 'form-control', 'required' => true]) }}
							</div>
							<div class="inline-block input-group" style="vertical-align: top;">{{ Form::submit('Áp dụng cho các mục được chọn', ['class' => 'btn btn-primary	']) }}</div>
						{{ Form::close() }}
					@else
						<div class="alert alert-info" style="margin: 0" role="alert">Không tìm thấy kết quả nào.</div>
					@endif
				</div> <!-- /.box-header -->

				@if($data->count())
					<div class="box-body table-responsive no-padding">
						<table class="table table-hover table-striped">
							<tr class="success">
								<th><input type="checkbox" id="check-all"/></th>
								<th>STT</th>
								<th>
									<?php
									$input['order'] = 'asc';
									if( Input::get('order_by') == 'title' && Input::get('order') == 'asc' ){
										unset($input['order']);
									}
									$input['order_by'] = 'title'; ?>
									<a title="Sắp xếp theo tiêu đề" href="{{ action('LessionController@search', $input) }}">Tên bài tập{{ (Input::get('order_by') == 'title') ? ' <span class="'.( (Input::get('order') == 'asc') ? 'dropup' : 'dropdown' ).'"><span class="caret"></span></span>' : '' }}</a>
								</th>
								<th>Chuyên đề</th>
								<th>Môn</th>
								<th style="min-width:90px;">Lớp</th>
								<th style="min-width:90px;">Người đăng</th>
								<th style="width:120px;">
									<?php
									unset($input['order']);
									if( Input::get('order_by') == 'created_at' && Input::get('order') != 'asc' ){
										$input['order'] = 'asc';
									}
									$input['order_by'] = 'created_at';?>
									<a title="Sắp xếp theo ngày đăng" href="{{ action('LessionController@search', $input) }}">Ngày đăng{{ (Input::get('order_by') == 'created_at') ? ' <span class="'.( (Input::get('order') == 'asc') ? 'dropup' : 'dropdown' ).'"><span class="caret"></span></span>' : '' }}</a>
								</th>
								<th style="width:120px;">
									<?php
									unset($input['order']);
									if( Input::get('order_by') == 'updated_at' && Input::get('order') != 'asc' ){
										$input['order'] = 'asc';
									}
									$input['order_by'] = 'updated_at';?>
									<a title="Sắp xếp theo ngày sửa cuối cùng" href="{{ action('LessionController@search', $input) }}">Sửa lần cuối{{ (Input::get('order_by') == 'updated_at') ? ' <span class="'.( (Input::get('order') == 'asc') ? 'dropup' : 'dropdown' ).'"><span class="caret"></span></span>' : '' }}</a>
								</th>
								<th style="width:90px;">Trạng thái</th>
								<th style="width:115px;">Action</th>
							</tr>
							@foreach($data as $key => $value)
							<tr>
								<td><input type="checkbox" name="checkbox" id="check-option" value="{{$value->id}}"></td>
								<td>#{{ $key + 1 + ($data->getPerPage() * ($data->getCurrentPage() -1)) }}</td>
								<td>{{ link_to_action('SiteLessionController@show', $value->title, 
									[
										'grade_slug' => Common::getObject(Common::getValueOfObject(Common::getObject($value, 'chapter'), 'subject', 'grade'), 'slug'),
										'subject_slug' => Common::getValueOfObject(Common::getObject($value, 'chapter'), 'subject', 'slug'),
										'lession_slug' => $value->slug
									], ['target' => '_blank']) }}
								</td>
								<td>{{ link_to_action('ChapterController@edit', Common::getValueOfObject($value, 'chapter', 'title'), ['id' => Common::getValueOfObject($value, 'chapter', 'id')]) }}</td>
								<td>{{ link_to_action(
									'SiteSubjectController@show',
									Common::getValueOfObject(Common::getObject($value, 'chapter'), 'subject', 'title'),
									[
										'gradeSlug' => Common::getObject(Common::getValueOfObject(Common::getObject($value, 'chapter'), 'subject', 'grade'), 'slug'),
										'subjectSlug' => Common::getValueOfObject(Common::getObject($value, 'chapter'), 'subject', 'slug')
									], ['target' => '_blank'])
								}}</td>
								<td>{{ link_to_action(
									'SiteGradeController@show',
									Common::getObject(Common::getValueOfObject(Common::getObject($value, 'chapter'), 'subject', 'grade'), 'title'),
									['gradeSlug' => Common::getObject(Common::getValueOfObject(Common::getObject($value, 'chapter'), 'subject', 'grade'), 'slug')], ['target' => '_blank'])
								}}</td>
								<td>{{ Common::getValueOfObject($value, 'author', 'username') }}</td>
								<td>{{ date_format(date_create($value->created_at), 'd/m/Y H:i') }}</td>
								<td>{{ date_format(date_create($value->updated_at), 'd/m/Y H:i') }}</td>
								<td>{{ ($value->status == 1) ? 'đã công bố' : 'chưa công bố' }}</td>
								<td>
									<a href="{{ action('LessionController@edit', $value->id) }}" class="btn btn-primary">Sửa</a>
									{{ Form::open(array('method'=>'DELETE', 'action' => array('LessionController@destroy', $value->id), 'style' => 'display: inline-block;')) }}
									<button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?');">Xóa</button>
									{{ Form::close() }}

								</td>
							</tr>
							@endforeach
						</table>
					</div><!-- /.box-body -->
				@endif
			</div>
		  <!-- /.box -->
		</div>
	</div>

	<div class="row">
		<div class="col-xs-12">
			{{ $data->appends(Request::except('page'))->links() }}
		</div>
	</div>

@stop
@endif
