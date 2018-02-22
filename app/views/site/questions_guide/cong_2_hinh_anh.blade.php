<div class="huong-dan-giai text-left" style="display:block;">
	<h2>Hướng dẫn giải</h2>
	<div class="wrapper">
		<div class="form-group plus-with-img">
			<div class="content inline-block">
				@foreach( $answer as $key => $value )
					<div class="so-hang pull-left text-center">
						<div class="img">
							{{ ($value == 0) ? '<div class="item none"></div>' : '' }}
							@for($j = 1; $j <= $value; $j++)
								<div class="item">
									<img src="{{ $images }}" width="30"><br>
									<span>{{ $j }}</span>
								</div>
							@endfor
						</div>
						<span class="number">{{ $value }}</span>
					</div>
					@if( $key < count($answer) - 1 )
						<div class="pull-left plus">+</div>
					@endif
				@endforeach

				<div class="pull-left plus">=</div>
				<div class="tong pull-left">{{ array_sum($answer) }}</div>
			</div>
		</div>
		<p class="answers">Đáp án đúng: {{ array_sum($answer) }} </p>
		<button class="btn lam-bai-tiep margin0" data-dismiss="modal" aria-label="Close">Làm bài tiếp</button>
	</div>
</div>