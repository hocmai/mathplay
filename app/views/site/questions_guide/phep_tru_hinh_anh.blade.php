<div class="huong-dan-giai text-left">
	<h2>Hướng dẫn giải</h2>
	<div class="wrapper">
		<div class="images form-group clearfix">
			@for($i = 1; $i <= $num1; $i++)
				<div class="item pull-left{{ ($i>($num1 - $num2)) ? ' ignore' : '' }}">
					<img src="{{ asset($randImg) }}" width="30" />
					<span>{{ $i }}</span>
				</div>
			@endfor
		</div>
		@if( $type == 'input' )
			<p>Có tất cả <b>{{ $num1 }}</b> hình ảnh</p>
			<p>Đếm số lượng hình ảnh bị gạch chéo. Có <b>{{ $num2  }}</b> hình ảnh bị gạch chéo</p>
			<p>Để tìm được kết quả của phép tính <b>{{ ($num1.' - '.$num2) }}</b> đếm tất cả hình ảnh còn lại, không được gạch chéo. </p>
			<p class="answers">Đáp án đúng: {{ $answer }} </p>
		@elseif( $type == 'choose' )
			<p class="answers">Biểu thức đúng</p>
		@else
			<p>Có tất cả <b>{{ $num1 }}</b> hình ảnh</p>
			<p>Đếm số lượng hình ảnh bị gạch chéo. Có <b>{{ $num2  }}</b> hình ảnh bị gạch chéo</p>
			<p>Đếm số hình ảnh không bị gạch chéo. Có <b>{{ ($num1-$num2) }}</b> hình ảnh không bị gạch </p>
			<p class="answers">Biểu thức bạn cần điền là: <b>{{ $answer }}</b></p>
		@endif
		<button class="btn lam-bai-tiep margin0" data-dismiss="modal" aria-label="Close">Làm bài tiếp</button>
	</div>
</div>