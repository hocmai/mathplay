@extends('admin.layout.default')

@section('title')
	{{ $title='Danh sách chuyên đề' }}
	<h4 class="inline-block" style="margin-left: 15px"><i class="fa fa-plus-circle btn btn-success" aria-hidden="true"></i> {{ link_to_action('ChapterController@create', 'Thêm mới') }}</h4>
@stop

@section('script')
	{{ HTML::script('adminlte/custom/sortable.js') }}
@stop

@section('content')
	<!-- inclue Search form -->
	@include('admin.chapter.search')

	<div class="row">
		<div class="col-xs-12">
		  <div class="box">
			<div class="box-header">
				@if($data->count())
					@include('admin.common.bulk-operations', ['model' => 'Chapter'])
					<span class="pull-right">
						<em>Hiển thị {{ 1 + ($data->getPerPage() * ($data->getCurrentPage() -1)) }} - {{ ( $data->getTotal() <= ($data->getPerPage() * $data->getCurrentPage() ) ) ? $data->getTotal() : $data->getPerPage() + ($data->getPerPage() * ($data->getCurrentPage() -1) ) }} trong tổng số {{ ($data->getTotal()) }} kết quả
						</em><br>
						<a href="javascript:void(0)" class="pull-right show-weight-number">Hiện thứ tự</a>
					</span>
				@else
					<div class="alert alert-info" style="margin: 0" role="alert">Không tìm thấy kết quả nào.</div>
				@endif
			</div>
			<!-- /.box-header -->

			<div class="box-body table-responsive no-padding">
			  <table class="table table-hover sortable">
				<tr>
					<th><i class="fa fa-arrows" aria-hidden="true"></i></th>
					<th><input type="checkbox" id="check-all"/></th>
					<th>STT</th>
					<th>{{ get_order_link('title', 'Tên chuyên đề', 'ChapterController@search') }}</th>
					<th>Môn</th>
					<th>Lớp</th>
					<th>Người đăng</th>
					<th style="width:100px;">{{ get_order_link('created_at', 'Ngày đăng', 'ChapterController@search') }}</th>
					<th style="width:100px;">{{ get_order_link('updated_at', 'Sửa lần cuối', 'ChapterController@search') }}</th>
					<th style="width:100px;">Trạng thái</th>
					<th style="width:150px;">Action</th>
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
					 	<td>#{{ $key + 1 + ($data->getPerPage() * ($data->getCurrentPage() -1)) }}</td>
					 	<td>{{ $value->title }}</td>
						<td>{{ link_to_action(
							'SiteSubjectController@show',
							Common::getValueOfObject($value, 'subject', 'title'),
							[
								'gradeSlug' => Common::getObject(Common::getValueOfObject($value, 'subject', 'grade'), 'slug'),
								'subjectSlug' => Common::getValueOfObject($value, 'subject', 'slug')
							], ['target' => '_blank'])}}
						</td>
						<td>{{ link_to_action(
							'SiteGradeController@show',
							Common::getObject(Common::getValueOfObject($value, 'subject', 'grade'), 'title'),
							['gradeSlug' => Common::getObject(Common::getValueOfObject($value, 'subject', 'grade'), 'slug')], ['target' => '_blank'])}}
						</td>
						<td>{{ Common::getValueOfObject($value, 'author', 'username') }}</td>
						<td>{{ date_format(date_create($value->created_at), 'd/m/Y H:i') }}</td>
						<td>{{ date_format(date_create($value->updated_at), 'd/m/Y H:i') }}</td>
						<td>{{ ($value->status == 1) ? 'đã công bố' : 'chưa công bố' }}</td>
						<td>
							<a href="{{ action('ChapterController@edit', $value->id) }}" class="btn btn-primary">Sửa</a>
							{{ Form::open(array('method'=>'DELETE', 'action' => array('ChapterController@destroy', $value->id), 'style' => 'display: inline-block;')) }}
							<button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?');">Xóa</button>
							{{ Form::close() }}

						</td>
					</tr>
				@endforeach
			  </table>
			</div><!-- /.box-body -->
		</div><!-- /.box -->
		<button type="button" class="btn btn-primary disabled" id="sort-node-save" data-model="chapter">Lưu thứ tự</button>
		</div>
	</div>

	<div class="row">
		<div class="col-xs-12">
			{{ $data->appends(Request::except('page'))->links() }}
		</div>
	</div>

@stop