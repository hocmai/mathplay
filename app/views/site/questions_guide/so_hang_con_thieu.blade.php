<div class="huong-dan-giai text-left" >
	<h2>Hướng dẫn giải</h2>
	<div class="wrapper">
		@if($type == 'plus')
			<div class="tong pull-left">{{ Form::number('answer', '', ['style' => 'width: 50px;text-align: center;','disabled']) }} + {{ $answer1 }} = {{ $answer1 + $answer2 }}
			</div>
			<div class="clear clear-fix"></div>
			<p>Tìm số cần điền vào ô trống</p>
			<p>{{ '<b>'.'?'.'</b>'.' + '.$answer1.' = '.($answer1+$answer2) }}</p>
			<p>Thực hiện trừ 2 vế với {{ $answer1 }}</p>
			<p>{{ '<b>'.'?'.'</b>'.' + '.$answer1.' - '.'<b style = "color:blue">'.$answer1.'</b>'.' = '.($answer1+$answer2).' - '.'<b style = "color:blue">'.$answer1.'</b>' }}</p>
			<p>{{ '<b>'.'?'.'</b>'.' = '.$answer2 }}</p>
			<p class="answers">Như vậy, số còn thiếu trong ô trống là: {{ $answer2 }}</p>
		@else
			@if( $answer1 < $answer2 )
				<div class="tru pull-left" style="font-size: 18px;">{{ Form::number('answer', '', ['style' => 'width: 50px;text-align: center;','disabled']) }} - {{ $answer1 }} = {{ $answer2 - $answer1 }}</div>
				<div class="clear clear-fix"></div>
				<p>-Tìm số cần điền vào ô trống.</p>
				<p>{{ '<b>'.'?'.'</b>'.' - '.$answer1.' = '.($answer2-$answer1) }}</p>
				<p>Thực hiện cộng 2 vế với {{ $answer1 }}</p>
				<p>{{ '<b>'.'?'.'</b>'.' - '.$answer1.' + '.'<b style = "color:blue">'.$answer1.'</b>'.' = '.($answer2-$answer1).' + '.'<b style = "color:blue">'.$answer1.'</b>' }}</p>
				<p>{{ '<b>'.'?'.'</b>'.' = '.$answer2 }}</p>
				<p class="answers">Như vậy, số còn thiếu trong ô trống là: {{ $answer2 }}</p>
			@else
				<div class="tru pull-left" style="font-size: 18px;">{{ $answer1 }} - {{ Form::number('answer', '', ['style' => 'width: 50px;text-align: center;','disabled']) }} = {{ $answer1 - $answer2 }}</div>
				<div class="clear clear-fix"></div>
				<p>-Tìm số cần điền vào ô trống.</p>
				<p>{{ $answer1.' - '.'<b>'.'?'.'</b>'.' = '.($answer1-$answer2) }}</p>
				<p>Thực hiện trừ 2 vế với {{ ($answer1-$answer2) }}</p>
				<p>{{ $answer1.' - '.'<b>'.'?'.'</b>'.' - '.'<b style = "color:blue">'.($answer1-$answer2).'</b>'.' = '.($answer1-$answer2).' - '.'<b style = "color:blue">'.($answer1-$answer2).'</b>' }}</p>
				<p> {{ $answer2.' - '.'<b>'.'?'.'</b>'.' = '.'0' }}</p>
				<p>{{ '<b>'.'?'.'</b>'.' = '.$answer2 }}</p>
				<p class="answers">Như vậy, số còn thiếu trong ô trống là: {{ $answer2 }}</p>
			@endif
		@endif
		<button class="btn lam-bai-tiep margin0" data-dismiss="modal" aria-label="Close">Làm bài tiếp</button>
	</div>
</div>