<div class="huong-dan-giai text-left" >
	<h2>Hướng dẫn giải</h2>
	<div class="wrapper">
		@if( $method == 'plus' )
		<p></p>
			<p>Tìm số đứng sau {{ $number.', '.$plus.' đơn vị thực hiện phép tính sau:' }}</p>
			<p>Biểu thức là: {{ $number.' + '.$plus.' = '.$answer }}</p>
		@else
			<p>Tìm số đứng trước {{ $number.', '.$plus.' đơn vị thực hiện phép tính sau:' }}</p>
			<p>Biểu thức là: {{ $number.' - '.$plus.' = '.$answer }}</p>
		@endif
			<p class="answers"> Đáp án Đúng là: {{ $answer }}</p>

		<button class="btn lam-bai-tiep margin0" data-dismiss="modal" aria-label="Close">Làm bài tiếp</button>
	</div>
</div>