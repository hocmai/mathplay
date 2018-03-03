<?php $count = 1; ?>
<div class="huong-dan-giai text-left" style="display">
	<h2>Hướng dẫn giải</h2>
	<div class="wrapper">
		<div class="content form-group clearfix text-center">
			@if( $countType == 'dem-hinh-anh' )
				@for($i = 1; $i <= $answer; $i++)
					<div class="pull-left" style="margin: 10px">
						<img src="{{ $img_data[$img_rand] }}" width="70" class="pull-left" />
						<?php if( $i == $answer ) print "<span class='fa fa-star'></span>";
							if( $i == ($count) ) print "<span class='last'>$i</span>";
						?>
						
					</div>
					@if( $i == 5 ) <div class="clearfix"></div> @endif
					<?php if( $i <= $count && $count < $answer ) $count++; ?>
				@endfor
			@else
				{{-- @for( $j = 1; $j <= floor($answer/10); $j++ ) --}}
					<table class="frame pull-left" style="margin: 10px">
						@for( $k = 1; $k <= 2; $k++ )
							<tr>
								@for($i = ( ($k == 1) ? 1 : 6 ); $i <= 5*$k; $i++)
									<td style="border: 5px solid #bee8fb; padding: 10px">
										@if( $countType == 'dem-o-con-thieu' )
											@if( $i <= (10 - $answer) )
												<div class="{{ $shape[$rand_shape] }}"></div>
											@else
												<div class="unknown shape-none">
													<strong class="num">{{ $count }}</strong>
													<?php $count++; ?>
												</div>
											@endif
										@else
											@if( ($i <= $answer ) )
												<div class="{{ $shape[$rand_shape] }}">
													<strong class="num">{{ $count }}</strong>
													<?php $count++; ?>
												</div>
											@else
												<div class="shape-none">
												</div>
											@endif
										@endif
									</td>
								@endfor
							</tr>
						@endfor
					</table>
				{{-- @endfor --}}
			@endif
		</div>
	<p class="answers"><ins>Đáp án đúng là: <b>{{ $answer }}</b></ins></p>
	<button class="btn lam-bai-tiep margin0" data-dismiss="modal" aria-label="Close">Làm bài tiếp</button>
	</div>
</div>
