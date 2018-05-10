@extends('site.layout.default')
@section('title')
    {{ $title = trans('Đăng nhập'); }}
@stop

@section('content')

<div class="box-chuong-trinh box-dang-ky">
    <div class="row m0">
        <div class="container">
            <div class="row m0 bg-ff">
                <div class="col-sm-5 bor">
                    {{ Form::open(['action' => array('SiteUserController@doLogin'), 'method' => 'POST']) }}
                        <div class="chuong-trinh">
                            <h3 class="title">Đăng nhập tài khoản</h3>
                            <div class="des">
                                Đăng nhập thành viên bằng tài khoản HOCMAI
                            </div>
                            <div class="form" >
                                @if( $errors->has('failed') )
                                    <div class="alert alert-warning" role="alert">
                                        {{ $errors->first('failed') }}
                                    </div>
                                @endif
                                <div class="form-group">
                                    {{ Form::text('username', '', ['required' => true,'class' => 'form-control', 'placeholder' => 'Email / Tên đăng nhập']) }}
                                    {{ $errors->first('username' ) }}
                                </div>
                                <div class="form-group">
                                    {{ Form::password('password', ['required' => true,'class' => 'form-control', 'placeholder' => 'Mật khẩu']) }}
                                    {{ $errors->first('password' ) }}
                                </div>
                            </div>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="remember"> Nhớ tài khoản
                            </label>
                        </div>
                        <div class="form-group button">
                            {{ Form::button('Đăng nhập', ['type' => 'submit','class' => 'btn btn-default']) }}
                        </div>
                    {{ Form::close() }}
                </div>
                <div class="col-sm-7">
                    <div class="boxs-right">
                        <div class="chuong-trinh">
                            <div class="des">
                                Bạn có thể đăng nhập bằng tài khoản mạng xã hội
                            </div>

                            <div class="form" >
                                <div class="box-dang-nhap-khac">
                                    <a class="facebook" href="#" title="">Đăng nhập bằng Facebook</a>
                                    <a class="google" href="#" title="">Đăng nhập bằng Google</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="thanh-vien">
                        Chưa có tài khoản, <a href="{{ route('user.register') }}" title="">bấm vào đây để đăng ký</a>
                    </div>
                </div>
                <div></div>
            </div>
        </div>

    </div>
</div>
@stop