<div class="huong-dan-giai text-left">
	<h2>Hướng dẫn giải</h2>
	<div class="wrapper">
		@if( $type == 'input' )
			<p>Sử dụng bảng cộng: {{ $total }}</p>
			<div class="form-group missing-addition-sentence">
				<div class="content items">
					@foreach( $sentence as $i => $value )
						<div class="item">
							@if($value != $positionAnswer)
								{{ $i.' + '.($total - $i).' = '.$total }}
							@else
								<b>{{ implode(' ',str_split($answer_text)) }}</b>
							@endif
						</div>
					@endforeach
				</div>
			</div>
			<p class="answers"> Biểu thức cần điền vào bảng sau là: <b>{{ $answer_text }}</b></p>
		@elseif( $type == 'choose' )
			<p class="answers"> Biểu thức đúng là: <b>{{ $answer_text.' = '.$sentence[$answer_text] }}</b></p>
		@endif
		<button class="btn lam-bai-tiep margin0" data-dismiss="modal" aria-label="Close">Làm bài tiếp</button>
	</div>
</div>