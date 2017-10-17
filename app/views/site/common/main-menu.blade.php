<?php $grades = Grade::all(); ?>
<!-- Desktop screen -->
<header class="">
    <div class="box-dang-nhap">
        <div class="container">
            @include('site.common.user-menu')
        </div>
    </div>
    <div class="box-menu">
        <div class="container">
            <a class="logo" href="/" title="">
                <img src="{{ asset('frontend/images/logo.png')}}" class="img-responsive" alt=""/>
            </a>
            <div class="menu">
                <div class="rmm style">
                    <ul class="fl hidden-xs hidden-sm">
                        <li class="active">
                            <a href="/">
                                <div class="bg-hv"><span></span></div>
                                Trang chủ
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="bg-hv"><span></span></div>
                                Lớp học
                            </a>
                            <ul>
                                @foreach($grades as $grade)
                                    <li>
                                        @if(Auth::admin()->check() | $grade->status == 1)
                                            {{ renderUrl('SiteGradeController@show', $grade->title, ['grade_slug' => $grade->slug], []) }}
                                        @endif
                                    </li>
                                @endforeach
                                <li class="bg-color"></li>
                            </ul>
                        </li>
                        <li>
                            <a href="index.html">
                                <div class="bg-hv"><span></span></div>
                                Giới thiệu
                            </a>
                        </li>
                        <li>
                            <a href="index.html">
                                <div class="bg-hv"><span></span></div>
                                Liên hệ
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>