<div class="huong-dan-giai text-left" style="display: block;">
	<h2>Hướng dẫn giải</h2>
	<div class="wrapper">
		@if( $type == 'coin' )
		<p>-Ta quan sát thấy cân lệch bên {{ getRandArrayVal(['trái', 'phải']) }}  thì ta kích ngược bên lệch vào đồng xu sao cho cân bằng 2 bên</p>
		@else
		<p>Ta thấy {{ $numRand1.' + '.($num1 - $numRand1) }}</p>
		@endif
		<button class="btn lam-bai-tiep margin0" data-dismiss="modal" aria-label="Close">Làm bài tiếp</button>
	</div>
</div>