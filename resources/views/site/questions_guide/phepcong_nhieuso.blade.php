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

<div class="huong-dan-giai text-left">
	<h2>Hướng dẫn giải</h2>
	<div class="wrapper">
	@if($a == 0 || $b == 0)
		<p>Bất cứ số nào cộng với 0 thì kết quả cũng bằng chính số đó.</p>
		<div class=" col-xs-5 col-sm-3 text-center plus-table " style="border: 1px solid #eee">
			@for($i = 0; $i < 10; $i++ )
				<div class="inline-block">{{ $i.' + '.$a.' = '.($i+$a) }}</div>
			@endfor
		</div>
		<div class="clear clear-fix"></div>
		<p class="answers"> Như vậy đáp án đúng là: {{ $a.' + '.$b.' = '.($a+$b) }}</p>
	@elseif($a > 1 && $a <20 || $b >1 && $b < 20)
		<p>Ghi nhớ bảng cộng {{ $a }}</p>
		<div class=" col-xs-5 col-sm-3 text-center plus-table " style="border: 1px solid #eee">
			@for($i = 1; $i <= 15; $i++ )
				<div>{{ $a.' + '.$i.' = '.($i+$a) }}</div>
			@endfor
		</div>
		<div class="clear clear-fix"></div>
		<p class="answers">Như vậy đáp án đúng là: {{ $a.' + '.$b.' = '.($a+$b) }}</p>
	@else
		<span class="col-xs-5 col-sm-3 text-right">
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
		<p class="answers">Đáp án đúng là: <b>{{ $a+$b }}</b></p>
	@endif
		<button class="btn lam-bai-tiep margin0" data-dismiss="modal" aria-label="Close">Làm bài tiếp</button>
	</div>
</div>
