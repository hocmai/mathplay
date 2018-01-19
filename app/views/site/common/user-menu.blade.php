
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
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-chevron-down" aria-hidden="true"></i></a>
            <ul class="dropdown-menu">
                @foreach(Common::getAllGrade() as $grade)
                    <li>
                        {{ renderUrl('SiteGradeController@show', $grade->title, ['grade_slug' => $grade->slug], []) }}
                    </li>
                @endforeach
            </ul>
        </li>
            <?php $ssoLib = new HocmaiOAuth2(CLIENT_ID, CLIENT_SECRET, CLIENT_REDIRECT_URI); ?>
            <li><a class="dang-ky hvr-shadow hocmai-oauth-login" href="{{ $ssoLib->getAuthorizeUri() }}" title="">Đăng ký</a></li>
            <li><a class="dang-nhap hvr-shadow hocmai-oauth-login" href="{{ $ssoLib->getAuthorizeUri() }}" title="">Đăng nhập</a></li>
        {{-- @endif --}}
    </ul>
</div>
