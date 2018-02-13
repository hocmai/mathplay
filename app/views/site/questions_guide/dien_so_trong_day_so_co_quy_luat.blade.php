<div class="huong-dan-giai text-left" style="display">
	<h2>Hướng dẫn giải</h2>
	<div class="wrapper" style="font-size: 18px">
		<p>Đầu tiên, quan sát dãy số. Chúng ta nhận thấy các số liền sau hơn các số liền trước {{ $plus }} đơn vị</p>
		<div class="form-group find-number-in-list">
			<div class="content inline-block">
				@for( $i = 1; $i <= $num_col; $i++ )
					<div class="pull-left number">{{ ($answer == $start+( $plus*($i-1) )) ? Form::text('answer', '') : $start+( $plus*($i-1) ) }}{{ ($i < $num_col) ? ', ' : '' }}</div>
				@endfor
			</div>
			<p>{{ $start.' + '.( $plus*($position -1) ).' = '.$answer }}</p>
		</div>
		<ins>Như vậy, ô trống cần điền là: <b style="color: red"> {{ $answer }}</b></ins>
		<button class="btn lam-bai-tiep margin0" data-dismiss="modal" aria-label="Close">Làm bài tiếp</button>
	</div>
</div>