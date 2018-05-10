<div class="huong-dan-giai text-left">
	<h2>Hướng dẫn giải</h2>
	<div class="wrapper">
		<p>Thực hiện phép tính với các số ở trước hoặc sau mỗi ô nhập</p>
		<p class="answers">Đáp án đúng là:</p>
		<div class="clearfix"></div>
		<div class="inline-block">
			<div class="wrap-zz">
				<?php $checkSub = 0; $checkNum = 0; ?>
				@foreach ( $range as $key => $value )
					@if( $key % 2 > 0 )
						<div class="pull-left sub {{ ($checkSub % 2 == 0) ? 'down' : 'up' }}">
							<span {{ in_array($key, $rangeRand) ? 'class="active"' : '' }}>
								{{ (($value < 0) ? '- ' : '+ ').abs($value) }}
							</span>
						</div>
						<?php $checkSub++; ?>
					@else
						<div class="pull-left num {{ ($checkNum % 2 == 0) ? 'down' : 'up' }}">
							<span {{ in_array($key, $rangeRand) ? 'class="active"' : '' }}>{{ $value }}</span>
						</div>
						<?php $checkNum++; ?>
					@endif
				@endforeach
			</div>
		</div>
		<button class="btn lam-bai-tiep margin0" data-dismiss="modal" aria-label="Close">Làm bài tiếp</button>
	</div>
</div>