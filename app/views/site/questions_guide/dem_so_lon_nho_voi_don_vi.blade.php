<div class="huong-dan-giai text-left" >
	<h2>Hướng dẫn giải</h2>
	<div class="wrapper">
		@if( $method == 'plus' )
			<p>Bạn lấy số {{ $number.' cộng '.$plus.' đơn vị' }}</p>
			<p>Biểu thức là: {{ $number.' + '.$plus.' = '.$answer }}</p>
		@else
			<p>Bạn lấy số {{ $number.' trừ '.$plus.' đơn vị' }}</p>
			<p>Biểu thức là: {{ $number.' - '.$plus.' = '.$answer }}</p>
		@endif
			<p class="answers"> Đáp án Đúng là: {{ $answer }}</p>

		<button class="btn lam-bai-tiep margin0" data-dismiss="modal" aria-label="Close">Làm bài tiếp</button>
	</div>
</div>