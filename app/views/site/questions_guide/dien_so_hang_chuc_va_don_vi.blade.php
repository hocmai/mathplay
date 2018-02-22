<div class="huong-dan-giai text-left" style="display:">
	<h2>Hướng dẫn giải</h2>
	<div class="wrapper">
		@if( $answer < 100 )
			<div class="form-group">
				<span>- Sử dụng các khối đơn vị để biểu diễn số hạng:</span>
				@if($tens > 0)
					<p><b>- Đếm hàng chục</b></p>
					<p>Mỗi 1 khối là 1 chục = 10 đơn vị</p>
					@for($i = 1; $i <= $tens; $i++)
						<table style="margin:5px 0; border:4px solid #ddd" class="pull-left">
							<tr>
								@for($j = 1; $j <= 10; $j++)
								<td style="padding:5px;">
									<div class="{{ $shape[$rand_shape] }}" style="width:30px; height:30px"></div>
								</td>
								@endfor
							</tr>
						</table>
						<strong class="pull-left">{{ $i*10 }}</strong>
						<div class="clearfix"></div>
					@endfor
				@endif
				<span>=> Số hàng chục là: <b>{{ $tens }}</b></span><hr>
				<p><b>- Đếm hàng đơn vị</b></p>
				@if($ones > 0)
					<table>
						<tr>
							@for($i = 1; $i <= $ones; $i++)
								<td style="padding:5px" class="text-center">
									<div class="{{ $shape[$rand_shape] }}" style="width:30px; height:30px"></div>
									<b>{{ $i }}</b>
								</td>
							@endfor
						</tr>
					</table>
				@endif
				<p>=> Số hàng đơn vị là số từ 0 đến 9 nằm sau số hàng chục: <b>{{ $ones }}</b></p>
			</div>
		@endif
		<p class="answer"><ins>Đáp án đúng là:</ins> <b>{{ $tens }}</b> chục + <b>{{ $ones }}</b> đơn vị = {{ CommonQuestion::readNumber($answer) }}</p>
		<button class="btn lam-bai-tiep margin0" data-dismiss="modal" aria-label="Close">Làm bài tiếp</button>
	</div>
</div>