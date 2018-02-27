<?php
//// kiem tra so can tim la ve nao
$left = false;
if($find == 'a' || $find == 'b'){
	$left = true;
}?>
<div class="huong-dan-giai text-left">
	<h2>Hướng dẫn giải</h2>
	<div class="wrapper">
		<p>
			{{ ($find == 'a') ? '<b>?</b>' : $a }}
			{{ ($type == 'plus') ? ' + ' : ' - ' }}
			{{ ($find == 'b') ? '<b>?</b>' : $b }}
			 = 
			{{ ($find == 'c') ? '<b>?</b>' : $c }}
			{{ ($type == 'plus') ? ' + ' : ' - ' }}
			{{ ($find == 'd') ? '<b>?</b>' : $d }}
		</p><hr>

		@if($type == 'plus')
			{{-- Neu la phep cong --}}
			<p>Đầu tiên thực hiện phép cộng: {{ ($left) ? $c.' + '.$d.' = '.($a+$b) : $a.' + '.$b.' = '.($c+$d) }}</p>
			@if( $left )
				<p>{{ (($find == 'a') ? '<b>?</b>' : $a ).' + '.(($find == 'b') ? '<b>?</b>' : $b ).' = '.$c.' + '.$d }}</p>
				<p>{{ (($find == 'a') ? '<b>?</b>' : $a ).' + '.(($find == 'b') ? '<b>?</b>' : $b ).' = '.($c+$d) }}</p>
				<p><b>?</b> = {{ ($c+$d).' - '.( ($find == 'b') ? $a : $b ) }}</p>
			@else
				<p>{{ $a.' + '.$b.' = '.(($find == 'c') ? '<b>?</b>' : $c ).' + '.(($find == 'd') ? '<b>?</b>' : $d ) }}</p>
				<p>{{ ($a+$b).' = '.(($find == 'c') ? '<b>?</b>' : $c ).' + '.(($find == 'd') ? '<b>?</b>' : $d ) }}</p>
				<p><b>?</b> = {{ ($a+$b).' - '.( ($find == 'd') ? $c : $d ) }}</p>
			@endif
		@else
			{{-- Neu la phep tru --}}
			<p>Đầu tiên thực hiện phép trừ: {{ ($left) ? $c.' - '.$d.' = '.($a-$b) : $a.' - '.$b.' = '.($c-$d) }}</p>
			@if( $left )
				<p>{{ (($find == 'a') ? '<b>?</b>' : $a ).' - '.(($find == 'b') ? '<b>?</b>' : $b ).' = '.$c.' - '.$d }}</p>
				<p>{{ (($find == 'a') ? '<b>?</b>' : $a ).' - '.(($find == 'b') ? '<b>?</b>' : $b ).' = '.($c-$d) }}</p>
				<p><b>?</b> = {{ ($find == 'b') ? $a.' - '.($c-$d) : ($c-$d).' + '.$b }}</p>
			@else
				<p>{{ $a.' - '.$b.' = '.(($find == 'c') ? '<b>?</b>' : $c ).' - '.(($find == 'd') ? '<b>?</b>' : $d ) }}</p>
				<p>{{ ($a-$b).' = '.(($find == 'c') ? '<b>?</b>' : $c ).' - '.(($find == 'd') ? '<b>?</b>' : $d ) }}</p>
				<p><b>?</b> = {{ ($find == 'd') ? $c.' - '.($a-$b) : ($a-$b).' + '.$d }}</p>
			@endif
		@endif
		<p><b>?</b> = {{ $_arr[$find] }}</p>
		<p class="answers">Như vậy, số phải điền vào dấu <b>?</b> là <b>{{ $_arr[$find] }}</b></p>
		<button class="btn lam-bai-tiep margin0" data-dismiss="modal" aria-label="Close">Làm bài tiếp</button>
	</div>
</div>