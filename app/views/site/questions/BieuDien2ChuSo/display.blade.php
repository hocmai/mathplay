<?php
$type = !empty($config['type']) ? $config['type'] : getRandArrayVal(['input', 'choose']);
$max = !empty($config['max']) ? $config['max'] : 100;
$img = getRandArrayVal(CommonQuestion::getRandImg('BieuDien2ChuSo'));
$num1 = $answer = rand(1, $max);
$num2 = $num1+rand(-5, 5);

if( $type == 'choose' ){
	$answer = getRandArrayVal([$num1, $num2]);
	if( $num2 == $num1 ){
		$num2++;
	}
}
?>
<div class="start">
	<?php 
	$str_arr = ['Hình nào dưới đây biểu diễn số', $answer];
	$title = $str_arr[0].' '.$answer;
	$title_slug = Str::slug($str_arr[0], '').'_'.$answer;
	?>
	<script type="text/javascript">
		@foreach( $str_arr as $key => $str )
		if( !checkIdExist('{{ Str::slug($str, '') }}') ){
			audioList.push({id: '{{Str::slug($str, '')}}', url: '{{ CommonQuestion::getAudioPath($str) }}' });
		}
		@endforeach
	</script>
	<div class="play-question-sound">
		<button class="control play" onclick="return PlaySoundManage(this, '{{ $title_slug }}' );"></button>
	</div>
	{{ $title }}
</div>

<div class="container-fluid question-wrapper">
	{{ Form::open(['method' => 'GET', 'class' => 'answer-question-form', 'id' => 'question-'.$question->id]) }}
		<input type="hidden" name="true_answer" value="{{ $answer }}" />
		<input type="hidden" name="qid" value="{{ $question->id }}" />
		<input type="hidden" name="lession_id" value="{{ !empty($lession->id) ? $lession->id : '' }}" />
		<input type="hidden" name="question_number" value="{{ $question_num }}" />
		
		<div class="form-group">
			<div class="content inline-block">
				<div class="numbers">
					@if($type == 'input')
						<div class="number">
							@for($i = 1; $i <= floor($num1/10); $i++)
								<div class="hang-chuc">
									<span class="item" style="background-image: url('{{ $img }}')"></span>
									<span class="item" style="background-image: url('{{ $img }}')"></span>
									<span class="item" style="background-image: url('{{ $img }}')"></span>
									<span class="item" style="background-image: url('{{ $img }}')"></span>
									<span class="item" style="background-image: url('{{ $img }}')"></span>
									<span class="item" style="background-image: url('{{ $img }}')"></span>
									<span class="item" style="background-image: url('{{ $img }}')"></span>
									<span class="item" style="background-image: url('{{ $img }}')"></span>
									<span class="item" style="background-image: url('{{ $img }}')"></span>
									<span class="item" style="background-image: url('{{ $img }}')"></span>
								</div>
							@endfor
							@if( $num1 > floor($num1/10)*10 )
								<div class="hang-dv">
									@for($i = 1; $i <= ($num1 - floor($num1/10)*10); $i++)
										<span class="item" style="background-image: url('{{ $img }}')"></span>
									@endfor
								</div>
							@endif
						</div>
						{{ Form::text('answer', '', ['class'=>'form-control', 'style'=>'width:65px']) }}
					@else
						<div class="form-group radio">
							{{ Form::radio('answer', $num1, false, ['id'=>$question_num.'-1']) }}
							<label for="{{ $question_num }}-1">
								<div class="number">
									@for($i = 1; $i <= floor($num1/10); $i++)
										<div class="hang-chuc">
											<span class="item" style="background-image: url('{{ $img }}')"></span>
											<span class="item" style="background-image: url('{{ $img }}')"></span>
											<span class="item" style="background-image: url('{{ $img }}')"></span>
											<span class="item" style="background-image: url('{{ $img }}')"></span>
											<span class="item" style="background-image: url('{{ $img }}')"></span>
											<span class="item" style="background-image: url('{{ $img }}')"></span>
											<span class="item" style="background-image: url('{{ $img }}')"></span>
											<span class="item" style="background-image: url('{{ $img }}')"></span>
											<span class="item" style="background-image: url('{{ $img }}')"></span>
											<span class="item" style="background-image: url('{{ $img }}')"></span>
										</div>
									@endfor
									@if( $num1 > floor($num1/10)*10 )
										<div class="hang-dv">
											@for($i = 1; $i <= ($num1 - floor($num1/10)*10); $i++)
												<span class="item" style="background-image: url('{{ $img }}')"></span>
											@endfor
										</div>
									@endif
								</div>
							</label>
						</div>
						<div class="form-group radio">
							{{ Form::radio('answer', $num2, false, ['id'=>$question_num.'-2']) }}
							<label for="{{ $question_num }}-2">
								<div class="number">
									@for($i = 1; $i <= floor($num2/10); $i++)
										<div class="hang-chuc">
											<span class="item" style="background-image: url('{{ $img }}')"></span>
											<span class="item" style="background-image: url('{{ $img }}')"></span>
											<span class="item" style="background-image: url('{{ $img }}')"></span>
											<span class="item" style="background-image: url('{{ $img }}')"></span>
											<span class="item" style="background-image: url('{{ $img }}')"></span>
											<span class="item" style="background-image: url('{{ $img }}')"></span>
											<span class="item" style="background-image: url('{{ $img }}')"></span>
											<span class="item" style="background-image: url('{{ $img }}')"></span>
											<span class="item" style="background-image: url('{{ $img }}')"></span>
											<span class="item" style="background-image: url('{{ $img }}')"></span>
										</div>
									@endfor
									@if( $num2 > floor($num2/10)*10 )
										<div class="hang-dv">
											@for($i = 1; $i <= ($num2 - floor($num2/10)*10); $i++)
												<span class="item" style="background-image: url('{{ $img }}')"></span>
											@endfor
										</div>
									@endif
								</div>
							</label>
						</div>
					@endif
				</div>
			</div>
		</div>
	{{ Form::close() }}
</div>