<div class="huong-dan-giai text-left" style="display: block">
	<h2>Hướng dẫn giải</h2>
	<div class="wrapper">
		<p>Ta thực hiện phép nhân trước: {{ $a.' x '.$b.' = '.($a*$b) }}</p>
		@if( $method == 'sub' )
			<p>Lấy kết quả của phép nhân, thực hiện phép trừ tiếp theo: {{ ($a*$b).' - '.$c.' = '.($a*$b-$c) }}</p>
			<p>Phép tính đúng là: {{ $a.' x '.$b.' = '.($a*$b) }} ; {{ ($a*$b).' - '.$c.' = '.($a*$b-$c) }}</p>
		@else
			<p>Lấy kết quả của phép nhân, thực hiện phép cộng tiếp theo: {{ ($a*$b).' + '.$c.' = '.($a*$b+$c) }}</p>
			<p>Phép tính đúng là: {{ $a.' x '.$b.' = '.($a*$b) }} ; {{ ($a*$b).' + '.$c.' = '.($a*$b+$c) }}</p>
		@endif
		<p class="answers">Hai số cần tìm lần lượt là: <b>{{ $a*$b }}</b> và <b>{{ ($method == 'sub') ? $a*$b-$c : $a*$b+$c }}</b></p>
		<button class="btn lam-bai-tiep margin0" data-dismiss="modal" aria-label="Close">Làm bài tiếp</button>
	</div>
</div>