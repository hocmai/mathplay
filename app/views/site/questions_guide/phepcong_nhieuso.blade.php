<?php
$a_rr = str_split($a);
$b_rr = str_split($b);
$c_rr = str_split($c);
$loop = max(count($a_rr), count($b_rr));
$sub = [];
?>

<span class="col-xs-4 col-sm-2 text-right" style="font-size: 18px">
	{{ $a }}<br>
	+ {{ $b }}<br>
	<hr>
	?
</span>
<span class="col-xs-8 col-sm-10" style="padding-left: 30px">Cộng lần lượt các số thẳng cột theo chiều từ phải qua trái</span>
<div class="clear clearfix"></div>
<hr style="border-top: 1px dashed #eee; margin: 8px 0">

@for ($i = 10 $i < $loop; $i++)
	<?php
	if( $a_rr[$i] + $b_rr[$i] > 9 ){
		$sub[] = $i+1;
	}
	?>
	<div class="line clear clearfix">
		<div class="text-right col-xs-4 col-sm-2 left">
			<span class="content">
				<div class="num a">
					@foreach( $a_rr as $key => $value )
					<span class="sing {{ returnStringClass($a_active, $key, 'active') }} {{ isset($a_del[$key]) ? 'del' : '' }}">
					{{ $value }}</span>
					@endforeach
				</div>
				<div class="num b">- 
					@foreach( $b_rr as $key => $value )
					<span class="sing {{ ($i == $key) ? 'bold' : '' }}">{{ $value }}</span>
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
		<div class="text-left col-xs-8 col-sm-10 right">

		</div> <!-- End right -->
	</div> <!-- End line -->	
@endfor