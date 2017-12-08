<?php
if( count($a) == 1 ){
	$a1 = 0; $a2 = (int)$a[0];
} else{
	$a1 = (int)$a[0]; $a2 = (int)$a[1];
}
if( count($b) == 1 ){
	$b1 = 0; $b2 = (int)$b[0];
} else{
	$b1 = (int)$b[0]; $b2 = (int)$b[1];
}
if( count($c) == 1 ){
	$c1 = 0; $c2 = (int)$c[0];
} else{
	$c1 = (int)$c[0]; $c2 = (int)$c[1];
}
?>
<div class="huong-dan-giai text-left" style="display">
	<h2>Hướng dẫn giải</h2>
	<div class="wrapper">
		<p><strong>Cách 1: </strong></p>
		<span class="pull-left text-right" style="font-size: 18px">
			{{ $a1.$a2 }}<br>
			- {{ $b1.$b2 }}<br>
			<hr>
			?
		</span>
		<span class="pull-left" style="margin-left: 30px">Trừ các số thẳng cột theo chiều từ phải qua trái</span>
		<div class="clear clearfix"></div>
		<hr style="border-top: 1px dashed #eee; margin: 8px 0">

		<span class="pull-left text-right" style="font-size: 18px">
			{{ $a1 }}<span class="red font-bold">{{ $a2 }}<sup style="top: -15px;right: 8px;width: 0px;display: inline-block;font-size: 10px;">1</sup></span><br>
			- <span>{{ $b1 }}<sup style="top: -15px;right: 8px;width: 0px;display: inline-block;font-size: 10px;">1</sup></span><span class="red font-bold">{{ $b2 }}</span><br>
			<hr>
			<span class="red font-bold">{{ ($a2+10)-$b2 }}</span>
		</span>
		<span class="pull-left" style="margin-left: 30px">Trừ hàng đơn vị {{ $a2 }} không trừ được {{ $b2 }}. Lấy {{ $a2+10 }} – {{ $b2 }} = {{ $a2+10-$b2 }}.  Viết {{ $a2+10-$b2 }} (thẳng hàng đơn vị), nhớ 1.</span>
		<div class="clear clearfix"></div>
		<hr style="border-top: 1px dashed #eee; margin: 8px 0">
		
		<span class="pull-left text-right" style="font-size: 18px">
			<span class="red font-bold">{{ $a1 }}</span>{{ $a2 }}<sup style="top: -15px;right: 8px;width: 0px;display: inline-block;font-size: 10px;">1</sup><br>
			- <span class="red font-bold">{{ $b1 }}<sup style="top: -15px;right: 8px;width: 0px;display: inline-block;font-size: 10px;">1</sup></span>{{ $b2 }}<br>
			<hr>
			<span class="red font-bold">{{ $a1-$b1-1 }}</span>{{ $a2+10-$b2 }}
		</span>
		<span class="pull-left" style="margin-left: 30px">Trừ hàng chục<br>{{ $b1 }} nhớ 1 là {{ $b1+1 }}<br>{{ $a1.' - '.($b1+1).' = '.( $a1-$b1-1 ) }}. Viết {{ $a1-$b1-1 }} (thẳng hàng chục)</span>
		<div class="clear clearfix"></div>
		
		{{-- ///////////////////////////////	 --}}
		

		<hr style="border-top: 1px dashed #999; margin: 15px 0">
		<p><strong>Cách 2: </strong></p>
		<span class="pull-left text-right" style="font-size: 18px">
			{{ $a1.$a2 }}<br>
			- {{ $b1.$b2 }}<br>
			<hr>
			?
		</span>
		<span class="pull-left" style="margin-left: 30px">Trừ các số thẳng cột theo chiều từ phải qua trái</span>
		<div class="clear clearfix"></div>
		<hr style="border-top: 1px dashed #eee; margin: 8px 0">

		<span class="pull-left text-right" style="font-size: 18px">
			<span>{{ $a1 }}<sup style="top: -15px;right: 8px;width: 0px;display: inline-block;font-size: 10px;">{{ $a1-1 }}</sup></span><span class="red font-bold">{{ $a2 }}<sup style="top: -15px;right: 8px;width: 0px;display: inline-block;font-size: 10px;">1</sup></span><br>
			- {{ $b1 }}<span class="red font-bold">{{ $b2 }}</span><br>
			<hr>
			<span class="red font-bold">{{ ($a2+10)-$b2 }}</span>
		</span>
		<span class="pull-left" style="margin-left: 30px">Trừ hàng đơn vị<br>{{ $a2 }} không trừ được {{ $b2 }}. Mượn 1 chục của hàng chục, ta được<br>{{ 10+$a2 }} – {{ $b2 }} = {{ $a2+10-$b2 }}. Viết {{ $a2+10-$b2 }} (thẳng hàng đơn vị)<br>{{ $a1 }} chục cho mượn 1 chục còn {{ $a1-1 }} chục</span>
		<div class="clear clearfix"></div>
		<hr style="border-top: 1px dashed #eee; margin: 8px 0">
		
		<span class="pull-left text-right" style="font-size: 18px">
			<span>{{ $a1 }}<sup style="top: -15px;right: 8px;width: 0px;display: inline-block;font-size: 10px;">{{ $a1-1 }}</sup></span><span>{{ $a2 }}<sup style="top: -15px;right: 8px;width: 0px;display: inline-block;font-size: 10px;">1</sup></span><br>
			- <span class="red font-bold red">{{ $b1 }}</span>{{ $b2 }}<br>
			<hr>
			<span class="red font-bold">{{ $a1-$b1-1 }}</span>{{ $a2+10-$b2 }}
		</span>
		<span class="pull-left" style="margin-left: 30px">Trừ hàng chục<br>{{ $a1 }} trừ 1 là {{ $a1-1 }}<br>{{ ($a1-1).' - '.$b1.' = '.( $a1-$b1-1 ) }}. Viết {{ $a1-$b1-1 }} (thẳng hàng chục)</span>
		<div class="clear clearfix"></div>

	</div>
</div>