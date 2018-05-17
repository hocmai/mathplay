<?php
if($num[0] > $num[1]){
	$sosanh = '>';
}else {
	$sosanh = '<';
}
 ?>
<div class="huong-dan-giai text-left">
    <h2>Hướng dẫn giải</h2>
    <div class="wrapper">
    	<p>Hình thứ nhất có {{ $num[0].' '.$find }}</p>
    	<p>Hình thứ hai có {{ $num[1].' '.$find }}</p>
    	<p>Ta có {{ $num[0].' '.$sosanh.' '.$num[1] }}</p>
    	<p class="answers">Như vậy hình {{ (($answer == $num[0])? 'thứ hai': 'thứ nhất').' có số '.$find.' '.(($answer < $num[1]) ? 'bé hơn' : 'lớn hơn') }}</p>
    	<button class="btn lam-bai-tiep margin0" data-dismiss="modal" aria-label="Close">Làm bài tiếp</button>
    </div>
</div>