<div class="huong-dan-giai text-left"  >
	<h2>Hướng dẫn giải</h2>
	<div class="wrapper">
		<p>* Nhớ<br>
			-Độ dài đường bao quanh mép của một hình được gọi là chu vi của nó.<br>
			- Để tìm chu vi của một hình bất kì, ta cộng độ dài của tất cả các cạnh của hình đó.<br>
			- Ta thường tính chu vi bằng các đơn vị đo độ dài như: mi-li-mét, xăng-ti-mét, mét, …
		</p>
		<p>* Giải <br>
			Hình đã cho có độ dài các cạnh lần lượt là 
			@if($answer == 'binh-hanh')
				{{ $a.' '.$unit.' , '.$b.' '.$unit.' , '.$a.' '.$unit.' , '.$b.' '.$unit }}
			@elseif($answer =='vuong')
				{{ $a.' '.$unit.', '.$a.' '.$unit.', '.$a.' '.$unit.', '.$a.' '.$unit }}
			@elseif($answer == 'chu-nhat')
				{{ $a.' '.$unit.','.$b.' '.$unit.','.$a.' '.$unit.','.$b.' '.$unit }}
			@else
				{{ $a.' '.$unit.', '.$a.' '.$unit.', '.$b.' '.$unit }}

			@endif
		</p>
		<p>Như vậy, chu vi của hình đã cho là:
			@if($answer == 'binh-hanh')
				{{ '2'.'x'.'('.$a.'+'.$b.')'.' = '.$perimeter.$unit }}
			@elseif($answer =='vuong')
				{{ $a.' '.$unit.' + '.$a.' '.$unit.' + '.$a.' '.$unit.' + '.$a.' '.$unit.' = '.$perimeter.$unit }}
			@elseif($answer == 'chu-nhat')
				{{ '2'.'x'.'('.$a.'+'.$b.')'.' = '.$perimeter.$unit }}

			@else
				{{ $a.' '.$unit.' x '.$a.' '.$unit.' x '.$b.' '.$unit.' = '.$perimeter.$unit }}

			@endif
		</p>
		<div class="clearfix"></div>
		<p  class="answers"> Đáp án: {{ $perimeter.' '.$unit }}</p>
		<button class="btn lam-bai-tiep margin0" data-dismiss="modal" aria-label="Close">Làm bài tiếp</button>
	</div>
</div>