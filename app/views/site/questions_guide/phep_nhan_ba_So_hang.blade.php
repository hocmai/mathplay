<div class="huong-dan-giai text-left" >
    <h2>Hướng dẫn giải</h2>
    <div class="wrapper">
        <p>-Thực hiện phép nhân {{ $a.' và '.$b }}.</p>
        <p>{{ '<b style=" color:blue">'.$a.'</b>'.' x '.'<b style=" color:blue">'.$b.'</b>'.' x '.$c.' = ?' }}</p>
        <p>{{ '<b style=" color:blue">'.($a*$b).'</b>'.' x '.$c.' = ?' }}</p>
        <p>-Thực hiện phép nhân {{ ($a*$b).' và '.$c }}.</p>
        <p>{{ '<b style=" color:blue">'.($a*$b).'</b>'.' x '.'<b style=" color:blue">'.$c.'</b>'.' = '.($a*$b*$c) }}</p>
        <p class="answers">Đáp án cần điền là: {{ ($a*$b*$c) }}</p>
        <button class="btn lam-bai-tiep margin0" data-dismiss="modal" aria-label="Close">Làm bài tiếp</button>
    </div>
</div>