@extends('admin.layout.default')
@if(Admin::isAdmin())
@section('title')
{{ $title='Cấu hình độ khó bài tập' }}
@stop

@section('content')
	<!-- inclue Search form -->
	<!-- @include('admin.grade.search') -->

	<div class="row margin-bottom">
		<div class="col-xs-12">
			<a href="{{ action('ConfLessionController@create') }}" class="btn btn-primary">Thêm độ khó</a>
		</div>
	</div>

	<div class="row">
		<div class="col-xs-12">
			<div class="box box-primary">
				<div class="box-body">
					<div class="row">
						{{ Form::open(['action' => ( empty($data) ? 'ConfLessionController@store' : ['ConfLessionController@update', $data->name] ), 'method' => empty($data) ? 'POST' : 'PUT', 'class' => 'col-xs-12 col-sm-5']) }}
							<div class="form-group">
								{{ Form::label('Tên cài đặt') }}
								{{ Form::text('name', !empty($config['name']) ? $config['name'] : '', ['class'=>"form-control", 'required' => true]) }}
								<div class="description">Nếu tiêu đề trùng với 1 tiêu đề trước đó (không phân biệt chữ HOA), kết quả sẽ bị ghi đè</div>
							</div>
							<div class="form-group">
								{{ Form::label('description', 'Mô tả') }}
								{{ Form::textarea('description', !empty($config['description']) ? $config['description'] : '', ['class' => 'form-control', 'rows' => 5]) }}
							</div>
							<div class="form-group">
								{{ Form::label('Số câu hỏi') }}
								{{ Form::number('number_ques', !empty($config['number_ques']) ? $config['number_ques'] : 20, ['class' => 'form-control', 'required' => true, 'min' => 10]) }}
							</div>
							<div class="form-group">
								{{ Form::label('Thang điểm tối đa') }}
								{{ Form::number('max_score', !empty($config['max_score']) ? $config['max_score'] : 100, ['class' => 'form-control', 'required' => true, 'min' => 10]) }}
								<div class="description">Thang điểm tối đa nên chia hết cho số câu hỏi</div>
							</div>
							<div class="form-group">
								{{ Form::label('Điểm trừ') }}
								{{ Form::number('minus_score', !empty($config['minus_score']) ? $config['minus_score'] : 0, ['class' => 'form-control', 'min' => 0]) }}
								<div class="description">Điểm trừ khi trả lời sai</div>
							</div>

							<div class="form-group">
								<input type="submit" class="btn btn-primary" value="Lưu lại" />
							</div>
						{{ Form::close() }}
					</div>
				</div>
			</div>
			<!-- /.box -->
		</div>
	</div>

@stop
@endif
