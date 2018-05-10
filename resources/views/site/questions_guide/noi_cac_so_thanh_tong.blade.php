<div class="huong-dan-giai text-left"   >
	<h2>Hướng dẫn giải</h2>
	<div class="wrapper">
		<p>Các cặp số có tổng là: {{ $total }}</p>
		<p>
			@foreach($range1 as $key => $value)
				{{ '('.$value.'  '.($range2[] = $total - $value).')' }}
			@endforeach
		</p>

		<p class="answers"> Như vậy cứ  số ở dãy 1 cộng với số ở dãy 2 bằng <b>{{ $total }}</b> thì nối với nhau</p>
		<button class="btn lam-bai-tiep margin0" data-dismiss="modal" aria-label="Close">Làm bài tiếp</button>
	</div>
</div>