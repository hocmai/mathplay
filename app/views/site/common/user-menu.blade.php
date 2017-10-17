@if(Auth::user()->check())
    <div class="box-info">
        <div class="text">
            <div class="avatar">
                <img src="{{ asset('frontend/images/avata.jpg') }}" class="img-responsive mauto" alt="">
            </div>
            <div class="btn-group" role="group">
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ Auth::user()->get()->username }}
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                    <li>{{ renderUrl('SiteMemberController@history', 'Lịch sử làm bài', ['uid' => Auth::user()->get()->id]) }}</li>
                    <li>{{ renderUrl('SiteUserController@logout', 'Thoát') }}</li>
                </ul>
            </div>
            <span>Xin chào</span>
            <div class="clr"></div>
        </div>
    </div>
@else
    <?php $ssoLib = new HocmaiOAuth2(CLIENT_ID, CLIENT_SECRET, CLIENT_REDIRECT_URI); ?>
    <a class="dang-ky hvr-shadow hocmai-oauth-login" href="{{ $ssoLib->getAuthorizeUri() }}" title="">Đăng ký</a>
    <a class="dang-nhap hvr-shadow hocmai-oauth-login" href="{{ $ssoLib->getAuthorizeUri() }}" title="">Đăng nhập</a>
@endif