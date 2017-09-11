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
                    {{ Form::open(['route' => ['user.doregister']]) }}
                        <div class="chuong-trinh">
                            <h3 class="title">Đăng ký tài khoản</h3>
                            <div class="des">
                                Đăng ký thành viên bằng tài khoản HOCMAI
                            </div>
                            <div class="form" >

                                <div class="form-group">
                                    {{ Form::text('username', '', ['required' => true,'class' => 'form-control', 'placeholder' => 'Tên đăng nhập']) }}
                                </div>
                                <div class="form-group">
                                    {{ Form::text('email', '', ['required' => true,'class' => 'form-control', 'placeholder' => 'Email']) }}
                                </div>
                                <div class="form-group">
                                    {{ Form::text('name', '', ['required' => true,'class' => 'form-control', 'placeholder' => 'Họ tên đầy đủ']) }}
                                </div>
                                <div class="form-group">
                                    {{ Form::text('phone', '', ['required' => true,'class' => 'form-control', 'placeholder' => 'Số điện thoại']) }}
                                </div>
                                <div class="form-group">
                                    {{ Form::text('password', '', ['required' => true,'class' => 'form-control', 'placeholder' => 'Mật khẩu']) }}
                                </div>
                                <div class="form-group">
                                    {{ Form::text('password_confirmed', '', ['required' => true,'class' => 'form-control', 'placeholder' => 'Nhập lại mật khẩu']) }}
                                </div>
                            </div>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="terms"> Tôi đồng ý với các <a href="" title="">điều khoản và quy định</a> của HOCMAI
                            </label>
                        </div>
                        <div class="form-group button">
                            {{ Form::button('Đăng ký', ['type' => 'submit','class' => 'btn btn-default']) }}
                        </div>
                    {{ Form::close() }}
                </div>
                <div class="col-sm-7">
                    <div class="boxs-right">
                        <div class="chuong-trinh">
                            <div class="des">
                                Đăng ký sử dụng tài khoản mạng xã hội
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
                <div class="col-sm-12 ">
                    <div class="thanh-vien">
                        Nếu bạn đã là thành viên, <a href="{{ route('user.login') }}" title="">bấm vào đây để đăng nhập</a>
                    </div>
                </div>
                <div></div>
            </div>
        </div>

    </div>
</div>
@stop