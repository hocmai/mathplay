<?php
$a1 = $a;
$a = max($a1, $b);
$b = min($a1, $b);
$a_rr = str_split($a);
$b_rr = str_split($b);
$c_rr = [];
$loop = count($a_rr)-1;
$sub = [];
$count_a = count($a_rr);
$count_b = count($b_rr);

$rules = [
	1 => 'đơn vị',
	2 => 'chục',
	3 => 'trăm',
	4 => 'nghìn',
	5 => 'chục nghìn',
	6 => 'trăm nghìn'
];

if( $count_b < $count_a ){
	for ($i = 0; $i < ($count_a - $count_b); $i++){
		array_unshift($b_rr, 0);
	}
}?>

<span class="col-xs-5 col-sm-3 text-right" style="font-size: 18px">
	{{ $a }}<br>
	+ {{ $b }}<br>
	<hr>
	?
</span>
<span class="col-xs-7 col-sm-9" style="padding-left: 30px">Cộng lần lượt các số thẳng cột theo chiều từ phải qua trái</span>
<div class="clear clearfix"></div>
<hr style="border-top: 1px dashed #eee; margin: 8px 0">

<?php $point = 0; ?>
@for ($i = $loop; $i >= 0; $i--)
	<?php
	$point++;
	if( !isset($sub[$i]) ) $sub[$i] = null;
	$c_rr[$i] = $a_rr[$i] + $b_rr[$i] + $sub[$i];
	if( $c_rr[$i] > 9 && $i > 0 ){
		$sub[$i-1] = 1;
		$c_rr[$i] = $c_rr[$i] - 10;
	}
	ksort($c_rr);
	?>
	<div class="line clear clearfix">
		<div class="text-right col-xs-5 col-sm-3 left">
			<span class="content">
				<div class="num a">
					@foreach( $a_rr as $key => $value )
						<span class="sing {{ returnActiveClass($key, $i) }}">
							{{ $value }}
							<span class="sub">{{ returnStringClass($sub, $key) }}</span>
						</span>
					@endforeach
				</div>
				<div class="num b">+ 
					@foreach( $b_rr as $key => $value )
						<span class="sing {{ returnActiveClass($key, $i) }}">
							{{ $value }}
						</span>
					@endforeach
				</div>
				<hr>
				<div class="num c"> 
					@foreach( $c_rr as $key => $value )
						<span class="sing {{ returnActiveClass($key, $i) }}">
							{{ $value }}
						</span>
					@endforeach
				</div>
			</span>
		</div> <!-- End left -->
		<div class="text-left col-xs-7 col-sm-9 right">
			Cộng hàng {{ $rules[$point] }}<br>
			* {{ !empty($sub[$i]) ? $sub[$i].' + ' : '' }}{{ $a_rr[$i] }} + {{ $b_rr[$i] }} = {{ $sub[$i] + $a_rr[$i] + $b_rr[$i] }}. Viết {{ ($i > 0 && ($a_rr[$i] + $b_rr[$i]) > 9 ) ? $c_rr[$i].', nhớ 1': $c_rr[$i] }}.
		</div> <!-- End right -->
	</div> <!-- End line -->	
@endfor
<button class="btn lam-bai-tiep margin0" data-dismiss="modal" aria-label="Close">Làm bài tiếp</button>
{{-- {{ dd($c_rr) }} --}}