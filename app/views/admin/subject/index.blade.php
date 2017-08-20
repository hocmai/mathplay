@extends('admin.layout.default')
@if(Admin::isAdmin())
@section('title')
{{ $title='Danh sách Môn học' }}
@stop

@section('content')
	<!-- inclue Search form -->
	<!-- @include('admin.grade.search') -->

	<div class="row margin-bottom">
		<div class="col-xs-12">
			<a href="{{ action('SubjectController@create') }}" class="btn btn-primary">Thêm môn học</a>
		</div>
	</div>

	<div class="row">
		<div class="col-xs-12">
		  <div class="box">
			<div class="box-header">
			  <h3 class="box-title">Danh sách môn học</h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body table-responsive no-padding">
			  <table class="table table-hover">
				<tr>
				  <th>STT</th>
				  <th>Tên lớp</th>
				  <th>Mô tả</th>
				  <th>Người đăng</th>
				  <th style="width:100px;">Ngày đăng</th>
				  <th style="width:100px;">sửa lần cuối</th>
				  <th style="width:100px;">Trạng thái</th>
				  <th style="width:150px;">Action</th>
				</tr>
				@foreach($data as $key => $value)
				<tr>
				  <td>#{{ $key + 1 }}</td>
				  <td>{{ $value->title }}</td>
				  <td>{{ $value->description }}</td>
				  <td>{{ Common:: getValueOfObject($value, 'author', 'username') }}</td>
				  <td>{{ $value->created_at }}</td>
				  <td>{{ $value->updated_at }}</td>
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
