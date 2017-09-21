@extends('admin.layout.default')
@if(Admin::isAdmin())
@section('title')
{{ $title='Danh sách chuyên đề' }}
@stop

@section('content')
	<!-- inclue Search form -->
	<!-- @include('admin.grade.search') -->

	<div class="row margin-bottom">
		<div class="col-xs-12">
			<a href="{{ action('ChapterController@create') }}" class="btn btn-primary">Thêm chuyên đề</a>
		</div>
	</div>

	<div class="row">
		<div class="col-xs-12">
		  <div class="box">
			<div class="box-header">
			  <h3 class="box-title">Danh sách chuyên đề</h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body table-responsive no-padding">
			  <table class="table table-hover">
				<tr>
				  <th>STT</th>
				  <th>Tên chuyên đề</th>
				  <th>Môn</th>
				  <th>Lớp</th>
				  <th>Người đăng</th>
				  <th style="width:100px;">Ngày đăng</th>
				  <th style="width:100px;">sửa lần cuối</th>
				  <th style="width:100px;">Trạng thái</th>
				  <th style="width:150px;">Action</th>
				</tr>
				@foreach($data as $key => $value)
				<tr>
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
			</div>
			<!-- /.box-body -->
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
