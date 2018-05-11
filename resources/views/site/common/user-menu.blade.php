<div class="member-area col-xs-12 col-sm-6 col-lg-6 padding0">
    <div id="main-menu-mathplay" >
        <ul class="nav navbar-nav">
            {{-- <li><a href="#">Curriculum <span class="caret"></span></a></li> --}}
            <li class="dropdown pull-left">
                <a href="#" class="dropdown-toggle hidden-sm hidden-md hidden-lg" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></i></a>
                <a href="#" class="dropdown-toggle hidden-xs" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></i></a>
                <ul class="dropdown-menu" id="menu">
                    <li><a href="/">Trang chủ</a></li>
                    @foreach(Common::getAllGrade() as $grade)
                        <li>
                            {{ renderUrl('Site\SiteGradeController@show', $grade->title, ['grade_slug' => $grade->slug], []) }}
                        </li>
                    @endforeach
                </ul>
            </li>
            @if(Auth::check())
                <li class="box-info pull-right">
                    <div class="text">
                        <div class="avatar">
                            <img src="{{ Common::getUserAvatar() }}" class="img-responsive mauto" alt="">
                        </div>
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ Common::getUserName() }}
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li>{{ renderUrl('Site\SiteMemberController@profile', 'Thông tin cá nhân', ['id' => Common::getObject(Auth::user(), 'id')]) }}</li>
                                <li>{{ renderUrl('Site\SiteMemberController@history', 'Lịch sử làm bài', ['uid' => Common::getObject(Auth::user(), 'id')]) }}</li>
                                <li>{{ renderUrl('Site\SiteUserController@logout', 'Thoát') }}</li>
                            </ul>
                        </div>
                        <span>Xin chào</span>
                        <div class="clr"></div>
                    </div>
                </li>
            @else
                <?php $ssoLib = new HocmaiOAuth2(); ?>
                <li><a class="dang-ky hvr-shadow hocmai-oauth-login" href="{{ $ssoLib->getAuthorizeUri() }}" title="">Đăng ký</a></li>
                <li><a class="dang-nhap hvr-shadow hocmai-oauth-login" href="{{ $ssoLib->getAuthorizeUri() }}" title="">Đăng nhập</a></li>
            @endif
        </ul>
    </div>
</div>