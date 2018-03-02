<div class="huong-dan-giai text-left" style="display: block;">
	<h2>Hướng dẫn giải</h2>
	<div class="wrapper">
		@if( $type == 'coin' )
			<p class="answers">-Ta quan sát thấy cân lệch bên {{ getRandArrayVal(['trái', 'phải']) }}  thì ta kích  bên lệch {{ getRandArrayVal(['trái', 'phải']) }} vào đồng xu sao cho cân bằng 2 bên</p>
		@else
			<p>Ta thấy {{ $numRand1.' + '.($num1 - $numRand1).' = '.($numRand1 + ($num1 - $numRand1)) }}</p>
			<p>Ta thấy {{ $numRand2.' + '.($num2 - $numRand2).' = '.($numRand2 + ($num2 - $numRand2)) }}</p>
			<p >Trường hợp: 2 cân k lệch thì luôn là đáp án <b>sai</b> </p>
			<p class="answers"> Như vậy bên nào lớn hơn thì nặng hơn</p>
		@endif
		<button class="btn lam-bai-tiep margin0" data-dismiss="modal" aria-label="Close">Làm bài tiếp</button>
	</div>
</div>