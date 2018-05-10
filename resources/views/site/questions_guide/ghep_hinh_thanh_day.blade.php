<div class="huong-dan-giai text-left" >
    <h2>Hướng dẫn giải</h2>
    <div class="wrapper">
        <p>Hình có quy luật bắt đầu bởi 2 hình:</p>
        <p class="item-sourc">
             <div class="item pull-left inline-block" data-val="0">
                <img src="{{ $img[$imgRand[0]] }}" width="30" height="30"/>
             </div>
            <div class="item pull-left inline-block" data-val="1">
                <img src="{{ $img[$imgRand[1]] }}" width="30" height="30"/>
            </div>
        </p><br>
        <p>Sau đó lặp lại:</p>
        <p class="answers">Đáp án đúng là:</p>
        <br>
        <div class="content inline-block">
            <div class="list-img">
                @for($i = 0; $i < $numTotal; $i++)
                    <div class="item inline-block pull-left {{ ( $i < ($numTotal - $numHide) ) ? '" data-val="'.($i%2).'"' : 'none"' }}">
                        @if($i < $answer)
                            <img src="{{ asset($img[$imgRand[$i%2]]) }}" width="50" height="50" />
                        @endif
                    </div>
                @endfor
                <input type="hidden" name="answer">
            </div>
        </div>
        <button class="btn lam-bai-tiep margin0" data-dismiss="modal" aria-label="Close">Làm bài tiếp</button>
    </div>
</div>
