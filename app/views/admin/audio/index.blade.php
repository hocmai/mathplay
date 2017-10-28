@extends('admin.layout.default')
@if(Admin::isAdmin())
@section('title')
	{{ $title='Danh sách bản ghi' }}
	<h4 class="inline-block" style="margin-left: 15px"><i class="fa fa-plus-circle" aria-hidden="true"></i> {{ link_to_action('AudioController@create', 'Thêm bản ghi mới') }}</h4>
@stop

@section('content')
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
		  			<th>Tiêu đề</th>
			  		<th>tag</th>
					<th style="width:100px;">Ngày đăng</th>
					<th style="width:100px;">sửa lần cuối</th>
					<th style="width:150px;">Action</th>
				</tr>

				@foreach($data as $key => $value)
					<tr>
						<td><input type="checkbox" name="checkbox" id="check-option" value="{{$value->id}}"></td>
						<td>#{{ $key + 1 + ($data->getPerPage() * ($data->getCurrentPage() -1)) }}</td>
						<td>{{ $value->title }}</td>
						<td>{{ $value->slug }}</td>
						<td></td>
						<td>{{ $value['created_at'] }}</td>
						<td>{{ $value['changed_at'] }}</td>
						<td>
							<a href="{{ action('AudioController@edit', $value->id) }}" class="btn btn-primary">Sửa</a>
							{{ Form::open(array('method'=>'DELETE', 'action' => array('AudioController@destroy', $value->id), 'style' => 'display: inline-block;')) }}
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
