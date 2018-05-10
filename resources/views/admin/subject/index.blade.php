@extends('admin.layout.default')
@if(Admin::isAdmin())
@section('title')
	{{ $title='Danh sách Môn học' }}
	<h4 class="inline-block" style="margin-left: 15px"><i class="fa fa-plus-circle btn btn-success" aria-hidden="true"></i> {{ link_to_action('SubjectController@create', 'Thêm mới') }}</h4>
@stop

@section('content')
	<!-- inclue Search form -->
	@include('admin.subject.search')

	<div class="row">
		<div class="col-xs-12">
		  <div class="box">
			<div class="box-header">
			  	@if($data->count())
					@include('admin.common.bulk-operations', ['model' => 'Subject'])
					<span class="pull-right"><em>
						Hiển thị {{ 1 + ($data->getPerPage() * ($data->getCurrentPage() -1)) }} - {{ ( $data->getTotal() <= ($data->getPerPage() * $data->getCurrentPage() ) ) ? $data->getTotal() : $data->getPerPage() + ($data->getPerPage() * ($data->getCurrentPage() -1) ) }} trong tổng số {{ ($data->getTotal()) }} kết quả
					</em></span>
				@else
					<div class="alert alert-info" style="margin: 0" role="alert">Không tìm thấy kết quả nào.</div>
				@endif
			</div>
			<!-- /.box-header -->

			<div class="box-body table-responsive no-padding">
			  <table class="table table-hover">
				<tr>
					<th><input type="checkbox" id="check-all"/></th>
					<th>STT</th>
					<th>Tên môn học</th>
					<th>Lớp học</th>
					<th>Mô tả</th>
					<th>Người đăng</th>
					<th style="width:100px;">Ngày đăng</th>
					<th style="width:100px;">sửa lần cuối</th>
					<th style="width:100px;">Trạng thái</th>
					<th style="width:150px;">Action</th>
				</tr>

				@foreach($data as $key => $value)
					<tr>
						<td><input type="checkbox" name="checkbox" id="check-option" value="{{$value->id}}"></td>
					 	<td>#{{ $key + 1 + ($data->getPerPage() * ($data->getCurrentPage() -1)) }}</td>
					 	<td>{{ link_to_action('SiteSubjectController@show', $value->title, 
					 		['gradeSlug' => Common::getValueOfObject($value, 'grade', 'slug'),
							'subjectSlug' => $value->slug], ['target' => '_blank']) }}
					 	</td>
					 	<td>{{ link_to_action(
							'SiteGradeController@show',
							Common::getValueOfObject($value, 'grade', 'title'),
							['gradeSlug' => Common::getValueOfObject($value, 'grade', 'slug')], ['target' => '_blank'])}}
						</td>
					 	<td>{{ $value->description }}</td>
					 	<td>{{ Common:: getValueOfObject($value, 'author', 'username') }}</td>
						<td>{{ date_format(date_create($value->created_at), 'd/m/Y H:i') }}</td>
						<td>{{ date_format(date_create($value->updated_at), 'd/m/Y H:i') }}</td>
					 	<td>{{ ($value->status == 1) ? 'đã công bố' : 'chưa công bố' }}</td>
					 	<td>
							<a href="{{ action('SubjectController@edit', $value->id) }}" class="btn btn-primary">Sửa</a>
							{{ Form::open(array('method'=>'DELETE', 'action' => array('SubjectController@destroy', $value->grade_id), 'style' => 'display: inline-block;')) }}
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
