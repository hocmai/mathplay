@extends('admin.layout.default')
@if(Admin::isAdmin())
@section('title')
	{{ $title='Danh sách lớp học' }}
	<h4 class="inline-block" style="margin-left: 15px"><i class="fa fa-plus-circle btn btn-success" aria-hidden="true"></i> {{ link_to_action('GradeController@create', 'Thêm mới') }}</h4>
@stop

@section('content')
	<!-- inclue Search form -->
	<!-- @include('admin.grade.search') -->

	<div class="row">
		<div class="col-xs-12">
		  <div class="box">
			<div class="box-header">
			  	@if($data->count())
					@include('admin.common.bulk-operations', ['model' => 'Grade'])
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
		  			<th>Tên lớp</th>
			  		<th>Mô tả</th>
					<th>Người đăng</th>
					<th style="width:100px;">Ngày đăng</th>
					<th style="width:100px;">Sửa lần cuối</th>
					<th style="width:100px;">Trạng thái</th>
					<th style="width:150px;">Action</th>
				</tr>

				@foreach($data as $key => $value)
					<tr>
						<td><input type="checkbox" name="checkbox" id="check-option" value="{{$value->id}}"></td>
						<td>#{{ $key + 1 + ($data->getPerPage() * ($data->getCurrentPage() -1)) }}</td>
						<td>{{ link_to_action('SiteGradeController@show', $value->title, 
					 		['gradeSlug' => $value->slug], ['target' => '_blank']) }}</td>
						<td>{{ $value->description }}</td>
						<td></td>
						<td>{{ $value['created_at'] }}</td>
						<td>{{ $value['changed_at'] }}</td>
						<td>{{ ($value->status == 1) ? 'đã công bố' : 'chưa công bố' }}</td>
						<td>
							<a href="{{ action('GradeController@edit', $value->id) }}" class="btn btn-primary">Sửa</a>
							{{ Form::open(array('method'=>'DELETE', 'action' => array('GradeController@destroy', $value->id), 'style' => 'display: inline-block;')) }}
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
