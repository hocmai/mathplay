@extends('admin.layout.default')
@if(Admin::isAdmin())
@section('title')
{{ $title='Thêm thành viên' }}
@stop

@section('content')

<div class="row margin-bottom">
  <div class="col-xs-12">
    <a href="{{ action('UserController@index') }}" class="btn btn-success">Danh sách người dùng</a>
  </div>
</div>

<div class="row">
	<div class="col-xs-12">
		<div class="box box-primary">
        <!-- form start -->
        {{ Form::open(array('action' => 'UserController@store')) }}
          <div class="box-body">
            <div class="form-group">
              <label for="username">Tên đăng nhập</label>
              <div class="row">
              	<div class="col-sm-6">
                  {{ Form::text('username', '', ['class' => 'form-control', 'required' => true]) }}
                </div>
              </div>
            </div>
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
            <div class="form-group">
              <label for="email">Email</label>
              	<div class="row">
                	<div class="col-sm-6">
                    {{ Form::email('email', '', ['class' => 'form-control', 'required' => true]) }}
            		</div>
      			</div>
            </div>
          </div>
          <!-- /.box-body -->

          <div class="box-footer">
            {{ Form::submit('Lưu lại', ['class' => 'btn btn-primary']) }}
            <input type="reset" class="btn btn-default" value="Nhập lại" />
          </div>
        {{ Form::close() }}
      </div>
      <!-- /.box -->
	</div>
</div>

@stop
@endif