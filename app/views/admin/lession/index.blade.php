@extends('admin.layout.default')

@section('script')
{{ HTML::script('adminlte/custom/sortable.js') }}
@stop

@section('title')
{{ $title = 'Danh sách bài tập' }}
<h4 class="inline-block" style="margin-left: 15px"><i class="fa fa-plus-circle" aria-hidden="true"></i> {{ link_to_action('LessionController@create', 'Thêm mới') }}</h4>
@stop

<?php $input['order'] = 'desc'; ?>
@section('content')
	<!-- inclue Search form -->
	@include('admin.lession.filter')

	<div class="row lession-manage-page">
		<div class="col-xs-12">
		 	<div class="box">
				<div class="box-header">
					@if($data->count())
						@include('admin.common.bulk-operations', ['model' => 'Lession'])
						<span class="pull-right">
							<em>
								Hiển thị {{ 1 + ($data->getPerPage() * ($data->getCurrentPage() -1)) }} - {{ ( $data->getTotal() <= ($data->getPerPage() * $data->getCurrentPage() ) ) ? $data->getTotal() : $data->getPerPage() + ($data->getPerPage() * ($data->getCurrentPage() -1) ) }} trong tổng số {{ ($data->getTotal()) }} kết quả
							</em><br>
							<a href="javascript:void(0)" class="pull-right show-weight-number">Hiện thứ tự</a>
						</span>
					@else
						<div class="alert alert-info" style="margin: 0" role="alert">Không tìm thấy kết quả nào.</div>
					@endif
				</div> <!-- /.box-header -->

				@if($data->count())
					<div class="box-body table-responsive no-padding">
						<table class="table table-hover table-striped sortable">
							<tr class="success">
								<th><i class="fa fa-arrows" aria-hidden="true"></i></th>
								<th><input type="checkbox" id="check-all"/></th>
								<th>STT</th>
								<th>{{ get_order_link('title', 'Tiêu đề', 'LessionController@search') }}</th>
								<th>Chuyên đề</th>
								<th>Môn</th>
								<th style="min-width:90px;">Lớp</th>
								<th style="min-width:90px;">Người đăng</th>
								<th style="width:120px;">
									{{ get_order_link('created_at', 'Ngày đăng', 'LessionController@search') }}
								</th>
								<th style="width:120px;">
									{{ get_order_link('updated_at', 'Sửa lần cuối', 'LessionController@search') }}
								</th>
								<th style="width:90px;">Trạng thái</th>
								<th style="width:115px;">Action</th>
							</tr>
							@foreach($data as $key => $value)
								<tr data-order="{{ $key + 1 + ($data->getPerPage() * ($data->getCurrentPage() -1)) }}" data-perpage="{{ $data->getPerPage() }}" data-page="{{ $data->getCurrentPage() -1 }}">
									<td>
										<a href="javascript:void(0)" class="handle"><i class="fa fa-arrows" aria-hidden="true"></i></a>
										<select id="node_weight" style="display:none">
											@for($i = -99; $i < 100; $i++)
												<option value="{{ $i }}" {{ (isset($value->weight) && $value->weight == $i) ? 'selected' : '' }}>{{ $i }}</option>
											@endfor
										</select>
										<input type="hidden" name="node_id[]" id="node_id" value="{{$value->id}}">
									</td>
									<td><input type="checkbox" name="checkbox" id="check-option" value="{{$value->id}}"></td>
									<td class="order-number">#{{ $key + 1 + ($data->getPerPage() * ($data->getCurrentPage() -1)) }}</td>
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
			</div> <!-- /.box -->
			<button type="button" class="btn btn-primary disabled" id="sort-lession-save">Lưu thứ tự</button>
		</div>
	</div>

	<div class="row">
		<div class="col-xs-12">
			{{ $data->appends(Request::except('page'))->links() }}
		</div>
	</div>

@stop
