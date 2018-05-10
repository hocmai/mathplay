<div class="huong-dan-giai text-left" >
	<h2>Hướng dẫn giải</h2>
	<div class="wrapper">
		@if($type == 'input' | $type == 'input_a')
			<p>-Sử dụng bảng trừ {{ $answer }}</p>
			<div class="form-group missing-addition-sentence inline-block">
				<div class="content items">
					@foreach( $sentence as $i => $value )
						<div class="item">
							@if($i != $positionAnswer)
								{{ $value }}
							@else
								<b>{{ implode(' ',str_split($answer_text)) }}</b>
							@endif
						</div>
					@endforeach
				</div>
			</div>
			<br>
			<p class="answers">Đáp án đúng là: {{ $answer_text }}</p>
		@elseif( $type == 'choose')
			<p>Thực hiện lần lượt các phép tính:</p>
			<p>{{ $answerArr[1]['label'].' = '.$_arr[1] }}</p>
			<p>{{ $answerArr[2]['label'].' = '.$_arr[2] }}</p>
			<p>{{ $answerArr[3]['label'].' = '.$_arr[3] }}</p>
			<p><b>{{ $answerArr[0]['label'].' = '.$_arr[0] }}</b></p>
			<p class="answers">Đáp án đúng là: {{ $answerArr[0]['label'].' = '.$answer_text }}</p>
		@endif
		<button class="btn lam-bai-tiep margin0" data-dismiss="modal" aria-label="Close">Làm bài tiếp</button>
	</div>
</div>