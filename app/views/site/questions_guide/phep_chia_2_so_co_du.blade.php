<?php
$point = 0;
$a_rr = str_split($a);
$c_rr = [];
$surplus =[];
$loop = count($a_rr)-1;
$rules = [
	1 => 'đơn vị',
	2 => 'chục',
	3 => 'trăm',
	4 => 'nghìn',
	5 => 'chục nghìn',
	6 => 'trăm nghìn'
];
		//Hàm ksort() sẽ sắp xếp các phần tử của mảng dựa vào khóa(key). Các cặp key => value được giữ nguyên và chúng chỉ được sắp xếp lại theo thứ tự alphabet.
?>
<div class="huong-dan-giai text-left" style="display: block;" >
	<h2>Hướng dẫn giải</h2>
	<div class="wrapper">
		<span class="col-xs-5 col-sm-3 text-right" >
			{{ $a }}
			<span class="border" style="border-left: 1px solid #000;padding: 0 15px 35px">{{ $b }}</span>
			<hr>
			?
		</span>
		@if($b == 1)
			<p>Bất cứ số nào chia cho 1 thì kết quả cũng bằng chính số đó.</p>
		@else
			<span class="col-xs-7 col-sm-9" style="padding-left: 30px">Chia lần lượt từng hàng của số bị chia cho số chia theo chiều từ <b>trái qua phải.</b></span>
			<div class="clear clearfix"></div>
			<hr style="border-top: 1px dashed #eee; margin: 8px 0">
			<span class="col-xs-5 col-sm-3 text-right" >
				{{ $a }}
				<span class="border" style="border-left: 1px solid #000;padding: 0 15px 35px">{{ $b }}</span>
				<hr>
				<span>{{ $answer }}</span>
			</span>
			<span class="col-xs-7 col-sm-9" style="padding-left: 30px">
				
			</span>
		@endif
		<div class="clearfix"></div>
		<p class="answers">Đáp án đúng là : {{ $answer }}</p>
		<button class="btn lam-bai-tiep margin0" data-dismiss="modal" aria-label="Close">Làm bài tiếp</button>
	</div>
</div>
