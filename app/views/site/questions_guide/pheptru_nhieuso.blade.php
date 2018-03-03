<?php
$rules = [
	1 => 'đơn vị',
	2 => 'chục',
	3 => 'trăm',
	4 => 'nghìn',
	5 => 'chục nghìn',
	6 => 'trăm nghìn'
];
$c_rr = str_split($a-$b);
$a_rr = str_split($a);
$b_rr = str_split($b);
$countb = count($b_rr);
$countc = count($c_rr);
if( count($b_rr) < count($a_rr) ){
	for ($i=0; $i < count($a_rr)-$countb; $i++) {
		array_unshift($b_rr, 0);
	}
}
if( count($c_rr) < count($a_rr) ){
	for ($i=0; $i < count($a_rr)-$countc; $i++) {
		array_unshift($c_rr, 0);
	}
}

$a_sub = [];
$a_sub2 = [];
$a_del = [];
$a_active = [];
$point_re = count($a_rr)-1;
$point = 0;

for ($i=0; $i < count($a_rr); $i++) { 
	$a_rr[$i] = (int)$a_rr[$i];
	$b_rr[$i] = (int)$b_rr[$i];
}
$a_fake = $a_rr;
?>
<div class="huong-dan-giai text-left" style="display">
	<h2>Hướng dẫn giải</h2>
	<div class="wrapper" style="font-size: 18px">
		<span class="col-xs-5 col-sm-3 text-right" style="font-size: 18px">
			{{ $a }}<br>
			- {{ $b }}<br>
			<hr>
			?
		</span>
		<span class="col-xs-7 col-sm-9" style="padding-left: 30px">Trừ các số thẳng cột theo chiều từ phải qua trái</span>
		<div class="clear clearfix"></div>
		<hr style="border-top: 1px dashed #eee; margin: 8px 0">
		
		@for( $i = count($a_rr) -1 ; $i >= 0; $i-- )
			<?php
			$unit_ori = isset($rules[$point+1]) ? $rules[$point+1] : '';
			$a_active = [];
			$a_active[$i] = true;
			if( $a_fake[$i] < $b_rr[$i] ){
				if( isset($a_sub[$i]) ) $a_sub2[$i] = 1;
				if( $a_fake[$i-1] > 0 ){
					$a_sub[$i-1] = $a_fake[$i-1]-1;
					$a_del[$i-1] = true;
					$a_active[$i-1] = true;
					$a_fake[$i-1]--;
				}
				else{
					for ($k= $i-1; $k >= 0 ; $k--) {
						$a_del[$k] = true;
						$a_active[$k] = true;
						if( $a_fake[$k] > 0 ){
							$a_fake[$k]--;
							$a_sub[$k] = $a_fake[$k];
							break;
						} else{
							$a_sub[$k] = 9;
							$a_fake[$k] = 9;
						}
					}
				}
				if( !isset($a_sub[$i]) ) $a_sub[$i] = ( ($a_fake[$i] >= $b_rr[$i] ) ? '' : 1 );
			} ?>
				
			<div class="line clear clearfix">
				<div class="text-right col-xs-5 col-sm-3 left">
					<span class="content">
						<div class="num a">
							@foreach( $a_rr as $key => $value )
								<span class="sing {{ returnStringClass($a_active, $key, 'active') }} {{ returnStringClass($a_del, $key, 'del') }}">
									<span class="sub">{{ returnStringClass($a_sub, $key) }}</span>
									<span class="sub2">{{ returnStringClass($a_sub2, $key) }}</span>
								{{ $value }}</span>
							@endforeach
						</div>
						<div class="num b">- 
							@foreach( $b_rr as $key => $value )
								<span class="sing {{ ($point_re == $key) ? 'bold' : '' }}">{{ $value }}</span>
							@endforeach
						</div>
						<hr>
						<div class="num c"> 
							@for( $m = $i; $m < count($a_rr); $m++ )
								<span class="sing {{ ($i == $m) ? 'bold' : '' }}">{{ $c_rr[$m] }}</span>
							@endfor
						</div>
					</span>
				</div> <!-- End left -->
				<div class="text-left col-xs-7 col-sm-9 right">
					<p>Trừ hàng {{ $unit_ori }}</p>
					@if( $a_fake[$i] >= $b_rr[$i] )
						<strong>* Hàng {{ $unit_ori }}: {{ $a_fake[$i] .' - '. $b_rr[$i] .' = '.($a_fake[$i] - $b_rr[$i]) }}. Viết {{ ($c_rr[$i]) }} vào hàng {{ $unit_ori }}</strong>
					@else
						{{ $a_fake[$i] }} không trừ được {{ $b_rr[$i] }}.
						@if( $a_rr[$i-1] > 0 )
							Mượn 1 {{ isset($rules[$point+2]) ? $rules[$point+2].' ở hàng '.$rules[$point+2] : '' }}<br>
							* Hàng {{ $rules[$point+2].': '.$a_rr[$i-1]. ' ' .$rules[$point+2]. ' cho mượn 1 '.$rules[$point+2]. ' còn '.($a_rr[$i-1] - 1).' '.$rules[$point+2] }} <br>
							<strong>* Hàng {{ $unit_ori }}: {{ ($a_fake[$i]+10) .' - '. $b_rr[$i] .' = '.($a_fake[$i]+10 - $b_rr[$i]) }}. Viết {{ $c_rr[$i] }} vào hàng {{ $unit_ori }}.</strong>
						@else
							<?php
							$point2 = $point+2;
							$print_unit = [];
							$print_unit2 = [];;
							for ($k= $i-1; $k >= 0 ; $k--) {
								$unit = (isset($rules[$point2]) ? $rules[$point2] : '');
								$unit_hight = (isset($rules[$point2+1]) ? $rules[$point2+1] : '');
								echo ($k == $i-1) ? 'Mượn 1 '.$unit.' ở hàng '.$unit.'. ' : '';
								$print_unit2[] = ( ($a_rr[$k] == 0) ? 'Hàng '.$unit.' là 0, ta mượn sang hàng '.$unit_hight : 'Mượn 1 '.$unit.' ở hàng '.$unit );
								if( $a_rr[$k] > 0 ){
									$print_unit[] = '<br>* Hàng '.$unit.': '. $a_rr[$k].' '.$unit.' cho mượn 1 '.$unit.' còn '.($a_rr[$k]-1).' '.$unit.'.';
									break;
								} else{
									$print_unit[] = '<br>* Hàng '.$unit.': 1 '.$unit_hight.' = 10 '.$unit.', cho mượn 1 '.$unit.' còn 9 '.$unit.'.';
								}
								$point2++;
							}
							$print_unit = array_reverse($print_unit);
							echo implode('. ',$print_unit2).'.';
							echo implode('',$print_unit);
							?>
							<br><strong>* Hàng {{ $unit_ori }}: {{ ($a_fake[$i] + 10).' - '.$b_rr[$i].' = '.$c_rr[$i] }}. Viết {{ $c_rr[$i] }} vào hàng {{ $unit_ori }}</strong>
						@endif
					@endif
				</div> <!-- End right -->
			</div> <!-- End line -->
			<?php
				$point++;
				$point_re--;
			?>
		@endfor
		<p class="answers">Đáp án đúng là: <b>{{ $a-$b }}</b></p>
		<button class="btn lam-bai-tiep margin0" data-dismiss="modal" aria-label="Close">Làm bài tiếp</button>
	</div>
</div>

