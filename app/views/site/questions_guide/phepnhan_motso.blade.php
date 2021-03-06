<?php
$a_rr = str_split($a);
$c_rr = [];
$loop = count($a_rr)-1;
$sub = [];

$rules = [
	1 => 'đơn vị',
	2 => 'chục',
	3 => 'trăm',
	4 => 'nghìn',
	5 => 'chục nghìn',
	6 => 'trăm nghìn'
];
?>

<span class="col-xs-4 col-sm-2 text-right" style="font-size: 18px">
	{{ $a }}<br>
	+ {{ $b }}<br>
	<hr>
	?
</span>
<span class="col-xs-8 col-sm-10" style="padding-left: 30px">Nhân lần lượt thừa số thứ hai với các chữ số của thừa số thứ nhất theo chiều từ <b>phải qua trái.</b></span>
<div class="clear clearfix"></div>
<hr style="border-top: 1px dashed #eee; margin: 8px 0">

<?php $point = 0; ?>
@for ($i = $loop; $i >= 0; $i--)
	<?php
	$point++;
	if( !isset($sub[$i]) ) $sub[$i] = null;
	$c_rr[$i] = ($a_rr[$i] * $b) + $sub[$i];
	if( $c_rr[$i] > 9 && $i > 0 ){
		$sub[$i-1] = floor(($a_rr[$i] * $b + $sub[$i])/10);
		$c_rr[$i] = ($a_rr[$i] * $b)%10 + $sub[$i];
		if( $c_rr[$i] > 9 && $i > 0 ){
			$sub[$i-1] += floor($c_rr[$i]/10);
			$c_rr[$i] = ($c_rr[$i])%10 ;
		}
	}
	ksort($c_rr);
	?>
	<div class="line clear clearfix">
		<div class="text-right col-xs-4 col-sm-2 left">
			<span class="content">
				<div class="num a">
					@foreach( $a_rr as $key => $value )
						<span class="sing {{ returnActiveClass($key, $i) }}">
							{{ $value }}
							<span class="sub">{{ returnStringClass($sub, $key) }}</span>
						</span>
					@endforeach
				</div>
				<div class="num b">x 
					<span class="sing active">
						{{ $b }}
					</span>
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
		<div class="text-left col-xs-8 col-sm-10 right">
			Nhân hàng {{ $rules[$point] }}<br>
			* {{ $a_rr[$i].' x '.$b }}.
			
			@if( $i > 0 )
				@if( !empty($sub[$i] && ($a_rr[$i]*$b) > 9 ) )
					Viết 
				@endif
			@else
			@endif
		</div> <!-- End right -->
	</div> <!-- End line -->
@endfor