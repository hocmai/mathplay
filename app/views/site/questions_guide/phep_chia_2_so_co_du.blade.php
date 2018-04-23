<?php
$rules = [
	1 => 'đơn vị',
	2 => 'chục',
	3 => 'trăm',
	4 => 'nghìn',
	5 => 'chục nghìn',
	6 => 'trăm nghìn'
];
$c_rr = []; //dãy chuỗi kq
$a_rr = str_split($a); // a_rr dãy chuỗi số bị chia
$pont = 0;
$pont_rr = count($a_rr); // đếm số phần tử trong số bị chia
$surplus = floor($a/$b); // số dư
?>
<div class="huong-dan-giai text-left" style="display:block;">
	<h2>Hướng dẫn giải</h2>
	<div class="wrapper">
		<span class="col-xs-5 col-sm-3 text-right">
			{{ $a }}<br>
			: {{ $b }}<br>
			<hr>
			?
		</span>
		<span class="col-xs-7 col-sm-9" style="padding-left: 30px">Chia lần lượt từng hàng của số bị chia cho số chia theo chiều từ <b>trái qua phải</b></span>
		<div class="clear clearfix"></div>
		<hr style="border-top: 1px dashed #eee; margin: 8px 0">
		<div class="clearfix"></div>
		<div class="text-right col-xs-5 col-sm-3 left">
            <span class="content">
                <div class="num a">
                    @foreach( $a_rr as $key => $value )
                            {{ $value }}
                        </span>
                    @endforeach
                </div>
                <div class="num b">: 
                    <span class="sing active">
                        {{ $b }}
                    </span>
                </div>
                <hr>
                <div class="num c"> 
                    @foreach( $c_rr as $key => $value )
                            {{ $value }}
                        </span>
                    @endforeach
                </div>
            </span>
        </div> <!-- End left -->
		<span class="col-xs-7 col-sm-9" style="padding-left: 30px">
			lấy {{ $a.' chia cho '.$b.' bằng '.$answer  }}.<br>
			 {{ $answer.' nhân '.$b.' bằng '.$answer*$b }}<br>
			 {{ $a.' trừ '.$answer*$b.' bằng '.($a - ($answer*$b)) }}
		</span>
		<div class="clearfix"></div>
		<p class="answers">Đáp án đúng là: <b>{{ $answer }}</b></p>
		<button class="btn lam-bai-tiep margin0" data-dismiss="modal" aria-label="Close">Làm bài tiếp</button>
	</div>
</div>

