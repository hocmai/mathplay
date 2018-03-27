<?php
//// Sap xep tang dan
asort($numArr, SORT_NUMERIC);
$trueArr = $numArr;
?>
<div class="huong-dan-giai text-left">
	<h2>Hướng dẫn giải</h2>
	<div class="wrapper">
		<p>Theo yêu cầu của đề bài, ta thực hiện so sánh các số trong dãy với nhau để tìm số {{ ($sort == 'asc') ? 'lớn nhất': 'bé nhất' }}.</p>
		<p>Dãy dưới đây là dãy được sắp sếp từ bé đến lớn</p>
		<p>Số bé nhất là số được bắt đầu từ trái trong dãy số</p>
		<p>Số lớn nhất là số kết thúc dãy số</p>
		<div>
			@foreach($trueArr as $key => $value)
				<div class="item sort pull-left">{{ $value }}</div>
			@endforeach
		</div>
		<div class="clear clear-fix"></div>
		<p class="answers">Như vậy số {{ ($sort == 'asc') ? 'lớn nhất': 'bé nhất' }} cần tìm là: {{ $answer }}</p>
		<button class="btn lam-bai-tiep margin0" data-dismiss="modal" aria-label="Close">Làm bài tiếp</button>
	</div>
</div>