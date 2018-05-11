<div class="tab-content">
    <ul class="nav nav-tabs nav-justified">
        <li>
            {{ renderUrl('Site\SiteMemberController@history', 'Bảng điểm', ['uid' => Auth::user()->id], ['class' => 'history']) }}
        </li>
        <li>
            {{ renderUrl('Site\SiteMemberController@historyScore', 'Tiến trình', ['uid' => Auth::user()->id], ['class' => 'score']) }}
        </li>
        <li>
            {{ renderUrl('Site\SiteMemberController@historyQuestion', 'Lịch sử làm bài', ['uid' => Auth::user()->id], ['class' => 'log']) }}
        </li>
    </ul>
</div>