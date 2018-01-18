
<div class="navbar-header">
    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-menu-mathplay" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
</div>
<div class="collapse navbar-collapse pull-right" id="main-menu-mathplay">
    <ul class="nav navbar-nav">
        {{-- <li><a href="#">Curriculum <span class="caret"></span></a></li> --}}
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Chọn lớp học</a>
            <ul class="dropdown-menu">
                @foreach(Common::getAllGrade() as $grade)
                    <li>
                        {{ renderUrl('SiteGradeController@show', $grade->title, ['grade_slug' => $grade->slug], []) }}
                    </li>
                @endforeach
            </ul>
        </li>
        {{-- @if(Auth::user()->check())
            <li class="box-info">
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
                            <li>{{ renderUrl('SiteMemberController@history', 'Lịch sử làm bài', ['uid' => Common::getObject(Auth::user()->get(), 'id')]) }}</li>
                            <li>{{ renderUrl('SiteUserController@logout', 'Thoát') }}</li>
                        </ul>
                    </div>
                    <span>Xin chào</span>
                    <div class="clr"></div>
                </div>
            </li>
        @else --}}
            <?php $ssoLib = new HocmaiOAuth2(CLIENT_ID, CLIENT_SECRET, CLIENT_REDIRECT_URI); ?>
            <li><a class="dang-ky hvr-shadow hocmai-oauth-login" href="{{ $ssoLib->getAuthorizeUri() }}" title="">Đăng ký</a></li>
            <li><a class="dang-nhap hvr-shadow hocmai-oauth-login" href="{{ $ssoLib->getAuthorizeUri() }}" title="">Đăng nhập</a></li>
        {{-- @endif --}}
    </ul>
</div>
