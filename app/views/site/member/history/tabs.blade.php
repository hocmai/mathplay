<div class="tab-content">
    <ul class="nav nav-tabs nav-justified">
        <li>
            {{ renderUrl('SiteMemberController@history', 'Bảng điểm', ['uid' => Auth::user()->get()->id], ['class' => 'history']) }}
        </li>
        <li>
            {{ renderUrl('SiteMemberController@historyScore', 'Tiến trình', ['uid' => Auth::user()->get()->id], ['class' => 'score']) }}
        </li>
        <li>
            {{ renderUrl('SiteMemberController@historyQuestion', 'Lịch sử làm bài', ['uid' => Auth::user()->get()->id], ['class' => 'log']) }}
        </li>
    </ul>
</div>