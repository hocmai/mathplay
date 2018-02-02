@extends('site.layout.no_header')

@section('title')
    {{ $title = 'Thông tin cá nhân'; }}
@stop

@section('breadcrumb')
<header class="header">
    <div class="container">
        <ol class="breadcrumb hidden-xs">
            <a href="#" class="glyphicon glyphicon-chevron-left" style="padding-right: 5px; color: #fff"></a>
            <li><a href="/">Trang chủ</a></li>
        </ol>
        @include('site.common.user-menu')
    </div>
</header>
@stop

@section('content')
	<div class="container">
        <div class="row">
           <div class=" col-ms-4 col-xs-12">
            {{ Form::open(array('action' => 'SiteMemberController@profile')) }}
          <div class="box-body">

            <div class="form-group">
              <label for="email">Họ&Tên</label>
                <div class="row">
                    <div class="col-sm-6">
                    {{ Form::text('full_name', $data->full_name, ['class' => 'form-control', 'required' => true]) }}
                    </div>
                </div>
            </div>

            <div class="form-group">
              <label for="username">Tên đăng nhập</label>
              <div class="row">
                <div class="col-sm-6">
                  {{ Form::text('username', $data->username, ['class' => 'form-control', 'required' => true]) }}
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="email">Email</label>
                <div class="row">
                    <div class="col-sm-6">
                    {{ Form::email('email', $data->email, ['class' => 'form-control', 'required' => true]) }}
                    </div>
                </div>
            </div>
            <div class="form-group">
              <label for="email">Trường học</label>
                <div class="row">
                    <div class="col-sm-6">
                    {{ Form::text('school', '', ['class' => 'form-control', 'required' => true]) }}
                    </div>
                </div>
            </div>
            
            <div class="form-group">
              <label for="email">Lớp học</label>
                <div class="row">
                    <div class="col-sm-6">
                    {{ Form::select('garde_id', $class, $data->garde_id, ['class' => 'form-control', 'required' => true]) }}
                    </div>
                </div>
            </div>
            
            <div class="form-group">
              <label for="email">Số điện thoại</label>
                <div class="row">
                    <div class="col-sm-6">
                    {{ Form::text('phone', '', ['class' => 'form-control', 'required' => true]) }}
                    </div>
                </div>
            </div>
            <div class="form-group">
              <label for="email">Địa chỉ</label>
                <div class="row">
                    <div class="col-sm-6">
                    {{ Form::text('address', '', ['class' => 'form-control', 'required' => true]) }}
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
        </div>
	</div>
@stop
{{-- <table class="table table-bordered table-striped table-hover">
    <tr>
        <th>STT</th>
        <th>Họ và tên</th>
        <th>Email</th>
        <th>Trường Học</th>
        <th>lớp</th>
        <th>Số điện thoại</th>
        <th>Địa chỉ</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
@foreach($data as $key => $value)
    <tr>
        <td>{{ $key+1 }}</td>
        <td>{{ $value->username }}</td>
        <td>{{ $value->email }}</td>
        <td>{{ $value->scholl }}</td>
        <td>{{ Common::getObject($value->grades, 'title') }}</td>
        <td>{{ $value->phone }}</td>
    </tr>
@endforeach
</table> --}}