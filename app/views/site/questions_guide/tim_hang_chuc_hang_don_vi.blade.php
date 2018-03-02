<div class="huong-dan-giai text-left">
	<h2>Hướng dẫn giải</h2>
	<div class="wrapper">
		<P>{{ $tens.' là số hàng chục'.' ('.($tens*10).')' }}</P>
		<P>{{ $ones.' là số đơn vị ' }}</P>
		<p class="answers"> Đáp án đúng là: {{ ($answer == 0) ? $tens*10 : $ones }}</p>
		<button class="btn lam-bai-tiep margin0" data-dismiss="modal" aria-label="Close">Làm bài tiếp</button>
	</div>
</div>