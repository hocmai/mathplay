<div class="huong-dan-giai text-left">
	<h2>Hướng dẫn giải</h2>
	<div class="wrapper">
		<p>Thực hiện lần lượt từng phép nhân cho trước:</p>
		@foreach ($rand_arr as $element)
			<p>{{ $element['text'].' = '.$element['num'].', '.$element['num'].' '.$element['sosanh'].' '.$number.' => '.$element['text'].' <b>'.$element['sosanh'].'</b> '.$number }}</p>
		@endforeach
		<button class="btn lam-bai-tiep margin0" data-dismiss="modal" aria-label="Close">Làm bài tiếp</button>
	</div>
</div>