<?php $count = 1; ?>
<div class="huong-dan-giai text-left">
	<h2>Hướng dẫn giải</h2>
	<div class="wrapper">
		<div class="content form-group clearfix">
			@if( $countType == 'dem-hinh-anh' )
				<p class="pull-left">Đếm số {{ $img_rand.'.' }} </p>
				<div class="clearfix"></div>
				@for($i = 1; $i <= $answer; $i++)
					<div class="pull-left img-item">
						<img src="{{ $img_data[$img_rand] }}" width="50" class="pull-left" />
						@if( $i == ($count) )
							<span class="count {{ ($i == $answer) ? 'last' : '' }}">{{ $i }}</span>
						@endif
					</div>
					@if( $i == 5 ) <div class="clearfix"></div> @endif
					<?php if( $i <= $count && $count < $answer ) $count++; ?>
				@endfor
			@else
				<p>* Nhớ<br>
				- Đây là khung 10 ô. Khung có tổng 10 ô trống:</p>
				<table class="frame show-number">
					@for( $k = 1; $k <= 2; $k++ )
						<tr class="sample">
							@for($i = ( ($k == 1) ? 1 : 6 ); $i <= 5*$k; $i++)
								<td class="{{ ($i == 10) ? 'last' : '' }}">{{ $i }}</td>
							@endfor
						</tr>
					@endfor
				</table>
				<div class="clear clearfix"></div>
				@if( $answer <= 10 )
					<p>- Đếm số ô  trong khung.</p>
					{{ DemSoTrongKhung10::getTableGuideHtml($answer, $countType, $shape[$rand_shape]) }}
				@else
				<p>* Đầu tiên đếm các khung đủ 10 ô<br>
				- Có {{ floor($answer/10) }} khung chứa đủ 10 ô </p>
						@for($i = 1; $i <= floor($answer/10); $i++)
							<div class="count-ten pull-left text-center">
								{{ DemSoTrongKhung10::getTableHtml(10, $countType, $shape[$rand_shape]) }}
								<div class="clear clearfix"></div>
								<span class="count-text">{{ $i*10 }}</span>
							</div>
						@endfor
					<div class="clear clear-fix"></div>
					<p style="margin-top: 5px;">- Tiếp tục đếm từ số {{ floor($answer/10)*10 }}</p>
					{{ DemSoTrongKhung10::getTableGuideHtml($answer-(floor($answer/10)*10), $countType, $shape[$rand_shape], (floor($answer/10)*10)+1) }}
				@endif
			@endif
		</div>
	<p class="answers">Đáp án đúng là: <b>{{ $answer }}</b></p>
	<button class="btn lam-bai-tiep margin0" data-dismiss="modal" aria-label="Close">Làm bài tiếp</button>
	</div>
</div>