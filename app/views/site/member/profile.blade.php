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
    <div class="box-chuong-trinh box-dang-ky">
        <div class="container" id="box-profile">
            <h1 style="text-align: center; text-decoration: underline;">Thông tin cá nhân</h1>
            <div class="row">
                {{ Form::open(array('action' => ['SiteMemberController@saveProfile', $id])) }}
                    <div class=" col-sm-6 col-xs-12">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="email">Họ và tên</label>
                                {{ Form::text('full_name', $data->full_name, ['class' => 'form-control', 'required' => true]) }}
                            </div>
                            <div class="form-group">
                                <label for="username">Tên đăng nhập</label>
                                {{ Form::text('username', $data->username, ['class' => 'form-control', 'required' => true, 'disabled' => 'disabled']) }}
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                {{ Form::email('email', $data->email, ['class' => 'form-control', 'required' => true, 'disabled' => 'disabled']) }}
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="email">Trường học</label>
                                {{ Form::text('school', $data->school, ['class' => 'form-control', 'required' => true]) }}
                            </div>
                            
                            <div class="form-group">
                                <label for="email">Lớp học</label>
                                {{ Form::select('garde_id', $class, $data->garde_id, ['class' => 'form-control', 'required' => true]) }}
                            </div>
                            
                            <div class="form-group">
                                <label for="email">Số điện thoại</label>
                                {{ Form::text('phone', $data->phone, ['class' => 'form-control', 'required' => true]) }}
                            </div>
                            <div class="form-group">
                                <label for="email">Địa chỉ</label>
                                {{ Form::text('address', $data->address, ['class' => 'form-control', 'required' => true]) }}
                            </div>
                        </div>
                    </div>
                  <!-- /.box-body -->
                   <div class="box-footer">
                        {{ Form::submit('Lưu lại', ['class' => 'btn btn-primary']) }}
                    </div>
                {{ Form::close() }}
            </div> {{-- end row --}}
        </div>
    </div>
@stop

