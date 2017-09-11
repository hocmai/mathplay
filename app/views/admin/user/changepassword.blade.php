@extends('admin.layout.default')

@section('title')
{{ $title='Đổi mật khẩu' }}
@stop

@section('content')

<div class="row margin-bottom">
  <div class="col-xs-12">
    <a href="{{ action('UserController@index') }}" class="btn btn-success">Danh sách thành viên</a>
  </div>
</div>

<div class="row">
	<div class="col-xs-12">
		<div class="box box-primary">
			<!-- form start -->
			{{ Form::open(array('action' => array('UserController@updatePassword', $data->id), 'method' => 'post')) }}
			<div class="box-body">
				<div class="form-group">
					<label for="name">Tên User</label>
					<div class="row">
						<div class="col-sm-6">
							<input name="user_name" type="text" class="form-control" value="{{ $data->username }}" readonly="true">
						</div>
					</div>
				</div>
			<div class="box-body">
				<div class="form-group">
	              <label for="password">Password</label>
	              <div class="row">
	                <div class="col-sm-6">
	                  {{ Form::password('password', ['class' => 'form-control', 'required' => true]) }}
	                </div>
	              </div>
	            </div>
	            <div class="form-group">
	              <label for="password_confirmation">Nhập lại Password</label>
	              <div class="row">
	                <div class="col-sm-6">
	                  {{ Form::password('password_confirmation', ['class' => 'form-control', 'required' => true]) }}
	                </div>
	              </div>
	            </div>
			  <!-- /.box-body -->

			  <div class="box-footer">
				{{ Form::submit('Lưu lại', array('class' => 'btn btn-primary')) }}
			  </div>
			{{ Form::close() }}
		  </div>
		  <!-- /.box -->
	</div>
</div>
@stop
